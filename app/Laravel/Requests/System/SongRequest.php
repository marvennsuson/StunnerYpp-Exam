<?php

namespace App\Laravel\Requests\System;

use App\Laravel\Requests\RequestManager;

class SongRequest extends RequestManager
{
    public function rules()
    {
        return [
            'title' => "required",
            'categ_id' => "required",
            'artist' => "required",
            'lyrics' => "required",
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