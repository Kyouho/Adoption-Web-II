<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Application;
use App\Models\Adoption;

class ReportController extends Controller
{
    public function index()
    {
        $totalAnimals = Animal::count();

        $totalApplications = Application::count();

        $totalAdoptions = Adoption::count();

        return view(
            'admin.reports.index',
            compact(
                'totalAnimals',
                'totalApplications',
                'totalAdoptions'
            )
        );
    }

    public function adoptions()
    {
        $adoptions = Adoption::with([
            'application.user',
            'application.animal'
        ])->get();

        return view(
            'admin.reports.adoptions',
            compact('adoptions')
        );
    }

    public function stats()
    {
        $animals = Animal::count();

        $applications = Application::count();

        $adoptions = Adoption::count();

        $availableAnimals = Animal::where(
            'status',
            'available'
        )->count();

        return view(
            'admin.stats',
            compact(
                'animals',
                'applications',
                'adoptions',
                'availableAnimals'
            )
        );
    }
}