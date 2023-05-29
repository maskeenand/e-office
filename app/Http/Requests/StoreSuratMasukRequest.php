<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratMasukRequest extends FormRequest
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
            // 'txtnosurat' => 'required|unique:surat_masuk,no_surat|min:7|max:10',
            // 'tglsurat' => 'required',
            // 'tglditerima' => 'required',
            // 'txtdari' => 'required',
            // 'txtperihal' => 'required',
            // 'txtdisposisi' => 'required',
            // 'txtfilesurat' => 'required',
            // 'txtketerangan' => 'required'
        ];

    }
}
