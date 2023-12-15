<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use Illuminate\Http\Request;



class HomepageController extends Controller
{
    public function index()
    {
        $dataKategori = Category::all();
        $dataFood = Foods::all();
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
        $id = $request->query('selectedItem');
        $food = Foods::find($id);
        if (!$food) {
            abort(404, 'Food not found');
        }
        return view('user.buy', ['selectedItem' => $food]);
    }

    public function tentangkami()
    {
        return view('user.aboutus');
    }

}
