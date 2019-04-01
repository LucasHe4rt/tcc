<?php

namespace App\Http\Controllers;

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

        $photo = $request->file('profile_photo');

        echo $request->file('profile_photo');

        if (isset($photo)){

            $newName = sha1($photo->getClientOriginalName()) . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'.DIRECTORY_SEPARATOR.'usersProfile'),$newName);

            $user->profile_photo = 'img'.DIRECTORY_SEPARATOR.'usersProfile'.DIRECTORY_SEPARATOR.$newName;

           echo 1;
           die();

            $user->save();

        }else{

            echo 0;

            die();
            $user->save();

        }

        //return redirect()->route('user.index');
    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('dashboard.users.edit',['user'=> $user]);

    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $userData = $request->all();

        if(isset($userData['password'])){

            $userData['password'] = bcrypt($userData['password']);

        }else{

            $userData['password'] = $user->password;

        }

        $user->update($userData);


        return redirect()->back();

    }

    public function remove($id){

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index');
    }
}
