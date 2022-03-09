<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $header = 'SSAPP';
        return response()->view('welcome',  compact('header'))->header("Refresh", "20;url=/login");
    }
}
