<?php

namespace App\Http\Controllers\Dashboard;

use App\Establishments;
use App\Http\Controllers\Controller;
use App\Ratings;
use App\User;
use Illuminate\Http\Request;

class RatingsController extends Controller
{

    public function index(){

        $ratings = Ratings::all();
        $users = User::all(['id','name']);
        $establishments = Establishments::all(['id','name']);

        return view('dashboard.ratings.index',[
            'ratings' => $ratings,
            'users' => $users,
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
            'establishments_id' => $rating->establishments_id,
            'users_id' => $rating->users_id,
            'created_at' => $rating->created_at,
            'updated_at' => $rating->updated_at,
            'establishment_name' => $rating->establishment->name,
            'user_name' => $rating->user->name

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

