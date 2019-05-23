<?php

namespace App\Http\Controllers\Dashboard;

use App\EstablishmentPhotos;
use App\Establishments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstablishmentPhotoController extends Controller
{


    public function upload(Request $request,$id){

       foreach ($request->file('photos') as $photo){

           $extensions = array(
               'jpg',
               'jpeg',
               'png',
               'mpeg'
           );

           $extension = $photo->getClientOriginalExtension();

           if(!in_array($extension,$extensions)){

               toastr()->error('Formato não permitido!');

               return redirect()->back();

           }

           $newName =  sha1($photo->getClientOriginalName()) . uniqid(). ".".$extension;

           $photo->move(public_path('img'.DIRECTORY_SEPARATOR.'establishmentPhotos'),$newName);

           $establishment = Establishments::findOrFail($id);
           $establishment->photos()->create([
               'photo' => $newName,
               'establishment_id' => $establishment->id
           ]);

           toastr()->success('Fotos adicionadas!');

           return redirect()->back();

           }




    }

    public function remove($id){

        $photo = EstablishmentPhotos::findOrFail($id);
        $photo->delete();

        toastr()->success('Foto deletada!');

        return redirect()->back();

    }

}
