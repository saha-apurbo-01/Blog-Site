@extends('layouts.admin')

@section('content')
    <div class="col-lg-8"></div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add new permissions</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                <div class="mb-3">
                    <label class="form-label">Permission Name</label>
                    <input type="text" name="permission_name" class="form-control">
                </div>    
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add Permission</button>
                </div>    
                </form>
            </div>
        </div>
    </div>
@endsection