<?php

namespace App\Http\Controllers\View;

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

}
