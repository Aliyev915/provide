<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function subscribe(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|max:100'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $mails = ['sadigsa@code.edu.az'];
        Subscribe::create($request->all());
        Mail::send('subscribe',$request->all(),function($messages) use ($mails){
            $messages->to($mails);
            $messages->subject('Yeni bildirişiniz var');
        });
        toastr()->success('Successfully subscribed');
        return redirect()->back();
    }

    public function index(){
        return view('manage.subscribes.index')->with('subscribes',Subscribe::all()->sortByDesc('created_at'));
    }

    public function read($id){
        $subscribe = Subscribe::all()->find($id);
        $subscribe->update(['is_read',true]);
        return redirect()->route('subscribes');
    }

    public function delete($id){
        $subscribe = Subscribe::all()->find($id);
        try {
            $subscribe->delete();
            return response()->json([
                'code' => 204,
                'message' => 'Successfully deleted!'
            ]);
        } catch (\Throwable $exp) {
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
