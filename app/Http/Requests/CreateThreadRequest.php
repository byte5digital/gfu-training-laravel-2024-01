<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\IsThreadRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateThreadRequest extends FormRequest
{
    use IsThreadRequest;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

}
