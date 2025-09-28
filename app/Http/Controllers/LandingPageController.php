<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Webinar;

class LandingPageController extends Controller
{
    public function index()
    {
        // ambil hanya 4 lomba terbaru
        $lombas = \App\Models\Lomba::latest()->take(4)->get();
        $webinars = \App\Models\Webinar::latest()->take(2)->get();
        return view('halaman.landingPage', compact('lombas', 'webinars'));
    }
}
