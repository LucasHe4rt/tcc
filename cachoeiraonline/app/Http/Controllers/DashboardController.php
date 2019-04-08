<?php

namespace App\Http\Controllers;

use App\Establishments;
use App\Types;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $types = Types::all(['id','name']);
        $users = User::all();
        $establishments = Establishments::all();

        return view('dashboard.index',[
            'types' => $types,
            'users' => $users,
            'establishments' => $establishments
        ]);

    }

}
