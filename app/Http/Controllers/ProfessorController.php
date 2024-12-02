<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $professor = Professor::with('person')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('salary', 'like', '%' . $search . '%');
                })->orWhereHas('person', function ($query) use ($search) {
                    $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('middle_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
                });
            })
            ->get();

        return inertia("Professor/Index", [
            'professor' => $professor,
        ]);
    }

    public function create()
    {
        return inertia('Professor/Create');
    }

    public function store(Request $request)
    {
        Professor::create([
            'person_id' => $request->person_id,
            'salary' => $request->salary,
        ]);
        return redirect()->route('professors.index');
    }

    public function edit(Professor $professor)
    {
        return inertia('Professor/Edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $professor->update([
            'person_id' => $request->person_id,
            'salary' => $request->salary,
        ]);
        return redirect()->route('professors.index');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professors.index');
    }
}
