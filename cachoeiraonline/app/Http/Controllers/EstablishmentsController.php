<?php

namespace App\Http\Controllers;

use App\Establishments;
use App\Types;
use App\User;
use Illuminate\Http\Request;
use TJGazel\Toastr\Facades\Toastr;

class EstablishmentsController extends Controller
{

    public function index(){

        $estabs = Establishments::all();
        $users = User::all(['id','name']);
        $types = Types::all(['id','name']);

        return view('dashboard.establishments.index',[
            'estabs' => $estabs,
            'types' => $types,
            'users' => $users
        ]);

    }

    public function store(){

        $users = User::all(['id','name']);
        $types = Types::all(['id','name']);

        return view('dashboard.establishments.store',['users' => $users,'types' => $types]);

    }

    public function new(Request $request){

        $estabData = $request->all();

        $estab = new Establishments();
        $estab->create($estabData);

        toastr()->success('Estabelecimento adicionado!');

        return redirect()->route('establishment.index');

    }

    public function edit($id){

        $estab = Establishments::findOrFail($id);
        $user = User::all(['id','name']);
        $types = Types::all(['id','name']);

        return view('dashboard.establishments.edit',['estab' => $estab,'user' => $user,'types' => $types]);

    }

    public function update(Request $request,$id){

        $estab = Establishments::findOrFail($id);
        $estabData = $request->all();

        $estab->update($estabData);

        toastr()->success('Estabelecimento atualizado!');

        return redirect()->back();

    }

    public function remove($id){

        $estab = Establishments::findOrFail($id);
        $estab->delete();

        toastr()->success('Estabelecimento removido!');

        return redirect()->route('establishment.index');
    }
}
