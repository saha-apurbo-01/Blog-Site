@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                 <h3>Faq List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                        <th>Serial</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                        </tr>

                        @foreach ($faqs as $index=>$faq)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$faq->question}}</td>
                            <td>{{$faq->answer}}</td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr> 
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection