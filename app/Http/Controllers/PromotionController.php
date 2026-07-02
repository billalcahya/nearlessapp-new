<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromotionController extends Controller
{
    //
    public function index()
    {
        // 1. Ambil semua promo yang aktif menggunakan scopeActive yang sudah dibuat
        $promos = Promo::active()->get();

        // 2. Kirim variabel $promos ke dalam file view promotions.blade.php
        return view('promotions', compact('promos'));
    }
}
