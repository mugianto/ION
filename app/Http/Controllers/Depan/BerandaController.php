<?php

namespace App\Http\Controllers\Depan;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;


class BerandaController extends Controller
{
    public function berandanya()
    {
        return view('depan.ion.index');
    }
}
