@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px;">


        @can('add_employee')
            <a href="{{ route('Employee.Create') }}" class="btn btn-primary my-2">Add New</a>
        @endcan

        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Employee List</h3>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Photo</th>
                        <th>NID Photo</th>
                        <th>Status</th>
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
                                    @if ($employee->photo == '')
                                        <img src="{{ Avatar::create($employee->name)->toBase64() }}" />
                                    @else
                                        <img width="50" height="50"
                                            src="{{ asset('/uploads/employee') }}/{{ $employee->photo }}" alt="">
                                    @endif

                                </td>
                                <td>
                                    @if ($employee->nid_photo == '')
                                        NA
                                    @else
                                        <img width="50" height="50"
                                            src="{{ asset('/uploads/employee/nid') }}/{{ $employee->nid_photo }}"
                                            alt="">
                                    @endif

                                </td>
                                <td>
                                    @can('employee_status')
                                        <div class="form-check form-switch">
                                            <input data-id="{{ $employee->id }}" class="form-check-input toggle-class"
                                                type="checkbox" id="flexSwitchCheckChecked" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                                {{ $employee->status ? 'checked' : '' }}>
                                        </div>
                                    @endcan
                                </td>


                                <td>
                                    @can('edit_employee')
                                        <a href="{{ route('Employee.Edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                    @endcan

                                    @can('view_employee')
                                        <a href="{{ route('Employee.View', $employee->id) }}" class="btn btn-info">View</a>
                                    @endcan
                                </td>

                            </tr>

                        </tbody>
                    @endforeach
                </table>

            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        $(function() {
            $('.toggle-class').change(function() {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Resigned Employee'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // code goes here
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        var id = $(this).data('id');


                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/changeStatus',
                            data: {
                                'status': status,
                                'id': id
                            },
                            success: function(data) {
                                alert(data.success);
                            }

                        })
                    }
                })

            });
        })
    </script>
@endsection
