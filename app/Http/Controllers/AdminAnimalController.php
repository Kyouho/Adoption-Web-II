<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AdminAnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();

        return view(
            'admin.animals.index',
            compact('animals')
        );
    }

    public function create()
    {
        return view('admin.animals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'breed' => 'nullable|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required',
            'health_status' => 'nullable|max:255',
            'vaccines' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable'
        ]);

        Animal::create($validated);

        return redirect()
            ->route('admin.animals')
            ->with('success', 'Animal registrado correctamente');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);

        return view(
            'admin.animals.show',
            compact('animal')
        );
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);

        return view(
            'admin.animals.edit',
            compact('animal')
        );
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'breed' => 'nullable|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required',
            'health_status' => 'nullable|max:255',
            'vaccines' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable'
        ]);

        $animal->update($validated);

        return redirect()
            ->route('admin.animals.show', $animal->id)
            ->with('success', 'Animal actualizado');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);

        $animal->delete();

        return redirect()
            ->route('admin.animals')
            ->with('success', 'Animal eliminado');
    }
}