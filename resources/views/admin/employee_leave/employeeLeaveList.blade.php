@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px">
        @can('employee_add_leave_request')
            <a href="{{ route('Employee.Leave.Create') }}" class="btn btn-primary my-2">Add Leave Request</a>
        @endcan

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Leave List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>SL</th>
                                <th>Employee</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Total (Days)</th>
                                <th>Details</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @foreach ($employeeLeave as $sl => $leave)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $leave->employee->name }}</td>
                                        <td>{{ $leave->date_from }}</td>
                                        <td>{{ $leave->date_to }}</td>
                                        <td>
                                            @php
                                                $leaveFrom = Carbon\Carbon::parse($leave->date_from);
                                                $leaveTo = Carbon\Carbon::parse($leave->date_to);
                                                
                                            @endphp
                                            {{ $leaveTo->diffInDays($leaveFrom) }}
                                        </td>
                                        <td>{{ $leave->details }}</td>
                                        <td>
                                            @can('employee_edit_leave_request')
                                                <a href="{{ route('Employee.Leave.Edit', $leave->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                            @endcan
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


    @if (session('employee_leave_delete'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('employee_leave_delete') }}'
            })
        </script>
    @endif
@endsection
