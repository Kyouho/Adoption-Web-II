<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Adoption;

use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with([
            'user',
            'animal'
        ])->get();

        return view(
            'admin.applications.index',
            compact('applications')
        );
    }

    public function show($id)
    {
        $application = Application::with([
            'user',
            'animal',
            'adoption'
        ])->findOrFail($id);

        return view(
            'admin.applications.show',
            compact('application')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Aprobar solicitud
    |--------------------------------------------------------------------------
    */

    public function approve($id)
    {
        $application = Application::with('animal')
            ->findOrFail($id);

        $animal = $application->animal;

        // Evitar doble aprobación
        if($animal->status === 'adopted') {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Este animal ya fue adoptado'
                );

        }

        // Aprobar solicitud
        $application->update([
            'status' => 'approved'
        ]);

        // Animal adoptado
        $animal->update([
            'status' => 'adopted'
        ]);

        // Rechazar automáticamente otras solicitudes
        Application::where(
            'animal_id',
            $animal->id
        )
        ->where('id', '!=', $application->id)
        ->whereIn('status', [
            'pending',
            'in_review'
        ])
        ->update([
            'status' => 'rejected'
        ]);

        // Crear adopción
        Adoption::create([

            'application_id' => $application->id,

            'adoption_date' => now(),

            'observations' => 'Adopción aprobada'

        ]);

        return redirect()
            ->route('admin.applications')
            ->with(
                'success',
                'Solicitud aprobada correctamente'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Rechazar solicitud
    |--------------------------------------------------------------------------
    */

    public function reject($id)
    {
        $application = Application::with('animal')
            ->findOrFail($id);

        $application->update([
            'status' => 'rejected'
        ]);

        $animal = $application->animal;

        // Verificar si quedan solicitudes activas
        $activeApplications = Application::where(
            'animal_id',
            $animal->id
        )
        ->whereIn('status', [
            'pending',
            'in_review',
            'approved'
        ])
        ->exists();

        // Si no quedan solicitudes activas
        if(!$activeApplications) {

            $animal->update([
                'status' => 'available'
            ]);

        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Solicitud rechazada'
            );
    }
}