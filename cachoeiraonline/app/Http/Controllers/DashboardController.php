<?php

namespace App\Http\Controllers;

use App\Types;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $types = Types::all(['id','name']);
        $users = User::all(['id','name']);

        return view('dashboard.index',[
            'types' => $types,
            'users' => $users
        ]);

    }

}
