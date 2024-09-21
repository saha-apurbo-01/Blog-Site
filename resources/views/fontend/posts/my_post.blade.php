@extends('fontend.author.author_main')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>My All Post</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Serial</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $index=>$post)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$post->title}}</td>
                            <td><img src="{{asset('uploads/posts/thumbnail')}}/{{$post->thumbnail}}" alt=""></td>
                            <td>{{$post->status == 1 ? 'Published': 'Not Published'}}</td>
                            <td><a href="{{route('post.delete', $post->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr> 
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection