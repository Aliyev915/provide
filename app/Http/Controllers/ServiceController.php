<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Helpers\Translate;
use App\Models\Service;
use App\Models\ServiceLang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;

class ServiceController extends Controller
{
    private $langs;
    public function __construct()
    {
        $this->langs = ['az','en','ru'];
    }

    public function index(){
        return view('manage.services.index')->with('services',Service::all()->sortByDesc('created_at'));
    }

    public function create(){
        return view('manage.services.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'description' => 'max:20000',
            'content'=>'required|max:250',
            'image' => 'required|max:200|mimes:png,jpg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $service = Service::create([
            'image'=>FileManager::upload($request->file('image'),'services')
        ]);
        foreach($this->langs as $lang){
            ServiceLang::create([
                'title'=>json_decode($request->title_lang)->$lang,
                'content'=>json_decode($request->content_lang)->$lang,
                'description'=>json_decode($request->description_lang)->$lang,
                'lang'=>$lang,
                'service_id'=>$service->id
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('services');
    }

    public function edit($id){
        return view('manage.services.edit')->with('service',Service::all()->find($id));
    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'description' => 'max:20000',
            'content'=>'required|max:250',
            'image' => 'max:200|mimes:png,jpg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $service = Service::all()->find($id);
        if($request->hasFile('image')){
            FileManager::delete($service->image,'services');
            $service->update([
                'image'=>FileManager::upload($request->file('image'),'services')
            ]);
        }
        foreach($this->langs as $lang){
            Translate::getTranslate($service,$lang)->update([
                'title'=>json_decode($request->title_lang)->$lang,
                'content'=>json_decode($request->content_lang)->$lang,
                'description'=>$request->{'description_'.$lang},
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('services');
    }

    public function delete($id){
        $service = Service::all()->find($id);
        try{
            FileManager::delete($service->image,'services');
            foreach($service->langs() as $lang){
                $lang->delete();
            }
            $service->delete();
            return response()->json([
                'message'=>'Successfully deleted!',
                'code'=>204
            ]);
        }
        catch(Exception $ex){
            return response()->json([
                'message'=>'Something went wrong',
                'code'=>204
            ]);
        }
    }
}
