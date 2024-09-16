@extends('fontend.author.author_main')
@section('content')
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card-header bg-primary">
                <h3>Create New Post</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="desp" id="summernote" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
