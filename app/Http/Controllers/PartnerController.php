<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        return view('manage.partners.index')->with('partners',Partner::all());
    }

    public function create(){
        return view('manage.partners.create');
    }

    public function store(Request $request){
        toastr()->success('Successfully Saved');
        return redirect()->route('partners');
    }

    public function delete(){
        
    }
}
