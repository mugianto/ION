<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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
            'judul' => 'required',
            'slug' => 'required|unique:artikels',
            'kutipan' => 'required',
            'isi_artikel' => 'required',
            'id_kategori' => 'required',
            'terbit_tgl' => 'nullable | date | date_format:Y-m-d H:i:s',
            'gambar' => 'mimes:jpeg,png,jpg,gif|max:2048'
        ];
        switch($this->method()){
            case 'PUT';
            case 'PATCH';
            $rules['slug'] = 'required|unique:artikels,slug,' . $this->route('artikel');
            break;
        }
        return $rules;
    }
}
