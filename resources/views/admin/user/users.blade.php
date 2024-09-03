@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3>Users List</h3>
            </div>
            <div class="card-body">
                @if (session('delete'))
                    <div class="alert alert-success">{{ session('delete') }}</div>
                @endif
                <table class="table table-striped">
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    
                        @foreach ($abc as $index=>$users)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td> 
                            @if ($users->photo == null)
                            <img src="https://via.placeholder.com/30x30" alt="profile">
                            @else  
                            <img src="{{ asset('uploads/users') }}/{{ $users->photo }}" alt="">
                            @endif
                            </td>
                            <td>{{ $users->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('delete', $users->id) }}" title="Delete User" class="btn btn-danger">Delete</a></td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add User</h3>
            </div>
            <div class="card-body">
                @if (session('add'))
                    <div class="alert alert-success">{{ session('add') }}</div>
                @endif
                <form action="{{ route('add.user') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Add</button>
                </div>
               

                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection