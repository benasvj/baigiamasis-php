<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Sveiki atvykę į Legendų Lygą!";
        return view('pages.index')->with("title", $title);
    }
}
