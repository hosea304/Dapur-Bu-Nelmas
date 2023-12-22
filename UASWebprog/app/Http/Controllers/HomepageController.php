<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use App\Models\Order_line;
use App\Models\Orders;
use App\Models\Carts;
use App\Models\Beli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class HomepageController extends Controller
{
    public function index()
    {
        $dataKategori = Category::all();
        $dataFood = Foods::whereHas('perday', function ($query) {
            $query->where("date", date("Y-m-d"));
        })->get();

        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();
        return view('user.homepage', compact('dataKategori', 'dataFood', 'jumlahDataCart'));
    }

    public function produk()
    {
        $dataFood = Foods::all();
        $dataKategori = Category::all();
        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();
        return view('user.product', compact('dataKategori', 'dataFood', 'jumlahDataCart'));
    }

    public function beli(Request $request)
    {
        $id = request()->query('selectedItem');
        $buy = Foods::find($id);
        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();

        return view('user.buy', compact('buy', 'id', 'jumlahDataCart'));
    }


    // carts

    public function getcart()
    {
        $data = Carts::select("carts.*", "foods.*", "carts.id as cart_id")
            ->where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->join('foods', 'carts.foods', '=', 'foods.id')
            ->get();

        return datatables()->of($data)
            ->addColumn('action', function ($row) {
                return '<div class="btn-group">
                <button class="btn btn-danger btn-sm" id="btnDelFood" data-id="' . $row->cart_id . '">
                <span class="fas fa-trash-alt"></span>
                </button>
                </div>';
            })
            ->editColumn('gambar', function ($row) {
                return '<img src="' . asset('storage/' . $row->photo) . '" alt="Food Photo" width="200">';
            })
            ->editColumn('total', function ($row) {
                return $row->qty * $row->harga;
            })
            ->rawColumns(['action', 'gambar'])
            ->make(true);
    }

    public function addtocart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foods' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $dataFood = new Carts();
            $dataFood->foods = $request->input('foods');
            $dataFood->qty = $request->input('qty');
            $dataFood->user_id = Auth::id();
            $dataFood->save();

            return response()->json([
                'status' => 200,
                'message' => 'Pesanan berhasil ditambahkan ke keranjang'
            ]);
        }
    }

    public function removefromcart(Request $request)
    {

        $dataFood = Carts::findOrFail($request->get('id'));

        $dataFood->delete();

        return response()->json([
            'status' => 200,
        ]);
    }

    public function getsubtotal(Request $request)
    {
        $data = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->join('foods', 'carts.foods', '=', 'foods.id')
            ->get();

        $total = 0;
        foreach ($data as $value) {
            $total = $total + ($value->harga * $value->qty);
        }

        return response()->json([
            'status' => 200,
            'total' => $total
        ]);
    }

    public function checkoutcart(Request $request)
    {
        $cart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->get();

        $order = new Orders();
        $order->name = $request->input('name');
        $order->alamat = $request->input('alamat');
        $order->save();

        foreach ($cart as $value) {
            $food = Foods::where('id', $value->foods)->first();
            $order_line = new Order_line();
            $order_line->orders = $order->id;
            $order_line->foods = $value->foods;
            $order_line->harga = $food->harga;
            $order_line->qty = $value->qty;
            $order_line->subtotal = $value->qty * $food->harga;
            $order_line->save();

            Carts::where('id', $value->id)->update(['checked_out' => true]);
        }

        return response()->json([
            'status' => 200,
        ]);
    }


    public function checkout(Request $request)
    {
        $beli = Order_line::select('order_line.*', 'foods.*', 'order_line.id as od_id')
            ->join('foods', 'order_line.foods', '=', 'foods.id')
            ->find(request()->query('id'));
        return view('user.checkout', compact('beli'));
    }


    public function getDirectCheckout(Request $request)
    {
        $beli = new Order_line();
        $beli->foods = $request->input('foods');
        $beli->harga = $request->input('harga');
        $beli->qty = $request->input('qty');
        $beli->subtotal = $request->input('harga') * $request->input('qty');
        $beli->save();

        return redirect()->route('directCheckout', ['id' => $beli->id]);
    }


    public function checkoutStore(Request $request)
    {
        // Membuat order baru
        $order = new Orders();
        $order->name = $request->input('nama_penerima');
        $order->alamat = $request->input('alamat');
        $order->save();

        $orderId = $order->id;

        Order_line::whereNull('orders')
            ->update(['orders' => $orderId]);

        return redirect()->action([HomepageController::class, 'infopesanan']);
    }


    public function directCheckout(Request $request)
    {
        $beli = Order_line::select('order_line.*', 'foods.*', 'order_line.id as od_id')
            ->join('foods', 'order_line.foods', '=', 'foods.id')
            ->find(request()->query('id'));

        $user = Auth::user();

        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();

        return view('user.directCheckout.index', compact('beli', 'user', 'jumlahDataCart'));
    }

    public function removefromdirect(Request $request)
    {
        $dataFood = Order_line::findOrFail($request->get('id'));

        $dataFood->delete();

        return response()->json([
            'status' => 200,
        ]);
    }

    public function infopesanan(Request $request)
    {
        $dataOrderLine = Orders::with(["orderline", "orderline.food"])
            ->where('orders.name', Auth::user()->name)
            ->orderByRaw("CASE WHEN status = 1 THEN 0 WHEN status = 0 THEN 1 ELSE 2 END")
            ->orderByRaw('DATE(created_at) DESC')
            ->get();

        foreach ($dataOrderLine as $value) {
            $value->namaMakanan = null;
            $value->subtotal = 0;
            foreach ($value->orderline as $value2) {
                if ($value->namaMakanan == null) {
                    $value->namaMakanan = $value2->food->name . " (" . $value2->qty . ")";
                } else {
                    $value->namaMakanan = $value->namaMakanan . ", " . $value2->food->name . " (" . $value2->qty . ")";
                }
                $value->subtotal = $value->subtotal + $value2->subtotal;
            }
        }

        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();

        return view('user.infopesanan', compact('dataOrderLine', 'jumlahDataCart'));
    }

    public function tentangkami()
    {
        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();
        return view('user.aboutus', compact('jumlahDataCart'));
    }



}
