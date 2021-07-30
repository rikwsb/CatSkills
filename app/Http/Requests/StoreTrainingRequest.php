<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTrainingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => [
                'required', 'string',
            ],
            'date'    => [
                'required',
            ],
        ];
    }

    public function authorize()
    {
        //return Gate::allows('user_access');
    }
}
