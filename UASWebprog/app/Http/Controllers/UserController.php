<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.user.index');
    }

    public function fetchUser(Request $request)
    {
        $dataUser = User::all();
        if ($request->ajax()) {
            return datatables()->of($dataUser)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group">
                            <button class="btn btn-warning btn-sm" data-id="' . $row['id'] . '">
                                <span class="fas fa-edit"></span>
                            </button>

                            <button class="btn btn-danger btn-sm" data-id="' . $row['id'] . '">
                            <span class="fas fa-trash-alt"></span>
                            </button>
                        </div>
                        ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
