@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3>Deleted Categories</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Serial</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Restore Category</th>
                            <th>Permanently Delete</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection