<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

        $phone = PhonesUsers::findOrFail($id);

        $arr = array(

            'id' => $phone->id,
            'number' => $phone->number,
            'user_id' => $phone->user_id,
            'name' => $phone->user->name,
            'created_at' => $phone->created_at,
            'updated_at' => $phone->updated_at

        );

        return json_encode($arr);

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
