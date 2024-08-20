<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Shift</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        label {
            font-size: 16px;
            color: #333333;
            margin-bottom: 4px;
        }
        select, input[type="date"], input[type="time"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 12px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <h1>Schedule Your Shift</h1>
        <form method="POST" action="{{ route('shift.store') }}">
            @csrf
            <!-- Hidden input for doctor_id -->
            <input type="hidden" name="doctor_id" value="{{ Auth::id() }}">
            
            <label for="shift_type">Shift Type</label>
            <select id="shift_type" name="shift_type" required>
                <option value="Morning">Morning</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
            </select>

            <label for="date">Date</label>
            <input id="date" name="date" type="date" required>

            <label for="start_time">Start Time</label>
            <input id="start_time" name="start_time" type="time" required>

            <label for="end_time">End Time</label>
            <input id="end_time" name="end_time" type="time" required>

            <button type="submit">Schedule Shift</button>
        </form>
    </div>
</body>
</html>
