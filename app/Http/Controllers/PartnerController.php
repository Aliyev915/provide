<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function index()
    {
        return view('manage.partners.index')->with('partners', Partner::all());
    }

    public function create()
    {
        return view('manage.partners.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'images'=>'required',
            'images.*'=>'max:200|mimes:png,jpg'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $files = $request->file('images');
        foreach($files as $file){
            $image = FileManager::upload($file,'partners');
            Partner::create(['image'=>$image]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('partners');
    }

    public function delete($id)
    {
        $partner = Partner::all()->find($id);

        try {
            FileManager::delete($partner->image,'partners');
            $partner->delete();
            return response()->json(['message' => 'Successfully Deleted!', 'code' => 204]);
        } catch (Exception $ex) {
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
