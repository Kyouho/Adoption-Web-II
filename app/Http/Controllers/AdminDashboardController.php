<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Application;
use App\Models\Adoption;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalAnimals = Animal::count();

        $availableAnimals = Animal::where('status', 'available')->count();

        $inProcessAnimals = Animal::where('status', 'in_process')->count();

        $adoptedAnimals = Animal::where('status', 'adopted')->count();

        $totalApplications = Application::count();

        $pendingApplications = Application::where('status', 'pending')->count();

        $approvedApplications = Application::where('status', 'approved')->count();

        $totalAdoptions = Adoption::count();

        $totalUsers = User::where('role', 'user')->count();

        return view('admin.dashboard', compact(
            'totalAnimals',
            'availableAnimals',
            'inProcessAnimals',
            'adoptedAnimals',
            'totalApplications',
            'pendingApplications',
            'approvedApplications',
            'totalAdoptions',
            'totalUsers'
        ));
    }
}