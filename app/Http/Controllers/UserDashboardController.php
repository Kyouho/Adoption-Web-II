<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalApplications = Application::where('user_id', Auth::id())->count();

        $pendingApplications = Application::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->count();

        $inReviewApplications = Application::where('user_id', Auth::id())
            ->where('status', 'in_review')
            ->count();

        $approvedApplications = Application::where('user_id', Auth::id())
            ->where('status', 'approved')
            ->count();

        $rejectedApplications = Application::where('user_id', Auth::id())
            ->where('status', 'rejected')
            ->count();

        return view('user.dashboard', compact(
            'totalApplications',
            'pendingApplications',
            'inReviewApplications',
            'approvedApplications',
            'rejectedApplications'
        ));
    }
}