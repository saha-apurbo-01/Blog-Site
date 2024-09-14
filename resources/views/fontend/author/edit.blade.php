@extends('fontend.author.author_main')
@section('content')
    <div class="col-lg-4 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Edit Profile</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
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
                        <img src="" id="blah" width="200" alt="">
                    </div>

                    <div class="mb-3">
                        <button type= "submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection