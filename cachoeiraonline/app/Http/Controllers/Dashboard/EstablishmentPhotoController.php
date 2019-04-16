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



    }

    public function upload(Request $request,$id){

       foreach ($request->file('photos') as $photo){

          $newName =  sha1($photo->getClientOriginalName()) . uniqid(). ".".$photo->getClientOriginalExtension();

          $photo->move(public_path('img'.DIRECTORY_SEPARATOR.'establishmentPhotos'),$newName);

          $establishment = Establishments::findOrFail($id);
          $establishment->photos()->create([
              'photo' => $newName,
              'establishment_id' => $establishment->id
          ]);

       }

    }

}
