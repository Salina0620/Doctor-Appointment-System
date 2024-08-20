<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AppointmentBooked;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorId = Auth::id(); // Assuming the doctor is authenticated
        $shifts = Shift::where('doctor_id', $doctorId)
            ->where('date', '>=', now()->toDateString())
            ->whereDoesntHave('appointments', function ($query) {
                $query->whereDate('date', now()->toDateString())
                    ->whereTime('start_time', '<=', now()->toTimeString())
                    ->whereTime('end_time', '>=', now()->toTimeString());
            })
            ->get();

        return view('doctor.dashboard', compact('shifts')); // Update to correct view
    }

    public function dashboard()
    {
        $appointments = Appointment::with('patient.user') // Eager-load the patient and user relationship
            ->where('doctor_id', Auth::id())
            ->get();

        return view('doctor.dashboard', compact('appointments'));
    }




    /**
     * Show the form for creating a new appointment.
     */
    public function create(Request $request)
    {
        $departments = Department::all();
        $doctors = collect(); // Initialize as an empty collection

        if ($request->has('department_id')) {
            $departmentId = $request->input('department_id');
            $doctors = Doctor::where('department_id', $departmentId)->get();
        }

        return view('patient.bookAppointment', compact('departments', 'doctors'));
    }

    /**
     * Show doctors based on selected department.
     */
    public function showDoctors(Request $request)
    {
        $departments = Department::all();
        $doctors = collect(); // Initialize as an empty collection
        $selectedDepartmentId = $request->input('department_id');

        if ($selectedDepartmentId) {
            $doctors = Doctor::where('department_id', $selectedDepartmentId)->get();
        }

        return view('patient.bookAppointment', [
            'departments' => $departments,
            'doctors' => $doctors,
            'selectedDepartmentId' => $selectedDepartmentId
        ]);
    }

    /**
     * Show available shifts for a specific doctor.
     */
    public function showDoctorShifts($doctorId)
    {
        $doctor = Doctor::findOrFail($doctorId);
        $shifts = Shift::where('doctor_id', $doctorId)
            ->where('date', '>=', now()->toDateString())
            ->get();

        return view('patient.doctorShifts', [
            'doctor' => $doctor,
            'shifts' => $shifts
        ]);
    }

    public function scheduleShift()
    {
        return view('doctor.scheduleShift');
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'shift_id' => 'required|exists:shifts,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        
  // Retrieve the shift and doctor
  $shift = Shift::findOrFail($request->shift_id);
  $doctor = Doctor::findOrFail($request->doctor_id);

  // Check if the shift is fully booked
  $appointmentsCount = Appointment::where('doctor_id', $request->doctor_id)
                                  ->where('shift_id', $request->shift_id)
                                  ->count();

  if ($appointmentsCount >= 3) {
      return redirect()->back()->withErrors(['This shift has already been fully booked. Please select another shift.']);
  }

  // Check if an appointment with the same details already exists
  $existingAppointment = Appointment::where([
      ['patient_id', '=', Auth::id()],
      ['doctor_id', '=', $request->doctor_id],
      ['date', '=', $request->date],
      ['start_time', '=', $request->start_time],
      ['end_time', '=', $request->end_time],
  ])->first();

  if ($existingAppointment) {
      return redirect()->back()->withErrors(['An appointment with the same details already exists.']);
  }

  // Store the appointment in the database
  $appointment = Appointment::create([
      'doctor_id' => $request->doctor_id,
      'patient_id' => Auth::id(),
      'shift_id' => $request->shift_id,
      'date' => $request->date,
      'start_time' => $request->start_time,
      'end_time' => $request->end_time,
  ]);

  // Notify doctor and patient
  Notification::send([$doctor->user, Auth::user()], new AppointmentBooked($appointment));

  // Redirect with success message
  if (Auth::user()->role === 'patient') {
      return redirect()->route('patient.dashboard')->with('success', 'Appointment booked successfully.');
  } else {
      return redirect()->route('doctor.dashboard')->with('success', 'New appointment booked.');
  }


    }

}