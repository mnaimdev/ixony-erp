@extends('layouts.master')

@section('content')
    <div class="container my-2">
        <a href="{{ route('Employee.Attendence') }}" class="btn btn-primary my-2">Attendence List</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Date: {{ $attendences->first()->date }}</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Employee Name</th>
                                    <th>Date</th>
                                    <th>Staus</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($attendences as $sl => $attendence)
                                    <tr>

                                        <td>{{ $sl + 1 }}</td>

                                        <td>
                                            {{ $attendence->employee->name }}
                                        </td>
                                        <td>{{ date('Y-m-d', strtotime($attendence->date)) }}</td>
                                        <td>

                                            <span class="bg-dark text-white p-1"> {{ $attendence->status }}</span>

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
