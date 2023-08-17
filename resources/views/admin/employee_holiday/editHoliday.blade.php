@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px;">
        <a href="{{ route('Employee.Holiday') }}" class="btn btn-primary my-2">Holiday List</a>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Employee Holiday Edit</h3>
            </div>

            <div class="card-body">
                <form class="col" method="POST" action="{{ route('Employee.Holiday.Update') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <input type="hidden" name="id" value="{{ $holiday->id }}">



                    <div class="row">
                        <div class="col-lg-6">
                            <label class="my-1">Employee</label>
                            <select name="employee_id" class="form-control">
                                <option disabled selected>-- Select Employee --</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ $holiday->employee_id == $employee->id ? 'selected' : '' }}>
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
                            <label class="my-1">Total Holiday</label>
                            <input type="number" class="form-control" name="holiday" value="{{ $holiday->holiday }}">
                            @error('holiday')
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
