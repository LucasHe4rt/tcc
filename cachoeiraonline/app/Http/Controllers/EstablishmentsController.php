<?php

namespace App\Http\Controllers;

use App\Establishments;
use App\User;
use Illuminate\Http\Request;

class EstablishmentsController extends Controller
{

    public function index(){

        $estabs = Establishments::all();
        $user = User::all();

        return view('dashboard.establishments.index',['estabs' => $estabs,'user' => $user]);

    }

    public function store(){

        $users = User::all(['id','name']);

        return view('dashboard.establishments.store',['users' => $users]);

    }

    public function new(Request $request){

        $estabData = $request->all();

        $estab = new Establishments();
        $estab->create($estabData);

    }
}
