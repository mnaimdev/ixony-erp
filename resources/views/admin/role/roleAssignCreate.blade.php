@extends('master')


@section('content')
    <div class="container" style="margin-top: 100px;">
        <a href="{{ route('Role.Assign') }}" class="btn btn-primary my-3">List</a>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3">Assign Role</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Assign.User.Role') }}" method="POST">
                            @csrf



                            <div class="form-group">
                                <select name="user_id" class="form-control">
                                    <option>-- Select User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="role_id" class="form-control">
                                    <option>-- Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
