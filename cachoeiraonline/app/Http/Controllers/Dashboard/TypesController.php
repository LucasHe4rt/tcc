<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

        toastr()->success('Categoria adicionada!');

        return redirect()->route('types.index');

    }

    public function edit($id){

        $type = Types::findOrFail($id);

        $arr = array(

            'id' => $type->id,
            'name' => $type->name,
            'created_at' => $type->created_at,
            'updated_at' => $type->updated_at

        );

        return json_encode($arr);
//        return view('dashboard.types.edit',['type' => $type]);

    }

    public function update(Request $request,$id){

        $type = Types::findOrFail($id);
        $typeData = $request->all();

        $type->update($typeData);

        toastr()->success('Categoria atualizada!');

        return redirect()->back();

    }

    public function remove($id){

        $type = Types::findOrFail($id);
        $type->delete();

        toastr()->success('Categoria removida!');

        return redirect()->route('types.index');

    }

}
