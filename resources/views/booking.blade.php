@extends('base')

@section('work')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book a romm</title>
</head>
<body>

    <h1>Sample Form</h1>

    <!-- Display success or error message if they exist -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

 <!-- Display remaining space for Option 1 (ICU) -->
<div>
    Remaining space in Option 1 (ICU): {{ $remainingSpaceOption1 }}
</div>

<!-- Display remaining space for Option 2 (Delexue) -->
<div>
    Remaining space in Option 2 (Delexue): {{ $remainingSpaceOption2 }}
</div>

<!-- Display remaining space for Option 3 (Personal) -->
<div>
    Remaining space in Option 3 (Personal): {{ $remainingSpaceOption3 }}
</div>

<!-- Display remaining space for Option 4 (General) -->
<div>
    Remaining space in Option 4 (General): {{ $remainingSpaceOption4 }}
</div>


    <form action="{{ route('submitForm') }}" method="post">
        @csrf

        <div id="costDisplay"></div>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required>
        <br>

        <label for="dropdown">Select an option:</label>
        <select id="dropdown" name="dropdown_option" onchange="updateCost()" required>
            <option value="General">General Ward</option>
            <option value="Private">Private Room</option>
            <option value="Delexue">Delexue Room</option>
            <option value="ICU">ICU</option>
        </select>
        <br>

        <button type="submit">Submit</button>
    </form>



    <script>
        function updateCost() {
            var dropdown = document.getElementById('dropdown');
            var costDisplay = document.getElementById('costDisplay');
            var cost = 0;

            switch (dropdown.value) {
                case 'General':
                    cost = 3000;
                    break;
                case 'Private':
                    cost = 5000;
                    break;
                case 'Delexue':
                    cost = 8000;
                    break;
                case 'ICU':
                    cost = 9000;
                    break;
            }

            costDisplay.innerText = 'Cost for selected option: ' + cost;
        }
    </script>
</body>
</html>
@endsection
