@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px">

        @can('manage_leave')
            <a href="{{ route('Employee.Manage.Leave') }}" class="btn btn-primary my-3">Manage Leave</a>
        @endcan

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Holiday List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>SL</th>
                                <th>Employee</th>
                                <th>Holiday</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($employeeHoliday as $sl => $holiday)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $holiday->employee->name }}</td>
                                        <td>{{ $holiday->holiday }}</td>
                                        <td>
                                            @can('employee_edit_holiday')
                                                <a href="{{ route('Employee.Holiday.Edit', $holiday->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                            @endcan
                                            {{-- <a data-delete="{{ route('Employee.Holiday.Delete', $holiday->id) }}"
                                                class="btn btn-danger delete">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            @can('employee_add_holiday')
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Employee Holiday</h3>
                        </div>

                        <div class="card-body">
                            <form class="col" method="POST" action="{{ route('Employee.Holiday.Store') }}">
                                @csrf


                                @if (session('holiday'))
                                    <div class="alert alert-success">
                                        {{ session('holiday') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="my-1">Employee</label>
                                        <select name="employee_id" class="form-control">
                                            <option disabled selected>-- Select Employee --</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach


                                        </select>
                                        @error('employee_id')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror


                                    </div>

                                    <div class="col-lg-12">
                                        <label class="my-1">Total Holiday</label>
                                        <input type="number" class="form-control" name="holiday" value="{{ old('holiday') }}">
                                        @error('holiday')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-auto mt-3">
                                    <button type="submit" class="btn btn-primary mb-3">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div>

    </div>
@endsection


@section('script')
    <script>
        const deleteBtn = document.querySelectorAll('.delete');
        deleteBtn.forEach((item) => {
            item.addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const link = this.getAttribute('data-delete');
                        location.href = link;
                    }
                })
            });
        });
    </script>
@endsection
