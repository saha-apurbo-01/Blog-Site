@extends('fontend.master')
@section('content')
   <!--post-single-->
   <section class="post-single">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-12">
                <!--post-single-image-->
                    <div class="post-single-image text-center">
                        <img src="{{ asset('uploads/posts/preview') }}/{{ $post->preview }}" alt="">
                    </div>
                      
                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">  
                            <h2> {{ $post->title }}</h2>        
                            <ul class="entry-meta">
                                @if ($post->rel_to_author->photo !=null)
                                <img src="{{ 'uploads/author' }}/{{ $post->rel_to_author->photo }}">
                                    @else
                                    <li class="post-author-img"><img src="{{ asset('font_asset') }}/img/author/1.jpg">
                                    </li> 
                                @endif

                                <li class="post-author"> <a href="{{ route('author.post', $post->author_id) }}">{{ $post->rel_to_author->name }}</a></li>
                                <li class="entry-cat"> <a href="{{ route('category.post', $post->category_id) }}" class="category-style-1 "> <span class="line"></span> {{ $post->rel_to_category->category_name }}</a></li>
                                <li class="post-date"> <span class="line"></span>{{ $post->created_at->diffForHumans() }}</li>
                            </ul>
                            
                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">
                            {!! $post->desp !!}
                        </div>
                        
                        <!--post-single-bottom-->
                        <div class="post-single-bottom"> 
                            <div class="tags">
                                <p>Tags:</p>
                                @php
                                    $after_explode = explode(',', $post->tags)
                                @endphp
                                <ul class="list-inline">
                                    @foreach ($after_explode as $tag_id)
                                    <li >
                                        <a href="{{ route('category.post', $post->category_id) }}">{{ App\Models\Tag::where('id', $tag_id)->first()->tag_name }}</a>
                                    </li>  
                                    @endforeach
                                   
                                </ul>
                            </div>
                            <div class="social-media">
                                <p>Share on :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>                      
                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    <a href="{{ route('author.post', $post->author_id) }}" class="image">
                                        @if ($post->rel_to_author->photo !=null)
                                <img src="{{ 'uploads/author' }}/{{ $post->rel_to_author->photo }}">
                                    @else
                                    <li class="post-author-img"><img src="{{ asset('font_asset') }}/img/author/1.jpg">
                                    </li> 
                                @endif
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>{{ $post->rel_to_author->name }}</h4>
                                    <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                                        Quis sem justo nisi varius.
                                    </p>
                                    <div class="social-media">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        
                        <!--post-single-comments-->
                        <div class="post-single-comments">
                            <!--Comments-->
                            <h4 >{{ $total_comments }} Comments</h4>
                            <ul class="comments">
                                @foreach ($comments as $comment)
                            
                                <!--comment1-->
                                <li class="comment-item pt-0 pb-10">
                                    <img src="{{ asset('font_asset') }}/img/other/user1.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">{{ $comment->rel_to_author->name }}</a> </li>
                                                <li class="slash"></li>
                                                <li>{{ $comment->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                        <p>{{ $comment->message }}</p>
                                        <a href="#reply" data-id="{{ $comment->id }}" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                    </div>
                            
                                </li>
 
                                @foreach ($comment->replies as $reply)
                                     <!--reply1-->
                                <li class="comment-item pt-0d border-bottom-0" style="margin-left: 100px">
                                    <img src="{{ asset('font_asset') }}/img/other/user1.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">{{ $reply->rel_to_author->name }}</a> </li>
                                                <li class="slash"></li>
                                                <li>{{ $reply->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                        <p>{{ $reply->message }}</p>
                                        <a href="#reply" data-id="{{ $comment->id }}" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                    </div>
                            
                                </li>
                                @endforeach
                                @endforeach
                            
                            </ul>
                            @auth('author')
                               <!--Leave-comments-->
                            <div class="comments-form" id="reply">
                                <h4 >Leave a Reply</h4>
                                <!--form-->
                                <form class="form " action="{{ route('comment.store', Auth::guard('author')->id()) }}" method="POST" id="main_contact_form">
                                    @csrf
                                    <p>Your email adress will not be published ,Requied fileds are marked*.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" name="parent_id" id="parent_id">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required" value="{{ Auth::guard('author')->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required" value="{{ Auth::guard('author')->user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn-custom">
                                                Send Comment
                                            </button>
                                        </div> 
                                    </div>
                                </form>
                                <!--/-->
                            </div>  
                            @endauth
                           
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>  
@endsection

@section('footer_script')
    <script>
     $('.btn-reply').click(function (){
        let parent_id = $(this).attr('data-id');
        $('#parent_id').attr('value', parent_id);
     })
    </script>
@endsection