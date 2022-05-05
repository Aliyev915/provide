<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Models\Testimotional;
use App\Models\TestimotionalLang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimotionalController extends Controller
{
    public function index(){
        return view('manage.testimotionals.index')->with('imotionals',Testimotional::all()->sortByDesc('created_at'));
    }

    public function  create(){
        return view('manage.testimotionals.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            'name'=>'required|max:50',
            'profession'=>'required|max:100',
            'text'=>'required|max:500',
            'image'=>'required|max:200|mimes:png,jpg',
            'company_icon'=>'required|max:200|mimes:png,jpg',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $image = FileManager::upload($request->file('image'),'imotionals');
        $company_icon = FileManager::upload($request->file('company_icon'),'imotionals');
        $imotional = Testimotional::create(['image'=>$image,'company_icon'=>$company_icon]);
        $langs = ['az','en','ru'];

        foreach($langs as $lang){
            TestimotionalLang::create([
                'lang'=>$lang,
                'name'=>json_decode($request->name_lang)->$lang,
                'profession'=>json_decode($request->profession_lang)->$lang,
                'text'=>json_decode($request->text_lang)->$lang,
                'testimotional_id'=>$imotional->id
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('imotionals');
    }

    public function edit($id){
        return view('manage.testimotionals.edit')->with('imotional',Testimotional::all()->find($id));
    }

    public function update($id,Request $request){
        $imotional = Testimotional::all()->find($id);
        $data = $request->all();
        $validator = Validator::make($data,[
            'name'=>'required|max:50',
            'profession'=>'required|max:100',
            'text'=>'required|max:500',
            'image'=>'max:200|mimes:png,jpg',
            'company_icon'=>'max:200|mimes:png,jpg',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $image = $imotional->image;
        $company_icon = $imotional->company_icon;

        if($request->hasFile('image')){
            FileManager::delete($imotional->image,'imotionals');
            $image = FileManager::upload($request->file('image'),'imotionals');
        }
        if($request->hasFile('company_icon')){
            FileManager::delete($imotional->company_icon,'imotionals');
            $company_icon = FileManager::upload($request->file('company_icon'),'imotionals');
        }
        $imotional->update(['image'=>$image,'company_icon'=>$company_icon]);
        $langs = ['az','en','ru'];

        foreach($langs as $lang){
            $imotional->langs->firstWhere('lang',$lang)->update([
                'name'=>json_decode($request->name_lang)->$lang,
                'profession'=>json_decode($request->profession_lang)->$lang,
                'text'=>json_decode($request->text_lang)->$lang,
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('imotionals');
    }

    public function delete($id){
        $imotional = Testimotional::all()->find($id);
        try{
            FileManager::delete($imotional->image,'imotionals');
            FileManager::delete($imotional->company_icon,'imotionals');
            foreach($imotional->langs as $lang){
                $lang->delete();
            }
            $imotional->delete();
            return response()->json([
                'message'=>'Successfully deleted',
                'code'=>204
            ]);
        }
        catch(Exception $ex){
            return response()->json([
                'message'=>'Something went wrong',
                'code'=>500
            ]);
        }
    }
}
