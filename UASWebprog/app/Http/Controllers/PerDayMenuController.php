<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\PerDayMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PerDayMenuController extends Controller
{
    public function index()
    {
        $dataFood = Foods::whereHas('perday', function ($query) {
            $query->where("date", date("Y-m-d"));
            })->get();
        return view('backend.perdaymenu.index', compact('dataFood'));
    }

    public function perDay(Request $request)
    {
        $dataFood = Foods::whereHas('perday', function ($query) use($request) {
            $query->where("date", $request->get('date'));
            })->get();
        return $dataFood;
    }

    public function fetchFoods(Request $request)
    {

        if ($request->ajax()) {
            if($request->get('date')){
                $dataFood = Foods::select('foods.*', 'categories.name as category_name', 'per_day_menu.id as perday_id', 'per_day_menu.date as date')
                    ->join('categories', 'foods.id_category', '=', 'categories.id')
                    ->join('per_day_menu', 'foods.id', '=', 'per_day_menu.food_id')
                    // ->whereHas('perday', function ($query) use($request) {
                    //     $query->where("date", $request->get('date'));
                    //     })
                    ->where("date", $request->get('date'))
                    ->where("foods.name", 'like', '%' . $request->get('search[value]') . '%')
                    ->get();
            } else {
                $dataFood = Foods::select('foods.*', 'categories.name as category_name', 'per_day_menu.id as perday_id', 'per_day_menu.date as date')
                    ->join('categories', 'foods.id_category', '=', 'categories.id')
                    ->join('per_day_menu', 'foods.id', '=', 'per_day_menu.food_id')
                    // ->whereHas('perday', function ($query) use($request) {
                    //     $query->where("date", date("Y-m-d"));
                    //     })
                    ->where("date", date("Y-m-d"))
                    ->where("foods.name", 'like', '%' . $request->get('search[value]') . '%')
                    ->get();
            }

            return datatables()->of($dataFood)
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                        <button class="btn btn-danger btn-sm" id="btnDelFood" data-id="' . $row->perday_id . '">
                        <span class="fas fa-trash-alt"></span>
                        </button>
                        </div>';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox"  name="food_checkbox" id="food_checkbox" data-id="' . $row->perday_id . '">';
                })
                ->editColumn('photo', function ($row) {
                    return '<img src="' . asset('storage/' . $row->photo) . '" alt="Food Photo" width="200">';
                })
                ->editColumn('id_category', function ($row) {
                    return $row->category_name; // Display category name instead of ID
                })
                ->rawColumns(['action', 'checkbox', 'photo'])
                ->make(true);
        }
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'makanan' => 'required|integer',
        ], [
            'tanggal.required' => 'Field Tanggal harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $dataCount = PerDayMenu::where("date", $request->input("tanggal"))->count();
            if($dataCount < 3){
                $dataFood = new PerDayMenu();
                $dataFood->date = $request->input('tanggal');
                $dataFood->food_id = $request->input('makanan');
                $dataFood->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Food berhasil ditambahkan'
                ]);
            } else {
                return response()->json([
                    'status' => 403,
                    'errors' => "Jumlah maksimal menu untuk satu hari adalah 3"
                ]);
            }

        }
    }

    public function destroy(Request $request)
    {

        $dataFood = PerDayMenu::findOrFail($request->get('idMenu'));

        $dataFood->delete();

        return response()->json([
            'status' => 200,
        ]);
    }

    public function destroySelected(Request $request)
    {
        $dataFood = $request->get('idMenus');
        $query = PerDayMenu::whereIn('id', $dataFood)->delete();
        ;

        if ($query) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Food Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Data Food Gagal Dihapus'
            ]);
        }
    }
}
