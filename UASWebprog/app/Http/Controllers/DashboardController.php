<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerDayMenu;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function perday()
    {
        $data = PerDayMenu::whereMonth("date", Carbon::now())
                ->with("food")
                ->get();

        foreach
        ($data as $value){
            $value->name = $value->food->name;
            $value->day = Carbon::parse($value->date)->day;
        }
        return $data;
    }
}
