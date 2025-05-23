<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $labels = ['January', 'February', 'March', 'April'];
        $data = [10, 20, 15, 25];

        return view('dashboard', compact('labels', 'data'));
    }
}
