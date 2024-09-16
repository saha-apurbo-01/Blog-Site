@extends('fontend.master')

@section('content')
     <!-- blog-slider-->
     <section class="blog blog-home4 d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel">
                        <!--post1-->
                        <div class="blog-item" style="background-image: url('{{asset('font_asset')}}/img/blog/bg1.jpg')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                        <div class="entry-cat">
                                            <a href="blog-layout-1.html" class="category-style-2">Branding</a>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="post-single.html">Architecture is a visual art and the buildings
                                                speak for them selves </a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author"> <a href="author.html">Meriam Smith</a></li>
                                            <li class="post-date"> <span class="line"></span> Fabuary 10 ,2022</li>
                                            <li class="post-timeread"> <span class="line"></span> 15 mins read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--post2-->
                        <div class="blog-item" style="background-image: url('{{asset('font_asset')}}/img/blog/bg2.jpg')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                        <div class="entry-cat">
                                            <a href="blog-layout-1.html" class="category-style-2">Livestyle</a>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="post-single.html">Styles come and go. Good design is a language,
                                                not a style. </a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author"> <a href="author.html">Meriam Smith</a></li>
                                            <li class="post-date"> <span class="line"></span> Fabuary 10 ,2022</li>
                                            <li class="post-timeread"> <span class="line"></span> 15 mins read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--post3-->
                        <div class="blog-item" style="background-image: url('{{asset('font_asset')}}/img/blog/bg3.jpg')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                        <div class="entry-cat">
                                            <a href="blog-layout-1.html" class="category-style-2">branding</a>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="post-single.html">Ignoring online marketing is like opening a
                                                business but not telling anyone </a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author"> <a href="author.html">Meriam Smith</a></li>
                                            <li class="post-date"> <span class="line"></span> Fabuary 10 ,2022</li>
                                            <li class="post-timeread"> <span class="line"></span> 15 mins read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top categories-->
    <div class="categories">
        <div class="container-fluid">
            <div class="categories-area">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="categories-items">

                           @foreach ($categories as $category)
                           <a class="category-item" href="#">
                            <div class="image">
                                <img src="{{asset('uploads/categories')}}/{{$category->category_image}}" height="80" width="100" alt="">
                            </div>
                            <p>{{$category->category_name}} <span>10</span> </p>
                           </a>
                           @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent articles-->
    <section class="section-feature-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <h3>recent Articles </h3>
                            <p>Discover the most outstanding articles in all topics of life.</p>
                        </div>

                        <!--post1-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/31.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">Branding</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">Brand is just a perception, and perception will match
                                        reality</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post2-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/21.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">marketing</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">Ignoring online marketing is like opening a business but
                                        not telling anyone</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post3-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/32.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">livestyle</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">Your genetics load the gun your lifestyle pulls the
                                        trigger.</a>
                                </h5>
                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post4-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/17.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">food</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">Food is symbolic of love when words are inadequate</a>
                                </h5>
                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post5-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/27.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">interior</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">A room is not a room without natural light</a>
                                </h5>
                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post6-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/39.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">design</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">Everything is designed. Few things are designed well.</a>
                                </h5>
                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post7-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/30.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">design</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">The function of design is letting design function</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post7-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/25.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">interior</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">The best rooms have something to say about the people who
                                        live in them.</a>
                                </h5>
                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--post8-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{asset('font_asset')}}/img/blog/22.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">marketing</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="post-single.html">The best marketing doesn't feel like marketing</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!--pagination-->
                        <div class="pagination">
                            <div class="pagination-area">
                                <div class="pagination-list">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="las la-arrow-left"></i></a></li>
                                        <li><a href="#" class="active">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="las la-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <!--search-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Search</h5>
                                </div>
                                <div class=" widget-search">
                                    <form action="https://oredoo.assiagroupe.net/Oredoo/search.html">
                                        <input type="search" id="gsearch" name="gsearch" placeholder="Search ....">
                                        <a href="search.html" class="btn-submit"><i class="las la-search"></i></a>
                                    </form>
                                </div>
                            </div>

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>popular Posts</h5>
                                </div>

                                <ul class="widget-popular-posts">
                                    <!--post1-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{asset('font_asset')}}/img/blog/1.jpg" alt="">
                                                <small class="nb">1</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">Everything is designed. Few things are
                                                    designed well.</a>
                                            </p>
                                            <small> <span class="slash"></span>3 mounth ago</small>
                                        </div>
                                    </li>

                                    <!--post2-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{asset('font_asset')}}/img/blog/5.jpg" alt="">
                                                <small class="nb">2</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">Brand yourself for the career you want, not
                                                    the job you </a>
                                            </p>
                                            <small> <span class="slash"></span> 3 mounth ago</small>
                                        </div>
                                    </li>

                                    <!--post3-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{asset('font_asset')}}/img/blog/13.jpg" alt="">
                                                <small class="nb">3</small>

                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">It’s easier to ask forgiveness than it is to
                                                    get permission.</a>
                                            </p>
                                            <small> <span class="slash"></span>3 mounth ago</small>
                                        </div>
                                    </li>

                                    <!--post4-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{asset('font_asset')}}/img/blog/16.jpg" alt="">
                                                <small class="nb">4</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">All happiness depends on a leisurely
                                                    breakfast</a>
                                            </p>
                                            <small> <span class="slash"></span>
                                                3 mounth ago</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!--newslatter-->
                            <div class="widget widget-newsletter">
                                <h5>Subscribe To Our Newsletter</h5>
                                <p>No spam, notifications only about new products, updates.</p>
                                <form action="#" class="newslettre-form">
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email Adress"
                                                required="required">
                                        </div>
                                        <button class="btn-custom" type="submit">Subscribe now</button>
                                    </div>
                                </form>
                            </div>

                            <!--stay connected-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Stay connected</h5>
                                </div>

                                <div class="widget-stay-connected">
                                    <div class="list">
                                        <div class="item color-facebook">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <p>Facebook</p>
                                        </div>

                                        <div class="item color-instagram">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <p>instagram</p>
                                        </div>

                                        <div class="item color-twitter">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <p>twitter</p>
                                        </div>

                                        <div class="item color-youtube">
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                            <p>Youtube</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Tags-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Tags</h5>
                                </div>
                                <div class="widget-tags">
                                    <ul class="list-inline">
                                        @foreach ($tags as $tag)
                                        <li>
                                            <a href="#">{{$tag->tag_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </section>


@endsection



