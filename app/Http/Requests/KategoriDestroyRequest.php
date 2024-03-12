<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KategoriDestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        $id_kategori_default = 1; // Gantilah dengan ID kategori default yang sesuai

        // Mengambil nilai parameter 'kategori' dari route
        $id_kategori = $this->route('kategori');

        // Mengecek apakah kategori yang akan dihapus bukanlah kategori default
        return $id_kategori != $id_kategori_default;
    }

    public function rules(): array
    {
        return [
            // Aturan validasi lainnya jika diperlukan
        ];
    }
}


