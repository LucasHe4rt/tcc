<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        $userVerify = Admins::where('username', $username);

        if($userVerify->count() > 0)
        {

           $user = $userVerify->get();

           foreach ($user as $u){

             $checkPass = Hash::check($password, $u->password, []);

             if($checkPass == 1)
             {

                 toastr()->success('Logado com sucesso!');
                 return redirect()->route('dashboard.index');

             }else{

                 toastr()->error('Senha incorreta!');

             }

           }

        }else{

            return toastr()->error('Usuário não encontrado');
        }

    }

}
