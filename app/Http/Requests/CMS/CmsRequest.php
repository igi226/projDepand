<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;


class CmsRequest extends FormRequest
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
        // 'short_desc' => 'required|string',
           'description' => 'string|nullable',
        ];
    }
}
