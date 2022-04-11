<?php

namespace App\Http\Controllers;

use App\Helpers\Translate;
use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use App\Models\VacancyLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{
    public function index()
    {
        return view('manage.vacancies.index')->with('vacancies', Vacancy::all()->where('end_date', '>', now())->sortByDesc('created_at'));
    }

    public function create()
    {
        return view('manage.vacancies.create');
    }

    public function store(VacancyRequest $request)
    {
        $langs = ['az','en','ru'];
        $vacancy = Vacancy::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'email' => $request->email,
        ]);

        foreach ($langs as $lang) {
            VacancyLang::create([
                'title' => json_decode($request->title_lang)->$lang,
                'description' => json_decode($request->description_lang)->$lang,
                'lang' => $lang,
                'vacancy_id' => $vacancy->id
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('vacancies');
    }

    public function edit($id)
    {
        return view('manage.vacancies.edit')->with('vacancy', Vacancy::all()->find($id));
    }

    public function update($id, VacancyRequest $request)
    {
        $vacancy = Vacancy::all()->find($id);
        $vacancy->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'email' => $request->email,
        ]);

        $langs = ['az','en','ru'];
        foreach ($langs as $lang) {
            Translate::getTranslate($vacancy,$lang)->update([
                'title' => json_decode($request->title_lang)->$lang,
                'description_az' => $request->description_az,
                'description_en' => $request->description_en,
                'description_ru' => $request->description_ru,
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->route('vacancies');
    }

    public function delete($id)
    {
        $vacancy = Vacancy::all()->find($id);
        try {
            foreach ($vacancy->langs as $lang) {
                $lang->delete();
            }
            $vacancy->delete();
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
