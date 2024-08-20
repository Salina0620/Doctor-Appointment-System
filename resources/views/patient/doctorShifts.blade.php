<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Shifts</title>
</head>

<body>
    <h1>Available Shifts for Dr. {{ $doctor->user->name }}</h1>

    @if ($shifts->isNotEmpty())
        <ul>
            @foreach ($shifts as $shift)
                <li>
                    <strong>{{ ucfirst($shift->shift_type) }} Shift</strong> on {{ $shift->date }} from
                    {{ $shift->start_time }} to {{ $shift->end_time }}
                    <form method="POST" action="{{ route('appointment.store') }}" style="display:inline;">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <input type="hidden" name="date" value="{{ $shift->date }}">
                        <input type="hidden" name="time" value="{{ $shift->start_time }}">
                        <button type="submit">Book Appointment</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No available shifts for this doctor.</p>
    @endif
</body>

</html>
