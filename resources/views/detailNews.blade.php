@extends('layouts.master')
@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=292576250831357";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="lab-breadcrumb">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb clearfix">
            <div class="breadcrumb-i">
                <a class="home" href="{{route('home')}}" title="Trở lại trang chủ">Trang chủ</a>
                <span class="navigation-pipe">&gt;</span>
                <span class="navigation_page"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="" title="Tin tức" ><span itemprop="title">Tin tức</span></a></span></span>
            </div>
        </div>
        <!-- /Breadcrumb -->
    </div>
</div>

<div class="columns-container">
    <div id="columns" class="container">
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
                <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->tieu_de}}</h1>

                <!-- Author -->
                <p class="lead">
                     <a href="#"></a>
                </p>
                
                <!-- Preview Image -->
                <img class="img-responsive" src="uploads/posts/{{$post->hinhanh}}" alt="">

                <!-- Date/Time -->
                <br>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}} <span class="glyphicon glyphicon-eye-open"></span> {{$post->soluotxem}} views</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->tieu_de}}</p>
                {!!$post->noidung!!}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <figure>
                  <div>
                    <div class="fb-comments" data-numposts="5"></div>
                  </div>
                </figure

                <hr>
            </div>
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
@endsection