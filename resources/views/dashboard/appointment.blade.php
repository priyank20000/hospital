<!-- resources/views/admin/loging_active_table.blade.php -->

@extends('layout.admin_base')
@section('base')
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-4" style="margin-left: 2rem;">LOGING ACTIVE TABLE</h6>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Doctor Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Speciality</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Patient Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Appointment Time</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Amount</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <!-- You may need to adjust this part based on your actual data structure -->
                                    @foreach ($source as $appointment)
                                        <tr>

                                            <td class="align-middle text-center">

                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->id }}</span>
                                            </td>
                                            <td class="align-middle text-center">


                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->firstname }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->services }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->time }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->status }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $appointment->amount }}</span>
                                            </td>
                                            <td class="text-secondary opacity-7"></td>
                                        </tr>
                                    @endforeach
                                    <!-- End of adjustment -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
