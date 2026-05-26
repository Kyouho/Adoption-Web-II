<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Animal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('animal')
            ->where('user_id', Auth::id())
            ->get();

        return view(
            'applications.index',
            compact('applications')
        );
    }

    public function show($id)
    {
        $application = Application::with([
            'animal',
            'user'
        ])
        ->where('user_id', Auth::id())
        ->findOrFail($id);

        return view(
            'applications.show',
            compact('application')
        );
    }

public function apply($id)
{
    $animal = Animal::findOrFail($id);

    if ($animal->status !== 'available') {
        return redirect()
            ->route('animals.show', $animal->id)
            ->with('error', 'Este animal no está disponible para adopción');
    }

    return view('applications.apply', compact('animal'));
}

    public function store(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        if ($animal->status !== 'available') {
    return redirect()
        ->route('animals.show', $animal->id)
        ->with('error', 'Este animal no está disponible para adopción');
}

        // Validación
        $request->validate([

            'housing_type' => 'required|max:255',

            'experience_with_pets' => 'nullable',

            'motivation' => 'required|min:10',

        ]);

        // Evitar duplicados
        $existing = Application::where('user_id', Auth::id())
            ->where('animal_id', $animal->id)
            ->whereIn('status', [
                'pending',
                'in_review',
                'approved'
            ])
            ->exists();

        if($existing) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Ya tienes una solicitud para este animal'
                );

        }

        Application::create([

            'user_id' => Auth::id(),

            'animal_id' => $animal->id,

            'housing_type' => $request->housing_type,

            'experience_with_pets'
                => $request->experience_with_pets,

            'motivation' => $request->motivation,

            'status' => 'pending',

        ]);

        // Cambiar estado animal
        if($animal->status === 'available') {

            $animal->update([
                'status' => 'in_process'
            ]);

        }

        return redirect()
            ->route('applications.index')
            ->with(
                'success',
                'Solicitud enviada correctamente'
            );
    }
}