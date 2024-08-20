<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;
use App\Models\User;

use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.scheduleShift');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'shift_type' => 'required|in:Morning,Afternoon,Evening',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        $doctorId = Auth::id();
    
        // Ensure the doctor record exists
        $doctor = Doctor::where('user_id', $doctorId)->first();
        if (!$doctor) {
            return redirect()->back()->withErrors(['Doctor profile not found. Please complete your profile.'])->withInput();
        }

        try {
            Shift::create([
                'doctor_id' => $doctor->id,
                'shift_type' => $request->shift_type,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            return redirect()->route('doctor.dashboard')->with('success', 'Shift scheduled successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create shift: ' . $e->getMessage());
            return redirect()->back()->withErrors(['Failed to create shift. Please try again.'])->withInput();
        }
    }
    
    // catch (\Exception $e) {
    //     Log::error('Failed to create shift: ' . $e->getMessage());
    //     return redirect()->back()->withErrors(['Failed to create shift. Please try again.']);
    // }


    


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
