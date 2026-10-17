<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Facility;
use App\Models\Graduate;
use App\Models\Program;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $recentActivities = ActivityLog::with('user')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'facilitiesCount'  => Facility::count(),
            'programsCount'    => Program::count(),
            'graduatesCount'   => Graduate::count(),
            'recentActivities' => $recentActivities,
        ]);
    }
}