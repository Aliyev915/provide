<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimotional;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $services = Service::all()->sortByDesc('created_at');
        $partners = Partner::all()->sortByDesc('created_at');
        $imotionals = Testimotional::all()->sortByDesc('created_at');
        $blogs = Blog::all()->sortByDesc('created_at');
        return view('index')
                ->with('services',$services)
                ->with('partners',$partners)
                ->with('imotionals',$imotionals)
                ->with('blogs',$blogs);
    }

    public function about(){
        $imotionals = Testimotional::all()->sortByDesc('created_at');
        return view('about')
                ->with('imotionals',$imotionals);
    }

    public function faq(){
        $faqs = Faq::all();
        return view('faq')
                ->with('faqs',$faqs);
    }

    public function contact(){
        return view('contact')
                ->with('setting',Setting::all()->first());
    }

    public function services(){
        return view('service')
                ->with('services',Service::all()->sortByDesc('created_at'));
    }

    public function service_single($slug){
        return view('service-single')->with('service',Service::all()->firstWhere('slug',$slug));
    }

    public function blogs(){
        return view('blog')
                ->with('blogs',Blog::all()->sortByDesc('created_at'));
    }

    public function blog_single($slug){
        return view('blog-single');
    }

    public function vacancy(){
        $vacancies = Vacancy::all()->sortByDesc('created_at')->where('end_date','>',now());
        return view('vacancy')->with('vacancies',$vacancies);
    }

    public function vacancy_single($id){
        return view('includes.vacancy-modal')->with('vacancy',Vacancy::all()->find($id));
    }
}
