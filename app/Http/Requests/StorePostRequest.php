<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|max:1000',
            // Validation de la chaîne FEN optionnelle
            'fen_string' => 'nullable|string|max:255',
            // Validation que category_id est requis et existe dans la table categories
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
