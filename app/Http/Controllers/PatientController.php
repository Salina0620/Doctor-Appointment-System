<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Shift;

use App\Models\Department;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $appointments = Appointment::where('patient_id', Auth::user()->patient->id)->get();

        return view('patient.dashboard', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $patient = $request->validate([
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'phone_no' => 'required|string',
        ]);
        Patient::create([
            'user_id' => Auth::user()->id,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);


        return redirect()->route('patient.dashboard', $user->patient->id);
    }

    public function dashboard()
    {
       
        // Fetch appointments for the logged-in patient
        $patientId = Auth::user()->patient->id; // Get the logged-in patient's ID
        $appointments = Appointment::where('patient_id', $patientId)
                                    ->with('doctor') // Eager load doctor data
                                    ->get();

        return view('patient.dashboard', compact('appointments'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
