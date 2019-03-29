<?php

namespace App\Http\Controllers;

use App\PhonesEstab;
use Illuminate\Http\Request;

class PhonesEstabController extends Controller
{

    public function index(){

        $phones = PhonesEstab::all();

        return view('dashboard.phonesEstab.index',['phones' => $phones]);

    }

    public function store(){

        return view('dashboard.phonesEstab.store');

    }

    public function new(Request $request){

        $phone = new PhonesEstab();

        $phoneData = $request->all();

        $phone->create($phoneData);

        return redirect()->route('dashboard.phonesEstab.index');

    }

    public function edit($id){

        $phone = PhonesEstab::findOrFail($id);

        return view('dashboard.phonesEstab.edit',['phone' => $phone]);

    }

    public function update(Request $request, $id){

        $phone = PhonesEstab::findOrFail($id);
        $phoneData = $request->all();

        $phone->update($phoneData);

        return redirect()->back();

    }

    public function remove($id){

        $phone = PhonesEstab::findOrFail($id);
        $phone->delete();

        return redirect()->route('phoneEstab.index');

    }

}
