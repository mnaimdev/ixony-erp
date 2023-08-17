@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px;">
        <a href="{{ route('Employee') }}" class="btn btn-primary my-2">List</a>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Employee</h3>
            </div>

            <div class="card-body">
                <form class="col" method="POST" action="{{ route('Employee.Update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $employee->id }}">


                    <div class="row">
                        <div class="col-lg-6">
                            <label class="my-1">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                value="{{ $employee->name }}">
                            @error('name')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror

                        </div>

                        <div class="col-lg-6">
                            <label class="my-1">Designation</label>
                            <input type="text" class="form-control" placeholder="Designation" name="designation"
                                value="{{ $employee->designation }}">
                            @error('designation')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>


                    <div class="row my-3">
                        <div class="col-lg-6">
                            <label class="my-1">Current Address</label>
                            <input type="text" class="form-control" placeholder="Current Address" name="current_address"
                                value="{{ $employee->current_address }}">
                            @error('current_address')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="my-1">Permanent Address</label>
                            <input type="text" class="form-control" placeholder="Permanent Address"
                                name="permanent_address" value="{{ $employee->permanent_address }}">
                            @error('permanent_address')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>


                    <div class="row my-3">
                        <div class="col-lg-6">
                            <label class="my-1">Personal Contact Number</label>
                            <input type="number" class="form-control" placeholder="Personal Contract Number"
                                name="personal_contract_number" value="{{ $employee->personal_contract_number }}">

                        </div>

                        <div class="col-lg-6">
                            <label class="my-1">Office Contact Number</label>
                            <input type="number" class="form-control" placeholder="Office Contract Number"
                                name="office_contract_number" value="{{ $employee->office_contract_number }}">

                            @error('office_contract_number')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>


                    <div class="row my-3">
                        <div class="col-lg-6">
                            <label class="my-1">Whatsapp Number</label>
                            <input type="number" class="form-control" placeholder="Whatsapp Number" name="whatsapp_number"
                                value="{{ $employee->whatsapp_number }}">
                            @error('whatsapp_number')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="my-1">Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email"
                                value="{{ $employee->email }}">
                            @error('email')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>



                    <div class="row my-3">
                        <div class="col-lg-6">
                            <label class="my-1">NID Number</label>
                            <input type="text" class="form-control" placeholder="NID Number" name="nid_number"
                                value="{{ $employee->nid_number }}">
                            @error('nid_number')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>


                        <div class="col-lg-6">
                            <label class="my-1">Joining Date</label>
                            <input type="date" name="joining_date" class="form-control"
                                value="{{ $employee->joining_date }}">
                            @error('joining_date')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>


                    </div>


                    <div class="row my-3">



                        <div class="col-lg-6">
                            <label class="my-1">Photo</label>
                            <input type="file" class="form-control" placeholder="Choose Photo" name="photo">
                            <div class="my-2">
                                <img width="100" height="100"
                                    src="{{ asset('/uploads/employee') }}/{{ $employee->photo }}" alt="">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <label class="my-1">NID Photo</label>
                            <input type="file" class="form-control" placeholder="Choose Photo" name="nid_photo">

                            <div class="my-2">
                                <img width="100" height="100"
                                    src="{{ asset('/uploads/employee/nid') }}/{{ $employee->nid_photo }}"
                                    alt="">
                            </div>
                        </div>

                    </div>


                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-primary mb-3">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
