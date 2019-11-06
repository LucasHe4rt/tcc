<?php

namespace App\Http\Controllers\View;

use App\Establishments;
use App\Ratings;
use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserViewController extends Controller
{

    public function index(){

        $topEstabs = Ratings::where('ratings','5')->get();
        $categories = Types::all();

        return view('welcome',[

            'topEstabs' => $topEstabs,
            'categories' => $categories

        ]);

    }

    public function categories(){

        $categories = Types::all();

        return view('categories',['categories' => $categories]);

    }

    public function category($id)
    {

        $category = Types::findOrFail($id);

        return view('category', ['category' => $category]);

    }

    public function viewEstab($id){

        $establishment = Establishments::findOrFail($id);

        return view('establishments',[

            'establishment' => $establishment

        ]);

    }

}
