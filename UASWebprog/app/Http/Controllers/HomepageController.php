<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;



class HomepageController extends Controller
{
    public function index()
    {
        $dataKategori = Category::all();
        return view('user.homepage', compact('dataKategori'));
    }

}
