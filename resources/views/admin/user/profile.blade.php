@extends('master')

@section('content')
    <div class="container-fluid" style="margin-top: 100px">
        <div class="row my-3">

            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Profile Info</h3>
                    </div>
                    <div class="card-body">

                        @if (Auth::user()->image != '')
                            <img style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;"
                                src="{{ asset('/uploads/user') }}/{{ Auth::user()->image }}" alt="">
                        @else
                            <img style="width: 100px;" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                        @endif

                        <div class="my-3">
                            <p>Name: <b>{{ Auth::user()->name }}</b></p>
                            <p>Email: <b>{{ Auth::user()->email }}</b></p>
                        </div>
                    </div>
                </div>

            </div>



            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Profile Info Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Profile.Info.Update') }}" method="POST">
                            @csrf

                            <div class="my-3 form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Name"
                                    class="form-control">


                            </div>

                            <div class="my-3 form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email"
                                    class="form-control">
                            </div>

                            <div class="my-3 form-group">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <div class="row my-3">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            Profile Image Update
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Profile.Image.Update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group my-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>

                            <div class="my-2">
                                <img width="100" id="blah" alt="">
                            </div>

                            <div class="form-group my-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Profile Password Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Profile.Password.Update') }}" method="POST">
                            @csrf


                            <div class="form-group my-3">
                                <label>New Password</label>
                                <input type="password" name="newPassword" class="form-control" placeholder="New Password">
                                @error('newPassword')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="form-group my-3">
                                <label>Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control"
                                    placeholder="Confirm Password">
                                @error('confirmPassword')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="form-group my-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
