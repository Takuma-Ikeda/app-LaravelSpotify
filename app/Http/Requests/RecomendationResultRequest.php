<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecomendationResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'result'       => 'required|array',
            'result.error' => 'nullable|string',
            'result.song'  => 'nullable|string',
            'result.uri'   => 'nullable|string',
        ];
    }

    /**
     * Get Validation Message
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }
}
