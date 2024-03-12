<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriUpdateRequest extends FormRequest
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
        $rules = [
            'nama_kategori' => 'required',
            'slug_kategori' => 'required|unique:kategoris',
        ];
        switch($this->method()){
            case 'PUT';
            case 'PATCH';
            $rules['slug_kategori'] = 'required|unique:kategoris,slug_kategori,' . $this->route('kategori');
            break;
        }
        return $rules;
    }
}
