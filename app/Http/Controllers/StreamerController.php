<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamerController extends Controller
{
    public function index(){
        return view('streamers');
    }

}
