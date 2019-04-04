<?php

namespace App\Http\Controllers;

use App\PhonesUsers;
use App\User;
use Illuminate\Http\Request;

class PhonesUsersController extends Controller
{
    public function index(){

        $phones = PhonesUsers::all();
        $users = User::all(['id','name']);

        return view('dashboard.phonesUsers.index',['phones' => $phones,'users' => $users]);

    }

    public function store(){

        $users = User::all(['id','name']);

        return view('dashboard.phonesUsers.store',['users' => $users]);

    }

    public function new(Request $request){

        $phone = new PhonesUsers();

        $phoneData = $request->all();

        $phone->create($phoneData);

        toastr()->success('Telefone de usuário adicionado!');

        return redirect()->route('phoneUsers.index');

    }

    public function edit($id){
        $users = User::all(['id','name']);
        $phone = PhonesUsers::findOrFail($id);

        return view('dashboard.phonesUsers.edit',['phone' => $phone,'users' => $users]);

    }

    public function update(Request $request, $id){

        $phone = PhonesUsers::findOrFail($id);
        $phoneData = $request->all();

        $phone->update($phoneData);

        toastr()->success('Telefone de usuário atualizado!');

        return redirect()->back();

    }

    public function remove($id){

        $phone = PhonesUsers::findOrFail($id);
        $phone->delete();

        toastr()->success('Telefone de usuário removido!');

        return redirect()->route('phoneUsers.index');

    }
}
