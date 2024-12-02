<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $student = Student::with('person')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('student_number', 'like', '%' . $search . '%');
                })->orWhereHas('person', function ($query) use ($search) {
                    $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('middle_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
                });
            })
            ->get();

        return inertia("Student/Index", [
            'student' => $student,
        ]);
    }

    public function create()
    {
        return inertia('Student/Create');
    }

    public function store(Request $request)
    {
        Student::create([
            'person_id' => $request->person_id,
            'student_number' => $request->student_number,
        ]);
        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        return inertia('Student/Edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update([
            'person_id' => $request->person_id,
            'student_number' => $request->student_number,
        ]);
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
