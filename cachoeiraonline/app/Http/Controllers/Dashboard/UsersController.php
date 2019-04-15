<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();

        return view('dashboard.users.index',['users' => $users]);

    }

    public function store(){

        return view('dashboard.users.store');

    }

    public function new(Request $request){

        $userData = $request->all();
        $userData['password'] = bcrypt($userData['password']);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->cpf = $request->input('cpf');
        $user->password = bcrypt($request->input('password'));



        if($request->hasFile('profile_photo')){

            $photo = $request->file('profile_photo');
            $newName = sha1($photo->getClientOriginalName()) . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'.DIRECTORY_SEPARATOR.'usersProfile'),$newName);

            $user->profile_photo = $newName;

            $user->save();


        }else{

            $user->save();

        }

        toastr()->success('Usuário adicionado!');


        return redirect()->route('user.index');
    }

    public function edit($id){

        $user = User::findOrFail($id);

        $arr = array(

            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'cpf' => $user->cpf,
            'profile_photo' => $user->profile_photo,
            'password' => $user->password,
            'created_at'=> $user->created_at,
            'updated_at' => $user->updated_at

        );

        return json_encode($arr);

//        return view('dashboard.users.edit',['user'=> $user]);

    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->cpf = $request->input('cpf');
        $password = $request->input('password');

        if(isset($password)){

            $userData['password'] = bcrypt($request->input('password'));

        }else{

            $user->password = $user->password;

        }

        if($request->hasFile('profile_photo')){

            $photo = $request->file('profile_photo');
            $newName = sha1($photo->getClientOriginalName()) . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'.DIRECTORY_SEPARATOR.'usersProfile'),$newName);

            $user->profile_photo = 'img'.DIRECTORY_SEPARATOR.'usersProfile'.DIRECTORY_SEPARATOR.$newName;

            $user->save();


        }else{

            $user->save();

        }

        toastr()->success('Usuário atualizado!');

        return redirect()->back();

    }

    public function remove($id){

        $user = User::findOrFail($id);

        $user->delete();

        toastr()->success('Usuário removido!');

        return redirect()->route('user.index');
    }
}
