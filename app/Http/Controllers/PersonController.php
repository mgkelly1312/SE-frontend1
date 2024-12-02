<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $people = Person::when($search, function ($query, $search) {
            return $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('middle_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('phone_no', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->get();

        return inertia("Person/Index", [
            'people' => $people,
        ]);
    }

    public function create()
    {
        return inertia('Person/Create');
    }

    public function store(Request $request)
    {
        Person::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
        ]);
        return redirect()->route('people.index');
    }

    public function edit(Person $person)
    {
        return inertia('Person/Edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $person->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
        ]);
        return redirect()->route('people.index');
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('people.index');
    }
}
