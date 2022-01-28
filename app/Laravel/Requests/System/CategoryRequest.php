<?php

namespace App\Laravel\Requests\System;

use App\Laravel\Requests\RequestManager;

class CategoryRequest extends RequestManager
{
    public function rules()
    {
        return [
            'title' => "required",
            'status' => "nullable",
        ];
    }

    public function messages()
    {
        return [
            'required' => "This field is required",
        
        ];
    }
}