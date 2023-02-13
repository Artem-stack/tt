<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            "name" => ["required"],
            "email" => ["required"],
            "head" => ["required"],
            "admin_created_id" => ["required"],
            "admin_updated_id" => ["required"],
            "phone" => ["required"],
            "position_id" => ["required"],
            "image" => ["required"],
            "salary" => ["required"],
            "created_at" => ["required"],

           
        ];
    }
}

 
