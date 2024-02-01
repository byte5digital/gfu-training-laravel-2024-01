<?php

namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\ValidationRule;

trait IsThreadRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'between:5,191',
            ],
            'content' => [
                'required',
                'string',
            ],
        ];
    }
}
