@extends('master')


@section('content')
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Employee Resigned List</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-striped">
                            <thead>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($employees as $sl => $employee)
                                <tbody>

                                    <tr>
                                        <td>
                                            {{ $sl + 1 }}
                                        </td>
                                        <td>
                                            <h5 class="font-14 my-1 fw-normal">{{ $employee->name }}</h5>
                                        </td>

                                        <td>
                                            <h5 class="font-14 my-1 fw-normal">{{ $employee->designation }}</h5>
                                        </td>


                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/employee') }}/{{ $employee->photo }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger">Resigned</a>
                                        </td>

                                        <td>
                                            @php
                                                $joiningDate = Carbon\Carbon::parse($employee->joining_date);
                                                $resignedDate = Carbon\Carbon::parse($employee->resigned_date);
                                                $calculate = $resignedDate->diffInDays($joiningDate);
                                                $duration = floor($calculate / 365);
                                                $formatYears = number_format($duration, 2);
                                            @endphp
                                            <span>{{ $formatYears }} Years</span>
                                        </td>

                                        <td>
                                            @can('employee_resigned_view')
                                                <a href="{{ route('Employee.Resigned.View', $employee->id) }}"
                                                    class="btn btn-primary">View</a>
                                            @endcan
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
    </div>
@endsection
