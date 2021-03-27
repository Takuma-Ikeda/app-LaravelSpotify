<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConditionRequest extends FormRequest
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
            'seed_artists_1' => 'nullable|string',
            'seed_artists_2' => 'nullable|string',
            'seed_artists_3' => 'nullable|string',
            'seed_artists_4' => 'nullable|string',
            'seed_artists_5' => 'nullable|string',
            'seed_tracks_1'  => 'nullable|string',
            'seed_tracks_2'  => 'nullable|string',
            'seed_tracks_3'  => 'nullable|string',
            'seed_tracks_4'  => 'nullable|string',
            'seed_tracks_5'  => 'nullable|string',
            'seed_genres'    => 'nullable|string',
            'limit'          => 'nullable|integer',
            'min_tempo'      => 'nullable|integer',
            'max_tempo'      => 'nullable|integer',
            'modes'          => 'nullable|integer',
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

    public function withValidator($validator) {
        $seeds = [];

        $validator->after(function ($validator) {
            $seeds[] = $this->input('seed_genres');
            foreach (range(1, 5) as $i) {
                $seeds[] = $this->input('seed_artists_' . $i);
                $seeds[] = $this->input('seed_tracks_' . $i);
            }
            // 5 個以上 seed がある場合はエラー
            if (count(array_filter($seeds)) > 5) {
                $validator->errors()->add('seed', 'Seedデータは6つ以上組み合わせることができません');
            }
        });
    }
}
