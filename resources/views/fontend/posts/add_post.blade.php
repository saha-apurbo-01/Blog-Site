@extends('fontend.author.author_main')
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card-header bg-primary">
                <h3>Create New Post</h3>
            </div>
            <div class="card-body">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Read Time</label>
                            <input type="text" name="read" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
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
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Select Tag</label>
                            <select id="select-gear" name="tag_id[]" class="demo-default" multiple placeholder="Select Tag...">
                                <option value="">Select Tag...</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option> 
                                    @endforeach
                              </select>
                                      
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Upload Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                            
                        </div>
                        <img src="" id="blah1" width="200" height="150" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Upload Preview</label>
                            <input type="file" name="preview" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <img src="" id="blah2" width="200" height="150" alt="">
                    </div>
                    <div class="m-auto">
                        <div class="mt-5">
                            <button type="submit" class="btn btn-success form-control">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
