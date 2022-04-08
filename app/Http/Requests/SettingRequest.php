<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(Setting::all()->count() > 0){
            return [
                'header_logo'=>'max:100|mimes:png,jpg,svg',
                'footer_logo'=>'max:100|mimes:png,jpg,svg',
                'email'=>'required|max:100',
                'phones'=>'required'
            ];
        }else{
            return [
                'header_logo'=>'required|max:100|mimes:png,jpg,svg',
                'footer_logo'=>'required|max:100|mimes:png,jpg,svg',
                'email'=>'required|max:100',
                'phones'=>'required'
            ];
        }
    }
}
