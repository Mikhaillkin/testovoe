<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvgGradeStudentBySubjectRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject_ids' => ['nullable', 'array'],
            'subject_ids.*' => ['integer'],
            'date_from'  => ['nullable', 'date', 'date_format:Y-m-d'],
            'date_to'    => ['nullable', 'date', 'date_format:Y-m-d', 'after_or_equal:date_from'],
            'age_from'   => ['nullable', 'integer', 'min:0'],
            'age_to'     => ['nullable', 'integer', 'min:0', 'gte:age_from'],
        ];
    }
}
