@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Add new Faq</h3>
            </div>
            <div class="card-body">
                <form action="{{route('faq.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Answer</label>
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection