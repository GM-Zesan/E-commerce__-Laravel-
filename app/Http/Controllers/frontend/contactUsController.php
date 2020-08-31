<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contactUsController extends Controller
{
    public function Contact(){
        return view('contact');
    }
}
