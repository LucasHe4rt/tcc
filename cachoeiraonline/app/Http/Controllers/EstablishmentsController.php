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

        return view('dashboard.establishments.index',['estabs' => $estabs]);

    }

    public function store(){

        $users = User::all(['id','name']);

        return view('dashboard.establishments.store',['users' => $users]);

    }

    public function new(Request $request){

        $estabData = $request->all();

        $estab = new Establishments();
        $estab->create($estabData);

        return redirect()->route('establishment.index');

    }

    public function edit($id){

        $estab = Establishments::findOrFail($id);
        $user = User::all(['id','name']);

        return view('dashboard.establishments.edit',['estab' => $estab,'user' => $user]);

    }

    public function update(Request $request,$id){

        $estab = Establishments::findOrFail($id);
        $estabData = $request->all();

        $estab->update($estabData);

        return redirect()->route('establishment.index');

    }
}
