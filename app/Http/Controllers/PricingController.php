<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class PricingController extends Controller
{
    //
public function index()
{
    // 1. Tetap mengambil layanan top seller untuk bagian atas layout
    $services = Service::where('is_active', true)
        ->where('is_top_seller', true)
        ->orderBy('base_price', 'asc')
        ->get();

    // 2. Mengambil kategori beserta SEMUA layanannya (termasuk yang top seller)
    $categories = Category::where('is_active', true)
        ->with(['services' => function ($query) {
            $query->where('is_active', true); // Menghapus filter is_top_seller
        }])
        ->get();

    return view('pricing', compact('services', 'categories'));
}
}
