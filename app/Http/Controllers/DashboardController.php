<?php

namespace App\Http\Controllers;

use App\Models\PetReport;

class DashboardController extends Controller
{
    public function index()
    {
        $totalReports = PetReport::count();

        $activeReports = PetReport::where('status', 'active')->count();

        $foundReports = PetReport::where('status', 'found')->count();

        $recentReports = PetReport::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalReports',
            'activeReports',
            'foundReports',
            'recentReports'
        ));
    }
}