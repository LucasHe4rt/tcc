<?php

namespace App\Http\Controllers\Dashboard;

use App\EstablishmentPhotos;
use App\Http\Controllers\Controller;
use App\Establishments;
use App\PhonesEstab;
use App\Ratings;
use App\Types;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect()->back();

    }

    public function edit($id){

        $estab = Establishments::findOrFail($id);

        $arr['id'] = $estab->id;
        $arr['name'] = $estab->name;
        $arr['cnpj'] = $estab->cnpj;
        $arr['address'] = $estab->address;
        $arr['description'] = $estab->description;
        $arr['type_id'] = $estab->type_id;
        $arr['user_id'] = $estab->user_id;

        return json_encode($arr);

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

        $rating = Ratings::where("establishment_id",$id)->get();

        $photos = EstablishmentPhotos::where('establishments_id',$id)->get();

        $phones = PhonesEstab::where('establishment_id',$id)->get();

        foreach ($rating as $r){

            $rate = Ratings::findOrFail($r->id);
            $rate->delete();

        }

        foreach ($photos as $p){

            $photo = EstablishmentPhotos::findOrFail($p->id);
            $photo->delete();

        }

        foreach ($phones as $p){

            $phone = PhonesEstab::findOrFail($p->id);
            $phone->delete();

        }

        $estab->delete();

        toastr()->success('Estabelecimento removido!');

        return redirect()->route('establishment.index');
    }
}
