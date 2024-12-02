<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $address = Address::with(['barangay', 'person'])
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('street', 'like', '%' . $search . '%')
                        ->orWhere('city', 'like', '%' . $search . '%');
                })->orWhereHas('barangay', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            })
            ->get();

        return inertia("Address/Index", [
            'address' => $address,
        ]);
    }

    public function create()
    {
        return inertia('Address/Create');
    }

    public function store(Request $request)
    {
        Address::create([
            'person_id' => $request->person_id,
            'barangay_id' => $request->barangay_id,
            'street' => $request->street,
            'city' => $request->city,
        ]);
        return redirect()->route('address.index');
    }

    public function edit(Address $address)
    {
        return inertia('Address/Edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $address->update([
            'person_id' => $request->person_id,
            'barangay_id' => $request->barangay_id,
            'street' => $request->street,
            'city' => $request->city,
        ]);
        return redirect()->route('address.index');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index');
    }
}
