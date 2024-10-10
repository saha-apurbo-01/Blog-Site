@extends('fontend.master')
@section('content')
       <!--section-heading-->
   <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>{{ $tags->tag_name }}</h1>
                         <p class="links"><a href="index.html">Home <i class="las la-angle-right"></i></a>{{ $tags->tag_name }}</p>
                     </div>
                 </div>  
             </div>
         </div>
     </div>
</div>


 <!-- Blog Layout-2-->
 <section class="blog-layout-2">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12"> 
                @foreach ($tag_posts as $post)
                   <!--post 1-->
                 <div class="post-list post-list-style2 row">
                    <div class="col-lg-4">
                        <div class="post-list-image">
                            <a href="post-single.html">
                                <img src="{{ asset('uploads/posts/thumbnail') }}/{{ $post->thumbnail }}" alt="">
                            </a>
                        </div>
                    </div>
                   <div class="col-lg-8">
                    <div class="post-list-content">
                        <h3 class="entry-title">
                            <a href="post-single.html">{{ $post->title }}</a>
                        </h3>  
                        <ul class="entry-meta">
                            <li class="post-author-img"><img src="{{ asset('font_asset') }}/img/author/1.jpg" alt=""></li>
                            <li class="post-author"> <a href="author.html">{{ $post->rel_to_author->name }}</a></li>
                            <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span>{{ $post->rel_to_category->category_name }}</a></li>
                            <li class="post-date"> <span class="line"></span>{{$post->created_at->diffForHumans()}}</li>
                        </ul>
                        <div class="post-btn">
                            <a href="post-single.html" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                   </div>
                </div>    
                @endforeach
                       
             </div>
         </div>
         
     </div>
 </section>
@endsection