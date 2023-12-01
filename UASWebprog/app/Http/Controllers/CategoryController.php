<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ], [
            'name.required' => 'Field Nama Kategori harus diisi',
            'name.string' => 'Field Nama Kategori harus Berupa string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $dataKategori = new Category();
            $dataKategori->name = $request->get('name');
            $dataKategori->slug = Str::slug($request->get('name'));
            $dataKategori->save();

            return response()->json([
                'status' => 200,
                'message' => 'Kategori berhasil ditambahkan'
            ]);
        }
    }
}
