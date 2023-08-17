@extends('layouts.master')

@section('content')
    <div class="container my-3">
        <a href="{{ route('Employee.Attendence.Create') }}" class="btn btn-primary my-2">Create Attendence</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Attendence List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($attendences as $sl => $attendence)
                                    <tr>

                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ date('Y-m-d', strtotime($attendence->date)) }}</td>
                                        <td>
                                            <a href=" {{ route('Employee.Attendence.Edit', $attendence->date) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('Employee.Attendence.View', $attendence->date) }}"
                                                class="btn btn-info">View</a>
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
        $('.delete').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var link = $(this).attr('data-delete');
                    location.href = link;
                }
            })
        });
    </script>
@endsection
