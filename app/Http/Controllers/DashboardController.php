<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $project = Project::count();

        return view('dashboard.dashboard', [
            'project' => $project,
        ]);
    }
}
