@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Bài Viết')


@section('content')
   
        <!-- Blog Section Start -->
        <div class="blog-section section pt-50">
            <div class="container">
                <div class="row">

                   <!-- Single Blog Start -->
                   @foreach($news as $key => $new )
                        @if(!$new->video_url)
                        <div class="blog col-lg-4 col-md-6 col-sm-6">
                            <div class="blog-inner mb-20">
                                <div class="media">
                                    <a href="/bai-viet/{{@$new->slug}}.html" class="image">
                                        <img src="{{@$new->image}}" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="title"><a href="/bai-viet/{{@$new->slug}}.html">{{@$new->title}}</a></h3>
                                    <ul class="meta">
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            <span class="date-time">
                                                <span class="date">{{@$new->created_at}}</span>
                                            </span>
                                        </li>
                                    </ul>
                                    {!! $new->short_description !!}
                                    <a class="readmore" href="/bai-viet/{{@$new->slug}}.html">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="blog col-lg-4 col-md-6 col-sm-6">
                                <div class="blog-inner mb-20">
                                    <div class="blog-video">
                                        <video src="{{@$new->video_url}}" controls></video>
                                    </div>
                                    <div class="content">
                                        <h3 class="title"><a href="/bai-viet/{{@$new->slug}}.html">{{@$new->title}}</a></h3>
                                        <ul class="meta">
                                            <li>
                                                <i class="fa fa-calendar"></i>
                                                <span class="date-time">
                                                    <span class="date">{{@$new->created_at}}</span>
                                                </span>
                                            </li>
                                        </ul>
                                        {!! $new->short_description !!}
                                        <a class="readmore" href="/bai-viet/{{@$new->slug}}.html">Xem Thêm</a>
                                    </div>
                                </div>
                            </div>
                        
                        @endif
                    @endforeach
                    <!-- Single Blog End -->
                   
                </div>
                <div class="row mb-35">
                    <div class="col">
                        <ul class="page-pagination">
                            @if ($news->lastPage() > 1)
                                <li class="{{ ($news->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a href="{{ $news->url(1) }}"><</a>
                                </li>
                                @for ($i = 1; $i <= $news->lastPage(); $i++)
                                    <li class="{{ ($news->currentPage() == $i) ? ' active' : '' }}">
                                        <a href="{{ $news->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="{{ ($news->currentPage() == $news->lastPage()) ? ' disabled' : '' }}">
                                    <a href="{{ $news->url($news->currentPage()+1) }}" >></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->


@stop

@section('script')

@stop