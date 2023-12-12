<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods; 

class BuyController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('selectedItem');

        $food = Foods::find($id);

        if (!$food) {
            abort(404, 'Food not found');
        }

        return view('user.buy', ['selectedItem' => $food]);
    }
}
