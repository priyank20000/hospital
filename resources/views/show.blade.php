<!-- show.blade.php -->
@extends('base')

@section('work')
    <div class="container mt-4">
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="icu-tab" data-bs-toggle="tab" href="#icu" role="tab" aria-controls="icu" aria-selected="true">ICU Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="false">General Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="delexue-tab" data-bs-toggle="tab" href="#delexue" role="tab" aria-controls="delexue" aria-selected="false">delexue Data</a>
            </li>
        </ul>
        <div class="tab-content mt-2" id="myTabsContent">
            <label for="searchInput" class="form-label">Search by Name:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Enter name...">
                <button class="btn btn-primary" onclick="performSearch()">Search</button>
            </div>

            <div class="tab-pane fade show active" id="icu" role="tabpanel" aria-labelledby="icu-tab">
                <h1 class="mt-3">ICU Data</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Cost</th>
                            <th>room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($icuData as $icu)
                            <tr>
                                <td>{{ $icu->id }}</td>
                                <td>{{ $icu->name }}</td>
                                <td>{{ $icu->email }}</td>
                                <td>{{ $icu->phone_number }}</td>
                                <td>{{ $icu->cost }}</td>
                                <td>{{ $icu->dropdown_option }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
                <h1 class="mt-3">General Data</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Cost</th>
                            <th>room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($generalData as $general)
                            <tr>
                                <td>{{ $general->id }}</td>
                                <td>{{ $general->name }}</td>
                                <td>{{ $general->email }}</td>
                                <td>{{ $general->phone_number }}</td>
                                <td>{{ $general->cost }}</td>
                                <td>{{ $general->dropdown_option }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <h1 class="mt-3">Personal Data</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Cost</th>
                            <th>room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personalData as $personal)
                            <tr>
                                <td>{{ $personal->id }}</td>
                                <td>{{ $personal->name }}</td>
                                <td>{{ $personal->email }}</td>
                                <td>{{ $personal->phone_number }}</td>
                                <td>{{ $personal->cost }}</td>
                                <td>{{ $personal->dropdown_option }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="delexue" role="tabpanel" aria-labelledby="delexue-tab">
                <h1 class="mt-3">Personal Data</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Cost</th>
                            <th>room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delexueData as $personal)
                            <tr>
                                <td>{{ $personal->id }}</td>
                                <td>{{ $personal->name }}</td>
                                <td>{{ $personal->email }}</td>
                                <td>{{ $personal->phone_number }}</td>
                                <td>{{ $personal->cost }}</td>
                                <td>{{ $personal->dropdown_option }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function performSearch() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var tabs = document.querySelectorAll('.tab-pane');

            tabs.forEach(function(tab) {
                var tableRows = tab.querySelectorAll('tbody tr');

                tableRows.forEach(function(row) {
                    var rowData = row.textContent.toLowerCase();

                    if (rowData.includes(input)) {
                        row.style.display = ''; // Show the row
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });
            });
        }
    </script>
@endsection
