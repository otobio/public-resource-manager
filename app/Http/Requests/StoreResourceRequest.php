<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
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
        return [
           // 'id' => ['sometimes', 'exists:resources,id'],
            'name' => ['required', 'string'],
            'type' => ['required', 'in:pdf,link,snippet'],
            'file' => ['required_if:type,pdf', 'max:200000', 'mimes:pdf'],
            'description' => ['required_if:type,snippet', 'string'],
            'snippet' => ['required_if:type,snippet', 'string'],
            'link' => ['required_if:type,link', 'url'],
            'open_in_tab' => ['sometimes', 'boolean'],
        ];
    }
}
