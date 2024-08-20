<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Doctor Routes
Route::middleware('auth', 'doctor')->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');

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
//     Route::get('doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
//     Route::post('doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
//     // Route::get('/doctor/shifts', [DoctorController::class, 'showShiftsForm'])->name('doctor.shifts');
//     // Route::post('/doctor/store-shift', [DoctorController::class, 'storeShift'])->name('doctor.storeShift');


//     Route::get('/patient/reate', [PatientController::class, 'create'])->name('patient.create');
//     Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');


//     Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
//     Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');

//     // Route::post('/patient/dashboard', [PatientController::class, 'store'])->name('patient.dashboard');
//     // Route::post('/doctor/dashboard', [DoctorController::class, 'store'])->name('doctor.dashboard');
//     // Route::get('/patient/create/index', [PatientController::class, 'create'])->name('patient.create.index');
//     // Route::get('/patient/index', [PatientController::class, 'index'])->name('patient.index');
//     Route::get('/schedule-shift', [AppointmentController::class, 'scheduleShift'])->name('doctor.schedule');
//     Route::post('/doctor/schedule', [DoctorController::class, 'storeShift'])->name('doctor.storeShift');


//     Route::get('/schedule-shift', [ShiftController::class, 'create'])->name('shift.create');
//     Route::post('/schedule-shift', [ShiftController::class, 'store'])->name('shift.store');


//     // Route::get('/schedule-shift', [ShiftController::class, 'create'])->name('doctor.schedule');
//     // Route::post('/schedule-shift', [ShiftController::class, 'store'])->name('doctor.schedule.store');

//     Route::get('/book-appointment', [AppointmentController::class, 'showDoctors'])->name('appointment.showDoctors');
//     Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
//     Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
//     Route::get('/doctor/{doctorId}/shifts', [AppointmentController::class, 'showDoctorShifts'])->name('doctor.showDoctorShifts');
// });

// // Route::resource('patients', PatientController::class);
// // Route::resource('departments', DepartmentController::class);
// // Route::resource('doctors', DoctorController::class);
// // Route::resource('appointments', AppointmentController::class);


// Doctor Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
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



require __DIR__ . '/auth.php';
