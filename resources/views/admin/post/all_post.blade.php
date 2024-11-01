@extends('layouts.admin')
@section('content')

    @can('post')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Posts</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Serial</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $index=>$post)
                        <tr>
                            <td>{{$index+1}}</td>    
                            <td class="text-wrap">{{$post->title}}</td>    
                            <td>{{$post->rel_to_author->name}}</td>       
                            <td>{{$post->created_at->diffForHumans()}}</td> 
                            <td><a href="{{route('post.status', $post->id)}}" class="btn btn-{{$post->status == 1? 'success': 'secondary'}}">{{$post->status == 1? 'Active': 'Deactive'}}</a></td> 
                            <td><a href="" class="btn btn-danger">Delete</a></td>   
                        </tr>   
                        @endforeach
                        
                    </table>
                    <div class="my-4">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

@endsection