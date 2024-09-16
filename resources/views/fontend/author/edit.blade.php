@extends('fontend.author.author_main')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3>Edit Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('authors.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::guard('author')->user()->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="{{Auth::guard('author')->user()->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img src="{{asset('uploads/author')}}/{{Auth::guard('author')->user()->photo}}" id="blah" width="200" alt="">
                        </div>
    
                        <div class="mb-3">
                            <button type= "submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3>Change Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('authors.password.update')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                            @error('current_password')
                                <strong>{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <strong>{{$message}}</strong>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                            <strong>{{$message}}</strong>
                        @enderror
                        </div>
    
                        <div class="mb-3">
                            <button type= "submit" class="btn btn-success">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection