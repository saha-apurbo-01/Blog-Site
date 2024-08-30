@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Edit Profile</h3>
            </div>
            <div class="card-body">

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>   
                @endif

                <form action="{{ route('update.user') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Password</h3>
            </div>
            <div class="card-body">

                @if (session('pass_update'))
                <div class="alert alert-success">{{ session('pass_update') }}</div>                  
                @endif

                <form action="{{ route('update.password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="current_password">
                    </div>
                    @if(session('err'))
                        <strong class="text-danger">{{ session('err') }}</strong>
                    @endif

                    @error('current_password')
                    <strong class="text-danger">{{ $message }}</strong>    
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    @error('password')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="Password" class="form-control" name="password_confirmation">
                    </div>
                    @error('password_confirmation')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection