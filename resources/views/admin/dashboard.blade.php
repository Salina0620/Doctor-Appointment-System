<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
        <div class="flex justify-around">
            <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-lg w-1/3 text-center">
                <h2 class="text-xl font-semibold mb-2">Patients</h2>
                <p class="text-3xl font-bold">{{ $total_patient }}</p>
            </div>
            <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-lg w-1/3 text-center">
                <h2 class="text-xl font-semibold mb-2">Doctors</h2>
                <p class="text-3xl font-bold">{{ $total_doctor }}</p>
            </div>
            <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-lg w-1/3 text-center">
                <h2 class="text-xl font-semibold mb-2">Appointments</h2>
                <p class="text-3xl font-bold">{{ $total_appointment }}</p>
            </div>
        </div>
    </div>
</body>
</html>
