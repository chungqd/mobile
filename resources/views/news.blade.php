@extends('layouts.master')
@section('content')
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
                @foreach ($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- item -->
                        <div class="row-item row">
                            <div class="border-right">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <a href="detailNews/{{$post->id}}/{{str_slug($post->tieu_de)}}.html">
                                        <img class="img-responsive" width="200" height="200" src="uploads/posts/{{$post->hinhanh}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                <div class="post">
                                    <div class="post-header">
                                        <h2><a href="detailNews/{{$post->id}}/{{str_slug($post->tieu_de)}}.html">{{$post->tieu_de}}</a></h2>
                                    </div>
                                    <div class="post-body">
                                        <p>{{$post->tomtat}}</p>
                                    </div>
                                    {{-- <span class="fa fa-eye" aria-hidden="true"> {{$post->soluotxem}} views</span> --}}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="content_sortPagiBar">
                        {{ $posts->links() }}
                </div>
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
@endsection