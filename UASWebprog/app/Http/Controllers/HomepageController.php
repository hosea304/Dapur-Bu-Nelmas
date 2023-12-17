<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use App\Models\Order_line;
use App\Models\Beli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomepageController extends Controller
{
    public function index()
    {
        $dataKategori = Category::all();
        $dataFood = Foods::whereHas('perday', function ($query) {
            $query->where("date", date("Y-m-d"));
        })->get();
        return view('user.homepage', compact('dataKategori', 'dataFood'));
    }

    public function produk()
    {
        $dataFood = Foods::all();
        $dataKategori = Category::all();
        return view('user.product', compact('dataKategori', 'dataFood'));
    }

    public function beli(Request $request)
    {
        $id = request()->query('selectedItem');
        $buy = Foods::find($id);
        return view('user.buy', compact('buy'));
    }

    public function beliStore(Request $request)
    {
        $dataBeli = new Beli();
        $dataBeli->food_id = $request->input('foods');
        $dataBeli->qty = $request->input('qty');
        $dataBeli->total = $request->input('qty') * $request->input('harga');
        $dataBeli->save();

        return redirect()->action([HomepageController::class, 'checkout'], ['id' => $dataBeli->id]);

    }

    public function checkout(Request $request)
    {
        $beli = Beli::join('foods', 'beli.food_id', '=', 'foods.id')
            ->find(request()->query('id'));
        return view('user.checkout', compact('beli'));
    }

    public function tentangkami()
    {
        return view('user.aboutus');
    }

    public function infopesanan()
    {
        $order_line = Order_line::join('orders', 'orders.id', '=', 'order_line.orders')
            ->join('foods', 'foods.id', '=', 'order_line.foods')
            ->get();
        return view('user.infopesanan', compact('order_line'));
    }


}
