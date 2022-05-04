<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        return view('faq');
    }

    public function contact(){
        return view('contact');
    }

    public function services(){
        return view('service');
    }

    public function service_single($slug){
        return view('service-single');
    }

    public function blog(){
        return view('blog');
    }

    public function blog_single($slug){
        return view('blog-single');
    }

    public function vacancy(){
        return view('vacancy');
    }
}
