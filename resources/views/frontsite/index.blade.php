@extends('frontsite.layout.master');

@section('content')

    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach($post_trend_1 as $trend)
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{asset('post_images/'.$trend->large_img)}}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{route('category',$trend->category->id)}}">{{$trend->category->title}}</a>
                                <a class="text-white" href="">{{$trend->created_at}}</a><br>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{route('single',$trend->id)}}">{{$trend->title}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach($post_trend_2 as $trend)
                        <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{asset('post_images/'.$trend->large_img)}}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="{{route('category',$trend->category->id)}}">{{$trend->category->title}}</a>
                                    <a class="text-white" href=""><small>{{$trend->created_at}}</small></a><br>
                                    <a class="text-white" href="{{route('single',$trend->id)}}"><small>{{$trend->title}}</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach($views_post as $post)
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="{{asset('post_images/'.$post->large_img)}}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{route('category',$post->category->id)}}">{{$post->category->title}}</a>
                            <a class="text-white" href=""><small>{{$post->created_at}}</small></a><br>
                            <a class="text-white" href="{{route('single',$post->id)}}"><small>{{$post->title}}</small></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            </div>
                        </div>
                        @foreach($letst_post as $post)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{asset('post_images/'.$post->large_img)}}" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="{{route('category',$post->category->id)}}">{{$post->category->title}}</a>
                                        <a class="text-body" href=""><small>{{$post->created_at}}</small></a>
                                    </div>
                                    <a href="{{route('single',$post->id)}}"><p class="m-0">{{$post->title}}</p></a>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <small>{{$post->user->name}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @foreach($views_post as $post)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" width="150" src="{{asset('post_images/'.$post->large_img)}}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{$post->category->title}}</a>
                                        <a class="text-body" href=""><small>{{$post->created_at}}</small></a>
                                    </div>
                                    <a class="text-white" href="{{route('single',$post->id)}}"><small>{{$post->title}}</small></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                @foreach($catagory as $cat)
                                <a href="{{route('category',$cat)}}" class="btn btn-sm btn-outline-secondary m-1">{{$cat->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection

@section('title')
    HOME page
@endsection
