<?php

namespace App\Http\Controllers;
use App\Models\Lomba;
use App\Models\Webinar;

use Illuminate\Http\Request;

class DashboarduserController extends Controller
{
    public function index (){
         $semuaLomba = Lomba::latest()->get();
         $semuaWebinar = Webinar::latest()->get();
        return view('halaman.dashboarduser', compact('semuaLomba', 'semuaWebinar'));
}
}
