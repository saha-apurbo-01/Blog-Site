@extends('layouts.admin')
@section('content')
    <div class="col-lg-4 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="mb-3">
                    <label class="form-label">
                        Name
                    </label>
                    <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
                </div>
                @error('category_name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="mb-3">
                    <label class="form-label">
                        Image
                    </label>
                    <input type="file" name="category_image" class="form-control" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                </div>
                @error('category_image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="mb-3">
                    <img src="{{asset('uploads/categories')}}/{{$category->category_image}}" id="blah1" width="200" alt="">
                </div>
                <div class="mb-3">
                   <button class="btn btn-success">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@if (session('success'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif
@endsection