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
                                <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span> {{ $post->rel_to_category->category_name }}</a></li>
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
                                        <a href="blog-layout-2.html">{{ App\Models\Tag::where('id', $tag_id)->first()->tag_name }}</a>
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
                            <h4 >3 Comments</h4>
                            <ul class="comments">
                                <!--comment1-->
                                <li class="comment-item pt-0">
                                    <img src="assets/img/other/user1.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">Nirmaine Nicole</a> </li>
                                                <li class="slash"></li>
                                                <li>3 Months Ago</li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                            quod non fugiat aliquid sit similique!
                                        </p>
                                        <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                    </div>
                            
                                </li>
                                <!--comment2-->
                                <li class="comment-item">
                                    <img src="assets/img/other/use2.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">adam smith</a> </li>
                                                <li class="slash"></li>
                                                <li>3 Months Ago</li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                            quod non fugiat aliquid sit similique!
                                        </p>
                                        <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                    </div>
                                </li>
                                   <!--comment3-->
                                <li class="comment-item">
                                    <img src="assets/img/other/user3.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">Emma david</a> </li>
                                                <li class="slash"></li>
                                                <li>3 Months Ago</li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                            quod non fugiat aliquid sit similique!
                                        </p>
                                        <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                    </div>
                                </li>
                            
                            </ul>
                            <!--Leave-comments-->
                            <div class="comments-form">
                                <h4 >Leave a Reply</h4>
                                <!--form-->
                                <form class="form " action="#" method="POST" id="main_contact_form">
                                    <p>Your email adress will not be published ,Requied fileds are marked*.</p>
                                    <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                        Your message was sent successfully.
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-12">
                                            <div class="mb-20">
                                                <input name="name" type="checkbox" value="1" required="required">
                                                <label for="name"><span>save my name , email and website in this browser for the next time I comment.</span></label>
                                            </div>
                                        
                                            <button type="submit" name="submit" class="btn-custom">
                                                Send Comment
                                            </button>
                                        </div> 
                                    </div>
                                </form>
                                <!--/-->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>  
@endsection