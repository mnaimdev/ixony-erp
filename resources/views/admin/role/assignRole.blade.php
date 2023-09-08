@extends('master')

@section('content')
    <div class="container" style="margin-top: 100px;">

        <a href="{{ route('Role.Assign.Create') }}" class="
        btn btn-primary my-2">User Role Assign</a>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Assigned List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $sl => $user)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @forelse ($user->getRoleNames() as $role)
                                        <span class="badge badge-info">
                                            {{ $role }}
                                        </span>
                                    @empty
                                        <span>N/A</span>
                                    @endforelse
                                </td>
                                <td>
                                    <div class="row">
                                        @forelse ($user->getAllPermissions() as $permission)
                                            <div class="col">
                                                <span class="badge badge-secondary badge-sm m-1">
                                                    {{ $permission->name }}
                                                </span>
                                            </div>
                                        @empty
                                            <span>N/A</span>
                                        @endforelse
                                        <div class="row">

                                </td>
                                <td>

                                    <a data-delete="{{ route('Delete.User.Permission', $user->id) }}"
                                        class="btn btn-danger delete">X</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
