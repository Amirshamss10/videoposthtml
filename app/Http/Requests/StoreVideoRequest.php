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
    public function rules()
    {
        return [
                "name"=> ["required"],
                "lenght"=> ["required", "integer"],
                "thumbnail"=> ["required"],
                "category_id" => ["required", "exists:categories,id"], 
                "file" => ["required", "file", "mimetypes:video/mp4"]
        ];
    }
    protected function prepareForValidation() {
        $this->merge([
            "slug" => Str::slug($this->slug)
        ]); 
    }
    public function messages() {
        return([
            "file.*" => "فایل باید ویدیویی باشد."
        ]);
    }
}
