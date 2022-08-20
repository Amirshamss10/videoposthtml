<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreVideoRequest extends FormRequest
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
    public function rules(request $request)
    {
        return [
            $request->validate([
                "name"=> ["required"],
                "url"=> ["required","unique:videos", "alpha_dash"], 
                "lenght"=> ["required", "integer"],
                "thumbnail"=> ["required"]
            ])
        ];
    }
    protected function prepareForValidation() {
        $this->merge([
            "slug" => Str::slug($this->slug)
        ]); 
    }
}
