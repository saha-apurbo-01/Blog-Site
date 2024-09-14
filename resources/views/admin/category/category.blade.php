@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header ">
                    <h3>Category List</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('category.check.delete')}}" method="POST">
                    @csrf
                    <table class="table table-striped">
                        <tr>
                            <th>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="chkSelectAll">
                                        Select All
                                        <i class="input-frame"></i>
                                    </label>
                                </div>
                            </th>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($abc as $index=>$category)
                            <tr>
                                <td><div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input chkDel" name="category_id[]" value="{{$category->id}}">
                                        <i class="input-frame"></i>
                                    </label>
                                </div></td>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td><img src="{{ asset('uploads/categories') }}/{{ $category->category_image }}" alt=""></td>
                                <td>
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="my-2">
                        <button id="del_btn" type="submit" class="btn btn-danger d-none">Delete</button>
                    </div>
                </form>
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
                    <label class="form-label">
                        Name
                    </label>
                    <input type="text" name="category_name" class="form-control">
                </div>
                @error('category_name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="mb-3">
                    <label class="form-label">
                        Image
                    </label>
                    <input type="file" name="category_image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>
                @error('category_image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="mb-3">
                    <img src="" id="blah" width="200" alt="">
                </div>
                <div class="mb-3">
                   <button class="btn btn-success">Submit</button>
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
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif

@if (session('delete'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('delete') }}",
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif
<script>
    $("#chkSelectAll").on('click', function(){
     this.checked ? $(".chkDel").prop("checked",true) : $(".chkDel").prop("checked",false); 
     $('#del_btn').toggleClass('d-none');
})

    $(".chkDel").on('click', function(){
     $('#del_btn').removeClass('d-none');
})
</script>
@if (session('sel_del'))
    <script>
        Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('sel_del') }}",
    showConfirmButton: false,
    timer: 1500
  });
    </script>
@endif
@endsection