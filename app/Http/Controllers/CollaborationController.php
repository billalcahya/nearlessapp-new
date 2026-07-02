<?php

namespace App\Http\Controllers;

use App\Models\BrandPartnership;
use Illuminate\Http\Request;

class CollaborationController extends Controller
{
    public function index()
    {
        $partnerships = BrandPartnership::with('dropPoints')
            ->where('is_active', true)
            ->get();

        $featured_partnership = BrandPartnership::with('dropPoints')
            ->where('is_active', true)
            ->latest()
            ->first();

        return view('collaborations', compact('partnerships', 'featured_partnership'));
    }
}