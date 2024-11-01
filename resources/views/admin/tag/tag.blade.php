@extends('layouts.admin')

@section('content')
    <div class="row">

        @can('tag')
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Tags List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Serial</th>
                            <th>Tag Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($tags as $index=>$tag)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$tag->tag_name}}</td>
                                <td><a href="{{route('tag.delete', $tag->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endcan

        @can('tag_add')
        <div class="col-lg-4">
            <div class="card-header bg-primary">
                <h3>Add Tag</h3>
            </div>
            <div class="card-body">
                <form action="{{route('tag.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tag Name</label>
                        <input type="text" name="tag_name" class="form-control">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endcan

    </div>
@endsection

@section('footer_script')
    @if (session('tag'))
    <script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('tag') }}",
    showConfirmButton: false,
    timer: 1500
  });
        </script>
    @endif
    @if (session('tag_del'))
        <script>
            Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('tag_del') }}",
    showConfirmButton: false,
    timer: 1500
  });
        </script>
    @endif
@endsection