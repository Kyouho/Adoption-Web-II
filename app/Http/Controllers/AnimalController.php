<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();

        return view('animals.index', compact('animals'));
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);

        return view('animals.show', compact('animal'));
    }
}