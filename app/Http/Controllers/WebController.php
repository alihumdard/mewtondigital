<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {
        //code ...

    }

    public function contact_us()
    {
        return view('website.pages.contact_us');
    }
}
