<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function index()
    {
        return view('dashboard.index');
    }

    public function general_sale()
    {
        return view('dashboard.general_sale');
    }
    
    public function tax_sale() 
    {
        return view('dashboard.tax_sale');
    }
}
