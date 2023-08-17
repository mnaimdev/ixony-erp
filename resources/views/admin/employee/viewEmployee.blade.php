@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">


        <div class="col-lg-12 m-auto col-sm-12 col-md-12">
            <a href="{{ route('Employee') }}" class="btn btn-primary my-3">List</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">View Employee</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Name: </b>{{ $employee->name }}</li>
                                <li class="list-group-item"><b>Email: </b>{{ $employee->email }}</li>
                                <li class="list-group-item"><b>Designation: </b>{{ $employee->designation }}</li>
                                <li class="list-group-item"><b>Current Address: </b>{{ $employee->current_address }}</li>
                                <li class="list-group-item"><b>Permanent Address: </b>{{ $employee->permanent_address }}
                                </li>

                                <li class="list-group-item"><b>Photo: </b>
                                    <img width="100" height="100"
                                        src="{{ asset('/uploads/employee') }}/{{ $employee->photo }}">
                                </li>


                            </ul>
                        </div>


                        <div class="col-lg-6">
                            <ul class="list-group">

                                <li class="list-group-item"><b>Personal Contact Number:
                                    </b>{{ $employee->personal_contact_number }}
                                </li>

                                <li class="list-group-item"><b>Office Contact Number:
                                    </b>{{ $employee->office_contract_number }}
                                </li>
                                <li class="list-group-item"><b>Whatsapp Number:
                                    </b>{{ $employee->whatsapp_number }}
                                </li>
                                <li class="list-group-item"><b>NID Number:
                                    </b>{{ $employee->nid_number }}
                                </li>

                                @php
                                    $date = new DateTime($employee->joining_date);
                                @endphp

                                <li class="list-group-item"><b>Joining Date:
                                    </b> {{ $date->format('d-m-Y') }}
                                </li>

                                <li class="list-group-item"><b>NID Photo: </b>
                                    <img width="100" height="100"
                                        src="{{ asset('/uploads/employee/nid') }}/{{ $employee->nid_photo }}">
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
