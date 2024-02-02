<?php

namespace App\Http\Requests\Api\v1;

use App\Http\Requests\Traits\IsThreadRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreThreadRequest extends FormRequest
{
    use IsThreadRequest {
        rules as requestRules;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge($this->requestRules(), [
            'board_id' => [
                'required',
                'integer',
                'exists:boards,id',
            ],
        ]);
    }

}
