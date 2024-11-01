@extends('layouts.admin')
@section('content')

    @can('author')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Authors List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($authors as $index=>$author)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$author->name}}</td>
                                <td>{{$author->email}}</td>
                                <td>{{$author->photo}}</td>
                                <td><span class="badge badge-{{$author->status ==1? 'success': 'secondary'}}">{{$author->status ==1? 'Approved': 'Not Approved'}}</span></td>
                                <td><a href="{{route('authors.status', $author->id)}}" class="badge badge-{{$author->status ==1? 'success' : 'secondary'}}">{{$author->status == 1? 'Change Status' : 'Change Status'}}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan

@endsection