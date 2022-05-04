<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingConroller extends Controller
{
    public function index()
    {
        return view('manage.settings.index')
            ->with('setting', Setting::all()->first());
    }

    public function save(SettingRequest $request)
    {
        $setting = Setting::all()->first();
        if ($setting) {
            $request->header_logo = $setting->header_logo;
            $request->footer_logo = $setting->footer_logo;
            if ($request->hasFile('header_logo')) {
                FileManager::delete($setting->header_logo, '');
                $setting->header_logo = FileManager::upload($request->file('header_logo'), '');

            }
            if ($request->hasFile('footer_logo')) {
                FileManager::delete($setting->footer_logo, '');
                $setting->footer_logo = FileManager::upload($request->file('footer_logo'), '');
            }
            $setting->update([
                'email' => $request->email,
                'phones' => $request->phones,
            ]);
        } else {
            Setting::create([
                'email' => $request->email,
                'phones' => $request->phones,
                'header_logo' => FileManager::upload($request->file('header_logo'), ''),
                'footer_logo' => FileManager::upload($request->file('footer_logo'), ''),
            ]);
        }
        toastr()->success('Successfully Saved');
        return redirect()->back();
    }
}
