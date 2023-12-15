<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $dataKategori = Category::all();
        return view('backend.category.index', compact('dataKategori'));
    }


    public function fetchCategory(Request $request)
    {
        $dataKategori = Category::all();

        if ($request->ajax()) {
            return datatables()->of($dataKategori)
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                        <button class="btn btn-warning btn-sm" id="btnEditKategori" data-id="' . $row['id'] . '">
                            <span class="fas fa-edit"></span>
                        </button>
                        <button class="btn btn-danger btn-sm" id="btnDelKategori" data-id="' . $row['id'] . '">
                            <span class="fas fa-trash-alt"></span>
                        </button>
                    </div>';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox"  name="kategori_checkbox" id="kategori_checkbox" data-id="' . $row['id'] . '">';
                })
                ->editColumn('photo', function ($row) {
                    return '<img src="' . asset('storage/' . $row->photo) . '" alt="Food Photo" width="200">';
                })
                ->rawColumns(['action', 'checkbox', 'photo'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'name.required' => 'Field Nama Kategori harus diisi',
            'name.string' => 'Field Nama Kategori harus Berupa string',
            'photo.required' => 'Field Photo harus diisi',
            'photo.image' => 'Field Photo harus Berupa image',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $dataKategori = new Category();
            $dataKategori->name = $request->get('name');
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('categories', 'public');
                $dataKategori->photo = $photoPath;
            }
            $dataKategori->slug = Str::slug($request->get('name'));
            $dataKategori->save();

            return response()->json([
                'status' => 200,
                'message' => 'Kategori berhasil ditambahkan'
            ]);
        }
    }

    public function edit(Request $request)
    {
        $Kategori = Category::findOrFail($request->get('idKategori'));

        return response()->json([
            'status' => 200,
            'kategori' => $Kategori
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Field Nama Kategori harus diisi',
            'name.string' => 'Field Nama Kategori harus Berupa string',
            'photo.image' => 'Field Photo harus Berupa image',
            'photo.mimes' => 'Field Photo harus Berupa jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $dataKategori = Category::findOrFail($request->get('idKategori'));
            $dataKategori->name = $request->get('name');
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('categories', 'public');
                $dataKategori->photo_path = $photoPath;
            }
            $dataKategori->slug = Str::slug($dataKategori->name);
            $dataKategori->update();

            return response()->json([
                'status' => 200,
                'message' => 'Data Kategori Dengan Nama ' . '"' . $dataKategori->name . '"' . ' Berhasil Diubah'
            ]);
        }
    }

    public function trashCategory()
    {
        return view('backend.category.trash');
    }

    public function fetchTrashCategory(Request $request)
    {
        $dataKategori = Category::onlyTrashed();

        if ($request->ajax()) {
            return datatables()->of($dataKategori)
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                        <button class="btn btn-secondary btn-sm" id="btnRestoreKategori" data-id="' . $row['id'] . '">
                            <span class="fas fa-retweet"></span>
                        </button>
                        <button class="btn btn-danger btn-sm" id="btnDelPermanen" data-id="' . $row['id'] . '">
                            <span class="fas fa-trash-alt"></span>
                        </button>
                    </div>';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox"  name="kategoriTrash_checkbox" id="kategori_checkbox" data-id="' . $row['id'] . '">';
                })
                ->editColumn('photo', function ($row) {
                    return '<img src="' . asset('storage/' . $row->photo_path) . '" alt="Food Photo" width="200">';
                })
                ->rawColumns(['action', 'checkbox', 'photo'])
                ->make(true);
        }
    }

    public function destroy(Request $request)
    {
        $dataKategori = Category::findOrFail($request->get('idKategori'));

        $dataKategori->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Data Kategori Dengan Nama ' . '"' . $dataKategori->name . '"' . ' Berhasil Dihapus'
        ]);
    }

    public function restore(Request $request)
    {
        $dataKategori = Category::withTrashed()->findOrFail($request->get('idKategori'));

        $dataKategori->restore();

        return response()->json([
            'status' => 200,
            'message' => 'Data Kategori Dengan Nama ' . '"' . $dataKategori->name . '"' . ' Berhasil Dikembalikan'
        ]);
    }

    public function destroySelected(Request $request)
    {
        $dataKategori = $request->get('idCategorys');
        $query = Category::whereIn('id', $dataKategori)->delete();
        ;

        if ($query) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Kategori Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Data Kategori Gagal Dihapus'
            ]);
        }
    }

    public function restoreSelected(Request $request)
    {
        $dataKategori = $request->get('idCategorys');
        $query = Category::whereIn('id', $dataKategori)->restore();

        if ($query) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Kategori Berhasil Dikembalikan'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Data Kategori Gagal Dikembalikan'
            ]);
        }
    }

    public function destroyPermanent(Request $request)
    {
        $dataKategori = Category::withTrashed()->findOrFail($request->get('idKategori'));
        $dataKategori->forceDelete();

        return response()->json([
            'status' => 200,
            'message' => 'Data Kategori Dengan Nama ' . '"' . $dataKategori->name . '"' . ' Berhasil Dihapus Permanen'
        ]);
    }

}
