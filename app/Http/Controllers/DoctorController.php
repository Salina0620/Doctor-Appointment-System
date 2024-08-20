<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Shift;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('doctor.appointments', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        // return view('doctor.create',["departments"=>$departments, 'user_id']);
        return view('doctor.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $doctor_validate = $request->validate([

            'department_id' => 'required|exists:departments,id',
            'phone_no' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image'

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            $doctor_validate['image'] = $name;
        }


        $doctor_validate['user_id'] = $user->id;
        // dd($doctor_validate);

        Doctor::create($doctor_validate);

        return redirect()->route('doctor.dashboard', $user->doctor->id);
    }

    public function dashboard()
    {
        $appointments = Appointment::with('patient.user') // Eager-load the patient and user relationship
            ->where('doctor_id', Auth::id())
            ->get();

        return view('doctor.dashboard', compact('appointments'));
    }


    public function showShiftsForm()
    {
        return view('doctor.scheduleShift');
    }
    public function storeShift(Request $request)
    {
        $request->validate([
            'shift_type' => 'required|in:morning,afternoon,evening',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Shift::create([
            'doctor_id' => Auth::id(),
            'shift_type' => $request->shift_type,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return redirect()->route('doctor.dashboard')->with('success', 'Shift scheduled successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.show', ['doctor' => $doctor]);
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
