@extends('fontend.master')
@section('content')
    <!--section-heading-->
    <div class="section-heading " >
        <div class="container-fluid">
            <div class="section-heading-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading-2-title ">
                            <h1>All Authors</h1>
                            <p class="links"><a href="index.html">Home <i class="las la-angle-right"></i></a> pages</p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    
   <!--blog-layout-1-->
    <div class="authors ">
        <div class="container-fluid">
            <div class="authors-area">
                <div class="row">
                    @foreach ($authors as $author)
                        

                    <!--author-1-->
                    <div class="col-md-6 ">
                        <div class="authors-single">
                            <div class="authors-single-image">
                                <a href="{{route('author.post', $author->id)}}">
                                    @if ($author->photo == null)
                                    <img src="{{asset('font_asset')}}/img/author/1.jpg" alt=""> 
                                    @else
                                    <img src="{{asset('uploads/author')}}/{{$author->photo}}" alt="">
                                    @endif
                                    
                                </a>
                            </div>
                            <div class="authors-single-content ">
                                <div class="left">
                                    <h6> <a href="{{route('author.post', $author->id)}}">{{$author->name}}</a></h6>
                                    <p >{{$author->rel_to_post->count()}} articles</p>
                                </div>
                                <div class="right">
                                    <div class="more-icon">
                                        <i class="las la-angle-double-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/--> 
                    @endforeach
                </div>
            </div>
        </div> 
    </div>


    <!--pagination-->
    <div class="pagination">
        <div class="container-fluid">
            <div class="pagination-area">
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="pagination-list">
                            {{$authors->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection