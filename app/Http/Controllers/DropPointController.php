<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropPoint;

class DropPointController extends Controller
{
    //
    public function index()
    {
        $dropPoints = DropPoint::where('is_active', true)->get();

        return view('droppoint', compact('dropPoints'));
    }
}
