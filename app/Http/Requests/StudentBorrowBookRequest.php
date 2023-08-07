<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentBorrowBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'book_ids' => 'required|array',
            'student_id' => 'required|integer|exists:students,id',
            'issued_date' => 'required|date',
            'book_ids.*' => 'required|integer|exists:books,id'
        ];
    }
}
