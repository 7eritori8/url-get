<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlgetController extends Controller
{
    public function index(){
        $data["year"] =date("Y");
        return view('urlget',$data);
    }
    //
}
