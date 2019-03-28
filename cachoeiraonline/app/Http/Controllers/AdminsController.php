<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    public function index(){

        $admins = Admins::all();

        return view('dashboard.admins.index',['admins' => $admins]);

    }

    public function store(){

        return view('dashboard.admins.store');

    }

    public function new(Request $request){

        $adminData = $request->all();
        $adminData['password'] = bcrypt($adminData['password']);

        $admin = new Admins();

        $admin->create($adminData);

        print 'Administrador criado.';

        return redirect()->route('admin.index');
    }

    public function edit($id){

        $admin = Admins::findOrFail($id);

        return view('dashboard.admins.edit',['admin'=> $admin]);

    }

    public function update(Request $request, $id){

        $admin = Admins::findOrFail($id);

        $adminData = $request->all();

        if(isset($adminData['password'])){

            $adminData['password'] = bcrypt($adminData['password']);

        }else{

            $adminData['password'] = $admin->password;

        }

        $admin->update($adminData);


        return redirect()->back();

    }

    public function remove($id){

        $admin = Admins::findOrFail($id);

        $admin->delete();

        print 'Administrador deletado!';

        return redirect()->route('admin.index');
    }
}
