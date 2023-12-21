<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\PerDayMenu;
use App\Models\Orders;
use App\Models\Order_line;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $dataFood = Orders::get();
        return view('backend.orders.index', compact('dataFood'));
    }

    public function perDay(Request $request)
    {
        $dataFood = Foods::whereHas('perday', function ($query) use ($request) {
            $query->where("date", $request->get('date'));
        })->get();
        return $dataFood;
    }

    public function fetchFoods(Request $request)
    {

        if ($request->ajax()) {
            if ($request->get('date')) {
                $dataFood = Orders::select('orders.*', 'users.noTelp as noTelp')
                    ->join("users", "orders.name", "=", "users.name")
                    ->whereDay("orders.created_at", Carbon::parse($request->get('date'))->day)
                    ->where("orders.name", 'like', '%' . $request->get('search[value]') . '%')
                    ->get();
            } else {
                $dataFood = Orders::select('orders.*', 'users.noTelp as noTelp')
                    ->join("users", "orders.name", "=", "users.name")
                    ->where("orders.name", 'like', '%' . $request->get('search[value]') . '%')
                    ->get();
            }

            return datatables()->of($dataFood)
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                        <button class="btn btn-warning btn-sm" id="detail" data-id="' . $row->id . '">
                        Detail
                        </button>
                        </div>';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return "Pesanan diproses";
                    } else if ($row->status == 1) {
                        return "Pesanan diantar";
                    } else {
                        return "Pesanan selesai";
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function fetchDetail(Request $request)
    {

        if ($request->ajax()) {
            $dataFood = Order_line::where("orders", $request->get("id"))
                ->where("foods.name", 'like', '%' . $request->get('search[value]') . '%')
                ->join('foods', 'order_line.foods', '=', 'foods.id')
                ->get();


            return datatables()->of($dataFood)
                ->make(true);
        }
    }

    public function changestatus(Request $request)
    {
        $data = Orders::where("id", $request->get("id"))
            ->update([
                'status' => $request->get("status")
            ]);

        return response()->json([
            'status' => 200,
            'message' => 'Status berhasil diubah'
        ]);
    }
}
