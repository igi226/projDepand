<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>'required|string',
            'email' =>'required|email',
            'phone' =>'string|nullable',
            'address' =>'required|string',
            'biography' =>'string|max:1000|nullable',
            'resume' =>'mimes:doc,docx,pdf|max:10000|nullable',
            'experience' =>'string|nullable',
            'skills' =>'string|nullable',
            'github_link' =>'string|nullable',
            'linkdin_link' =>'string|nullable',
            'video' =>'mimes:mp4|nullable',
            'company_name' =>'string|nullable',
            'company_website' =>'string|nullable',
            'company_employee_strength' =>'string|nullable',
            'company_address' =>'string|nullable',
            'company_image' =>'mimes:jpeg,jpg,png,gif|max:10000|nullable',
            'degree' =>'string|nullable',
            'school' =>'string|nullable',
            'passing_year' =>'string|nullable',
        ];
    }
}
