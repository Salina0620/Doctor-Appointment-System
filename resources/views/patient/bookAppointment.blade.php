@php
    // Define the variable if not already set
    $selectedDepartmentId = $selectedDepartmentId ?? null;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 900px; /* Adjusted width */
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        select, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .doctor-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex; /* Flexbox for alignment */
            align-items: center;
        }

        .doctor-card img {
            border-radius: 50%;
            margin-right: 20px;
            width: 120px; /* Adjusted size */
            height: 120px; /* Adjusted size */
        }

        .doctor-card h3 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .shift-list {
            margin-top: 10px;
            padding: 0;
            list-style: none;
        }

        .shift-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .shift-list li:last-child {
            border-bottom: none;
        }

        .shift-list strong {
            color: #007bff;
        }

        .no-shifts {
            color: #888;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    @if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="container">
        <form method="GET" action="{{ route('appointment.showDoctors') }}">
            @csrf
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $selectedDepartmentId == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Show Doctors</button>
        </form>

        @if(isset($doctors) && $doctors->count() > 0)
            <h2>Doctors List</h2>
            @foreach($doctors as $doctor)
                <div class="doctor-card">
                    <img src="{{ asset('images/' . $doctor->image) }}" alt="{{ $doctor->user->name }}" style="width:100px;height:100px;">
                    <div>
                        <h3>{{ $doctor->user->name }}</h3>
                        @php
                            $shifts = \App\Models\Shift::where('doctor_id', $doctor->id)
                                           ->where('date', '>=', now()->toDateString())
                                           ->get();
                        @endphp
                        @if($shifts->count() > 0)
                            <ul class="shift-list">
                                @foreach($shifts as $shift)
                                    <li>
                                        <strong>{{ $shift->shift_type }} Shift</strong> on {{ $shift->date }} from {{ $shift->start_time }} to {{ $shift->end_time }}
                                        <form method="POST" action="{{ route('appointment.store') }}" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                            <input type="hidden" name="shift_id" value="{{ $shift->id }}">
                                            <input type="hidden" name="date" value="{{ $shift->date }}">
                                            <input type="hidden" name="start_time" value="{{ $shift->start_time }}">
                                            <input type="hidden" name="end_time" value="{{ $shift->end_time }}">
                                            <button type="submit">Book Appointment</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="no-shifts">No available shifts for this doctor.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>No doctors found for the selected department.</p>
        @endif
    </div>

    <a href="{{ route('patient.dashboard') }}">Return to Dashboard</a>

</body>
</html>
