<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyRequest;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApplyController extends Controller
{
    public function index(){
        return view('manage.applies.index')->with('applies',Apply::all()->sortByDesc('created_at'));
    }

    public function detail($id){
        return view('manage.applies.detail')->with('apply',Apply::all()->find($id));
    }

    public function apply(Request $request){
        $validator = Validator::make($request->all(),[
            'fullname'=>'required|max:50',
            'email'=>'required|email|max:100',
            'phone'=>'required|max:20',
            'message'=>'max:2000',
            'service'=>'required'
        ]);
        $validNumbers = [
            0 => '50',
            1 => '51',
            2 => '55',
            3 => '70',
            4 => '77'
        ];
        if (!(Str::startsWith($request->phone, '+994')  && Str::of(Str::substr($request->phone, 4, 2))->contains($validNumbers)) && !(Str::startsWith($request->phone, '0') && Str::of(Str::substr($request->phone, 1, 2))->contains($validNumbers))) {
            $validator->after(function ($validator) {
                $validator->getMessageBag()->add('phone', 'Telefon nömrəsini düzgün formatda daxil edin');
                return redirect()->back();
            });
        }
        if ($validator->fails()) {
            toastr()->error('Zəhmət olmasa, bütün məlumatlarınızı düzgün formatda daxil edin.');
            return redirect()->back();
        }
        $mails = ['sadigsa@code.edu.az'];
        Mail::send('apply_mail',$request->all(),function($messages) use ($mails){
            $messages->to($mails);
            $messages->subject('Yeni bildirişiniz var');
        });
        Apply::create($request->all());
    }
}
