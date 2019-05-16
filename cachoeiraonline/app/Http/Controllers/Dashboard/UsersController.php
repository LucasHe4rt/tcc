<?php

namespace App\Http\Controllers\Dashboard;

use App\EstablishmentPhotos;
use App\Establishments;
use App\Http\Controllers\Controller;
use App\PhonesEstab;
use App\PhonesUsers;
use App\Ratings;
use App\Types;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();

        return view('dashboard.users.index',['users' => $users]);

    }

    public function establishments($id){


        $establishments = Establishments::where('user_id',$id)->get();

        $types = Types::all();

        $user = User::findOrFail($id);

        if($establishments->count() == 0){

            toastr()->error('Este usuário não possui estabelecimentos cadastrados.');

            return redirect()->back();

        }


        return view('dashboard.users.establishments',[
            'user' => $user,
            'establishments' => $establishments,
            'types' => $types
        ]);

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

        $rating = DB::table('ratings')
                    ->select('*')
                    ->where('user_id','=',$id)
                    ->get();

        $phoneUser = DB::table('phones_users')
                        ->select('*')
                        ->where('user_id','=', $id)
                        ->get();

        $establishment = DB::table('establishments')
                            ->select('*')
                            ->where('user_id','=',$id)
                            ->get();

        foreach ($rating as $r){

            $rate = Ratings::findOrFail($r->id);
            $rate->delete();

        }

        foreach ($phoneUser as $p){

            $phone = PhonesUsers::findOrFail($p->id);
            $phone->delete();

        }

        foreach ($establishment as $e){

            $phoneEstab = DB::table('phones_estab')
                            ->select('*')
                            ->where('establishment_id','=',$e->id)
                            ->get();

            foreach ($phoneEstab as $p){

                $phone = PhonesEstab::findOrFail($p->id);
                $phone->delete();

            }

            $photos = EstablishmentPhotos::where('establishments_id',$e->id)->get();

            foreach ($photos as $p){

                    $photo = EstablishmentPhotos::findOrFail($p->id);
                    $photo->delete();

            }

            $estab = Establishments::findOrFail($e->id);
            $estab->delete();

        }

        $user->delete();

        toastr()->success('Usuário removido!');

        return redirect()->route('user.index');
    }


}
