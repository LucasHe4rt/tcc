<?php

namespace App\Http\Controllers;

use App\Establishments;
use App\PhonesEstab;
use Illuminate\Http\Request;

class PhonesEstabController extends Controller
{

    public function index(){

        $phones = PhonesEstab::all();
        $estabs = Establishments::all(['id','name']);

        return view('dashboard.phonesEstab.index',['phones' => $phones,'estabs' => $estabs]);

    }

    public function store(){

        $estabs = Establishments::all(['id','name']);

        return view('dashboard.phonesEstab.store',['estabs' => $estabs]);

    }

    public function new(Request $request){

        $phone = new PhonesEstab();

        $phoneData = $request->all();

        $phone->create($phoneData);

        toastr()->success('Telefone de estabelecimento adicionado!');

        return redirect()->route('phoneEstab.index');

    }

    public function edit($id){

        $phone = PhonesEstab::findOrFail($id);

        $arr['id'] = $phone->id;
        $arr['number'] = $phone->number;
        $arr['establishments_id'] = $phone->establishments_id;
        $arr['establishmentName'] = $phone->establishment->name;
        return json_encode($arr);

        //return view('dashboard.phonesEstab.edit',['phone' => $phone,'estabs' => $estabs]);

    }

    public function update(Request $request, $id){

        $phone = PhonesEstab::findOrFail($id);
        $phoneData = $request->all();

        $phone->update($phoneData);

        toastr()->success('Telefone de estabelecimento atualizado!');

        return redirect()->back();

    }

    public function remove($id){

        $phone = PhonesEstab::findOrFail($id);
        $phone->delete();

        toastr()->success('Telefone de estabelecimento removido!');

        return redirect()->route('phoneEstab.index');

    }

}
