<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all()->sortByDesc('id');
        return view('manage.faqs.index', ['faqs' => $faqs]);
    }

    public function create()
    {
        return view('manage.faqs.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|max:500',
            'answer' => 'required|max:500',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $faq = Faq::create([]);
        $langs = ['az', 'en', 'ru'];
        foreach ($langs as $lang) {
            FaqLang::create([
                'question' => json_decode($request->question_lang)->$lang,
                'answer' => json_decode($request->answer_lang)->$lang,
                'lang' => $lang,
                'faq_id' => $faq->id
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect('/admin/faq');
    }

    public function edit($id)
    {
        return view('manage.faqs.edit', ['faq' => Faq::all()->find($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|max:500',
            'answer' => 'required|max:500',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $faq = Faq::all()->find($id);
        $langs = ['az', 'en', 'ru'];
        foreach ($langs as $lang) {
            $faq->langs->firstWhere('lang', $lang)->update([
                'question' => json_decode($request->question_lang)->$lang,
                'answer' => json_decode($request->answer_lang)->$lang
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect('/admin/faq');
    }

    public function delete($id)
    {
        $faq = Faq::all()->find($id);
        try {
            foreach ($faq->langs as $lang) {
                $lang->delete();
            }
            $faq->delete();
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
