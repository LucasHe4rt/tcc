<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Establishments;
use App\Types;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $types = Types::all(['id','name']);
        $establishments = Establishments::all();

        return view('dashboard.index',[
            'types' => $types,
            'establishments' => $establishments
        ]);

    }

}
