<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'string|nullable',
            'location' => 'required|string',
            'type' => 'required|string',
            'experience' => 'required|string',
            'compensation' => 'required|string',
            'department_id' => 'required|numeric',
            'application_last_date' => 'required|date|after_or_equal:' . date('Y-m-d'),
            // 'cover_image' => 'mimes:jpeg,jpg,png,gif|max:10000|nullable',
            
            'number_of_post' => 'required|string',
            'skills_required' => 'required|string',
            'position' => 'required|string',
            
            
        ];
       
    }
}
