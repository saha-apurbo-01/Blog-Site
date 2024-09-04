@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3>Category List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($abc as $index=>$category)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td><img src="{{ asset('uploads/categories') }}/{{ $category->category_image }}" alt=""></td>
                            <td>
                            <a href="{{ route('category.delete' ,$category->id) }}" class="btn btn-danger btn-icon">
                            <i data-feather="trash"></i> 
                            </a>
                        </td>
                        </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
               
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                    @error('category_name')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Category Image</label>
                        <input type="file" name="category_image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    @error('category_image')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    <div class="mb-3">
                        <img src="" id="blah" width="200" alt="">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
                
            </div>
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
    showConfirmButton: true,
    // timer: 1500
  });
</script>
@endif
@endsection