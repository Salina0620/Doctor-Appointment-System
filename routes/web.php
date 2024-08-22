<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// Route::get('/test-email', function () {
//     Mail::raw('This is a test email', function ($message) {
//         $message->to('your_test_email@example.com')
//                 ->subject('Test Email');
//     });

//     return 'Test email sent!';
// });

//Home Route
Route::get('/', function () {
    return view('welcome');
});


// Doctor Routes
Route::middleware('auth', 'doctor')->group(function () {
    Route::get('/doctor/dashboard', [AppointmentController::class, 'dashboard'])->name('doctor.dashboard');
});

// Patient Routes
Route::middleware('auth', 'patient')->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Doctor Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/dashboard', [AppointmentController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('shifts/create', [ShiftController::class, 'create'])->name('shifts.create');

    Route::get('/doctor/schedule', [ShiftController::class, 'create'])->name('doctor.schedule');
    Route::post('/doctor/schedule', [ShiftController::class, 'store'])->name('shifts.store');
    Route::get('/doctor/shifts', [ShiftController::class, 'index'])->name('doctor.shifts.index');
    Route::get('/doctor/shifts/{shift}', [ShiftController::class, 'show'])->name('doctor.shifts.show');
    Route::get('/doctor/shifts/{shift}/edit', [ShiftController::class, 'edit'])->name('doctor.shifts.edit');
    Route::put('/doctor/shifts/{shift}', [ShiftController::class, 'update'])->name('doctor.shifts.update');
});

// Patient Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    Route::get('/patient/book-appointment', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/patient/book-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/patient/doctors', [AppointmentController::class, 'showDoctors'])->name('appointment.showDoctors');
    Route::get('/patient/doctor-shifts/{doctorId}', [AppointmentController::class, 'showDoctorShifts'])->name('appointment.showDoctorShifts');
});

//patient
Route::resource('patient', PatientController::class);


// Appointment Routes
Route::resource('appointment', AppointmentController::class);

// Doctor Routes
Route::resource('doctor', DoctorController::class);

// Shift Routes
Route::resource('shift', ShiftController::class);

//admin routes
// Route::resource('admin', AdminController::class);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

require __DIR__ . '/auth.php';
