<?php

namespace App\Http\Controllers\Dashboard;

use App\Establishments;
use App\Http\Controllers\Controller;
use App\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{

    public function index(){

        $ratings = Ratings::all();
        $establishments = Establishments::all(['id','name']);

        return view('dashboard.ratings.index',[
            'ratings' => $ratings,
            'establishments' => $establishments
        ]);
    }

    public function new(Request $request){

        $rating = new Ratings();
        $ratingData = $request->all();

        $rating->create($ratingData);

        toastr()->success('Avaliação feita com sucesso!');

        return redirect()->back();
    }

    public function edit($id){

        $rating = Ratings::findOrFail($id);

        $arr = array(

            'id' => $rating->id,
            'ratings' => $rating->ratings,
            'description' => $rating->description,
            'establishment_id' => $rating->establishment_id,
            'created_at' => $rating->created_at,
            'updated_at' => $rating->updated_at,
            'establishment_name' => $rating->establishment->name,

        );

        return json_encode($arr);

    }

    public function update(Request $request,$id){

        $rating = Ratings::findOrFail($id);
        $ratingData = $request->all();

        $rating->update($ratingData);

        toastr()->success('Avaliação atualizada com sucesso!');

        return redirect()->back();

    }

    public function remove($id){

        $rating = Ratings::findOrFail($id);
        $rating->delete();

        toastr()->success('Avaliação removida com sucesso!');

        return redirect()->back();

    }

}

