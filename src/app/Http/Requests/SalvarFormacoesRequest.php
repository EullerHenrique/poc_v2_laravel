<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalvarFormacoesRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'formacao' => 'required|array',
            'formacao.*.link' => 'required',
            'formacao.*.title' => 'required',
            'formacao.*.categoryName' => 'required',
            'formacao.*.icon' => 'required',
            'formacao.*.formattedDate' => 'required',
        ];
    }
}
