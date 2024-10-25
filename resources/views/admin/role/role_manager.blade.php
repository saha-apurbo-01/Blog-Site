@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Role List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                        <th>Serial</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($roles as $index=>$role)
                        <tr >
                            <td>{{ $index+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-wrap">
                                @foreach ($role->getPermissionNames() as $permission)
                                    <span class="badge badge-primary my-1">{{ $permission }}</span>
                                @endforeach
                            </td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add new permissions</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('permission.store') }}" method="POST">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label">Permission Name</label>
                        <input type="text" name="permission_name" class="form-control">
                    </div>    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Permission</button>
                    </div>    
                    </form>
                </div>
            </div>
        </div> --}}
    
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add new Role</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="role_name" class="form-control">
                    </div>
                    @foreach ($permissions as $permission)
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}" class="form-check-input">
                                {{ $permission->name }}
                            <i class="input-frame"></i></label>
                        </div>
                    </div>   
                    @endforeach
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Role</button>
                    </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection