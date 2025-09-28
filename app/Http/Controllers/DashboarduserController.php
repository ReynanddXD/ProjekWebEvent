<?php

namespace App\Http\Controllers;
use App\Models\Lomba;

use Illuminate\Http\Request;

class DashboarduserController extends Controller
{
    public function index (){
         $semuaLomba = Lomba::latest()->get();
        return view('halaman.dashboarduser', compact('semuaLomba'));
}
}
