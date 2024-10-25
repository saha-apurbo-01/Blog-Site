@extends('fontend.master')
@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="login-content">
                    <h4>Password Reset Request Form</h4>
                    <p></p>
                    <form action="{{ route('pass.res.req.post') }}" class="sign-form widget-form " method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email*" name="email" value="">
                        </div>
                        @if (session('exist'))
                        <strong class="text-danger">{{ session('exist') }}</strong>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn-custom">Send Request</button>
                        </div>
                        
                    </form>
                </div> 
            </div>
        </div>
    </div>
</section>  
@endsection