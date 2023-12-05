<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FoodsController extends Controller
{
    public function index()
    {
        $dataFood = Foods::all();
        return view('backend.foods.index', compact('dataFood'));
    }




    public function fetchFoods(Request $request)
    {
        if ($request->ajax()) {
            $dataFood = DB::table('foods')
                ->select('foods.*', 'categories.name as category_name')
                ->join('categories', 'foods.id_category', '=', 'categories.id')
                ->get();

            return datatables()->of($dataFood)
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                        <button class="btn btn-warning btn-sm" id="btnEditFood" data-id="' . $row->id . '">
                            <span class="fas fa-edit"></span>
                        </button>
                        <button class="btn btn-danger btn-sm" id="btnDelFood" data-id="' . $row->id . '">
                            <span class="fas fa-trash-alt"></span>
                        </button>
                    </div>';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox"  name="food_checkbox" id="food_checkbox" data-id="' . $row->id . '">';
                })
                ->editColumn('id_category', function ($row) {
                    return $row->category_name; // Display category name instead of ID
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
        ], [
            'name.required' => 'Field Nama Food harus diisi',
            'name.string' => 'Field Nama Food harus Berupa string',
            'photo.required' => 'Field Photo harus diisi',
            'photo.image' => 'Field Photo harus Berupa image',
            'photo.mimes' => 'Field Photo harus Berupa jpeg,png,jpg,gif,svg',
            'photo.max' => 'Field Photo Maksimal 2048',
            'harga.required' => 'Field Harga harus diisi',
            'harga.integer' => 'Field Harga harus Berupa integer',
            'stock.required' => 'Field Stock harus diisi',
            'stock.integer' => 'Field Stock harus Berupa integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $dataFood = new Foods();
            $dataFood->name = $request->input('name');
            $dataFood->photo = $request->file('photo')->store('foods');
            $dataFood->harga = $request->input('harga');
            $dataFood->stock = $request->input('stock');
            $dataFood->slug = Str::slug($request->input('name'));
            $dataFood->status = $request->input('status');
            $dataFood->id_category = $request->input('kategori');
            $dataFood->save();

            return response()->json([
                'status' => 200,
                'message' => 'Food berhasil ditambahkan'
            ]);

        }
    }

    public function edit(Request $request)
    {
        $Food = Foods::findOrFail($request->get('idMenu'));

        return response()->json([
            'status' => 200,
            'food' => $Food
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ], [
            'name.required' => 'Field Nama Food harus diisi',
            'name.string' => 'Field Nama Food harus Berupa string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $dataFood = Foods::findOrFail($request->get('idFood'));
            $dataFood->name = $request->get('name');
            $dataFood->slug = Str::slug($dataFood->name);
            $dataFood->update();

            return response()->json([
                'status' => 200,
                'message' => 'Data Food Dengan Nama ' . '"' . $dataFood->name . '"' . ' Berhasil Diubah'
            ]);
        }
    }

    public function trashFoods()
    {
        return view('backend.foods.trash');
    }

    public function fetchTrashFoods(Request $request)
    {
        $dataFood = Foods::onlyTrashed();

        if ($request->ajax()) {
            return datatables()->of($dataFood)
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                        <button class="btn btn-secondary btn-sm" id="btnRestoreFood" data-id="' . $row['id'] . '">
                            <span class="fas fa-retweet"></span>
                        </button>
                        <button class="btn btn-danger btn-sm" id="btnDelPermanen" data-id="' . $row['id'] . '">
                            <span class="fas fa-trash-alt"></span>
                        </button>
                    </div>';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox"  name="foodTrash_checkbox" id="food_checkbox" data-id="' . $row['id'] . '">';
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $dataFood = Foods::findOrFail($request->get('idFood'));

        $dataFood->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Data Food Dengan Nama ' . '"' . $dataFood->name . '"' . ' Berhasil Dihapus'
        ]);
    }

    public function restore(Request $request)
    {
        $dataFood = Foods::withTrashed()->findOrFail($request->get('idFood'));

        $dataFood->restore();

        return response()->json([
            'status' => 200,
            'message' => 'Data Food Dengan Nama ' . '"' . $dataFood->name . '"' . ' Berhasil Dikembalikan'
        ]);
    }

    public function destroySelected(Request $request)
    {
        $dataFood = $request->get('idFoods');
        $query = Foods::whereIn('id', $dataFood)->delete();
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

    public function restoreSelected(Request $request)
    {
        $dataFood = $request->get('idFoods');
        $query = Foods::whereIn('id', $dataFood)->restore();

        if ($query) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Kategori Berhasil Dikembalikan'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Data Food Gagal Dikembalikan'
            ]);
        }
    }

    public function destroyPermanent(Request $request)
    {
        $dataFood = Foods::withTrashed()->findOrFail($request->get('idFood'));
        $dataFood->forceDelete();

        return response()->json([
            'status' => 200,
            'message' => 'Data Food Dengan Nama ' . '"' . $dataFood->name . '"' . ' Berhasil Dihapus Permanen'
        ]);
    }
}
