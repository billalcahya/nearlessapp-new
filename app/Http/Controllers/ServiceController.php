<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Faq;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = Category::with(['services' => function ($query) {
            $query->where('is_active', true);
        }])->where('is_active', true)->get();

        // Mengambil semua FAQ yang tidak punya service_id (FAQ Umum)
        $faqs = Faq::whereNull('service_id')->get();

        return view('services', compact('categories', 'faqs'));
    }

    public function show($slug)
    {
        // Mengambil service beserta FAQ yang ditautkan ke service ini saja
        $service = Service::with(['comparisonService', 'comparisonServiceTwo', 'faqs'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Jika ingin menggabungkan FAQ khusus service ini + FAQ umum di halaman detail:
        // $faqs = Faq::where('service_id', $service->id)->orWhereNull('service_id')->get();
        // Di view detail tinggal pakai: @foreach($faqs as $faq)
        
        // Mengambil data dari relasi eager loading di atas
        $faqs = $service->faqs; 

        $services = collect();

        if ($service->comparisonService && $service->comparisonService->is_active) {
            $services->push($service->comparisonService);
        }

        if ($service->comparisonServiceTwo && $service->comparisonServiceTwo->is_active) {
            $services->push($service->comparisonServiceTwo);
        }

        return view('services.show', compact('service', 'services', 'faqs'));
    }
}