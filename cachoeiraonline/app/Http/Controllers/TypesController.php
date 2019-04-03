<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{

    public function index(){

        $types = Types::all();

        return view('dashboard.types.index',['types' => $types]);

    }

    public function store(){

        return view('dashboard.types.store');

    }

    public function new(Request $request){

        $typeData =  $request->all();

        $type = new Types();
        $type->create($typeData);

        return redirect()->route('types.index');

    }

    public function edit($id){

        $type = Types::findOrFail($id);

        return view('dashboard.types.edit',['type' => $type]);

    }

    public function update(Request $request,$id){

        $type = Types::findOrFail($id);
        $typeData = $request->all();

        $type->update($typeData);

        return redirect()->back();

    }

    public function remove($id){

        $type = Types::findOrFail($id);
        $type->delete();

        return redirect()->route('types.index');

    }

}
