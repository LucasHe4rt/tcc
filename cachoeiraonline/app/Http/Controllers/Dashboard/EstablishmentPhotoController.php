<?php

namespace App\Http\Controllers\Dashboard;

use App\Establishments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstablishmentPhotoController extends Controller
{

    public function index($id){

        $arr = array('id' => $id);

        return json_encode($arr);

//        return view('dashboard.establishments.photos.index',['establishment_id' => $establishement_id]);

    }

    public function upload(Request $request,$id){

        dd($request->file('photos'));

    }

}
