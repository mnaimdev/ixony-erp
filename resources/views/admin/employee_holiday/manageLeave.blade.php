@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px">
        <a href="{{ route('Employee.Leave') }}" class="btn btn-primary my-2">Leave Request</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Manage Leave</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>SL</th>
                                <th>Employee</th>
                                <th>Holiday</th>
                                <th>Taken</th>
                                <th>Available</th>
                            </thead>
                            <tbody>
                                @foreach ($employees as $sl => $employee)
                                    @php
                                        $employeeHoliday = App\Models\EmployeeHoliday::where('employee_id', $employee->id)->first();
                                        
                                        $holiday = $employeeHoliday == '' ? 0 : $employeeHoliday->holiday;
                                        
                                        $employeeHolidayTaken = App\Models\EmployeeLeave::where('employee_id', $employee->id)->sum('total');
                                        
                                        $availableHoliday = $holiday - $employeeHolidayTaken;
                                        
                                    @endphp

                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>
                                            {{ $holiday }}
                                        </td>
                                        <td>
                                            {{ $employeeHolidayTaken }}
                                        </td>
                                        <td>
                                            {{ $availableHoliday }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
