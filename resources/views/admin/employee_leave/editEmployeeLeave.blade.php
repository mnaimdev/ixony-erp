@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px;">
        <a href="{{ route('Employee.Leave') }}" class="btn btn-primary my-2">Leave List</a>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Employee Leave Edit</h3>
            </div>

            <div class="card-body">
                <form class="col" method="POST" action="{{ route('Employee.Leave.Update') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <input type="hidden" name="id" value="{{ $employeeLeave->id }}">


                    @if (session('employee_leave_update'))
                        <div class="alert alert-success">
                            {{ session('employee_leave_update') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="my-1">Employee</label>
                            <select name="employee_id" class="form-control">
                                <option disabled selected>-- Select Employee --</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ $employeeLeave->employee_id == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach

                            </select>
                            @error('employee_id')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror


                        </div>

                        <div class="col-lg-6">
                            <label class="my-1">Leave Date From</label>
                            <input type="date" class="form-control" name="date_from"
                                value="{{ $employeeLeave->date_from }}">
                            @error('date_from')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>


                    <div class="row my-3">
                        <div class="col-lg-6">
                            <label class="my-1">Leave Date To</label>
                            <input type="date" class="form-control" name="date_to"
                                value="{{ $employeeLeave->date_to }}">
                            @error('date_to')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="my-1">Details</label>
                            <textarea name="details" id="" cols="30" rows="4" class="form-control" placeholder="Details">
                                {{ $employeeLeave->details }}
                            </textarea>
                            @error('details')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>


                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
