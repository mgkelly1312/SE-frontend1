<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $barangay = Barangay::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return inertia("Barangay/Index", [
            'barangay' => $barangay,
        ]);
    }

    public function create()
    {
        return inertia('Barangay/Create');
    }

    public function store(Request $request)
    {
        Barangay::create([
            'name' => $request->name,
        ]);
        return redirect()->route('barangays.index');
    }

    public function edit(Barangay $barangay)
    {
        return inertia('Barangay/Edit', compact('barangay'));
    }

    public function update(Request $request, Barangay $barangay)
    {
        $barangay->update([
            'name' => $request->name,
        ]);
        return redirect()->route('barangays.index');
    }

    public function destroy(Barangay $barangay)
    {
        $barangay->delete();
        return redirect()->route('barangays.index');
    }
}
