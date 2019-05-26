<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserViewController extends Controller
{
    
    public function index(){

        return view('welcome');

    }

}
