<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Helpers\Translate;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\BlogLang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('manage.blogs.index')->with('blogs', Blog::all()->sortByDesc('created_at'));
    }

    public function create()
    {
        return view('manage.blogs.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'description' => 'max:20000',
            'images' => 'required',
            'images,*' => 'max:100|mimes:png,jpg',
            'time' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $blog = Blog::create([
            'time' => $request->time,
        ]);

        $langs = ['az', 'en', 'ru'];
        $files = $request->file('images');
        foreach ($langs as $lang) {
            BlogLang::create([
                'title' => json_decode($request->title_lang)->$lang,
                'description' => json_decode($request->description_lang)->$lang,
                'content'=>json_decode($request->content_lang)->$lang,
                'slug' => Str::slug(json_decode($request->title_lang)->$lang),
                'lang' => $lang,
                'blog_id' => $blog->id
            ]);
        }

        foreach($files as $file){
            BlogImage::create([
                'image'=>FileManager::upload($file,'blogs'),
                'blog_id'=>$blog->id
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('blogs');
    }

    public function edit($id)
    {
        return view('manage.blogs.edit')->with('blog', Blog::all()->find($id));
    }
    public function update($id, Request $request)
    {
        $blog = Blog::all()->find($id);
        $blog->update([
            'time',
        ]);

        $langs = ['az','ru','en'];

        foreach($langs as $lang){
            Translate::getTranslate($blog,$lang)->update([
                'title' => json_decode($request->title_lang)->$lang,
                'description_az' => $request->description_az,
                'description_en' => $request->description_en,
                'description_ru' => $request->description_ru,
                'content'=>json_decode($request->content_lang)->$lang,
                'slug' => Str::slug(json_decode($request->title_lang)->$lang),
            ]);
        }

        if($request->hasFile('images')){
            foreach($blog->images as $image){
                FileManager::delete($image->image,'blogs');
                $image->delete();
            }
            foreach($request->file('images') as $file){
                BlogImage::create(['image'=>FileManager::upload($file,'blogs'),'blog_id'=>$blog->id]);
            }
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('blogs');
    }

    public function delete($id)
    {
        $blog = Blog::all()->find($id);
        try {
            foreach($blog->images as $image){
                FileManager::delete($image->image,'blogs');
                $image->delete();
            }
            foreach($blog->langs as $lang){
                $lang->delete();
            }
            $blog->delete();
            return response()->json([
                'message' => 'Successfully Deleted!',
                'code' => 204
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong!',
                'code' => 500
            ]);
        }
    }
}
