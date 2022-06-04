@extends('frontsite.layout.master')

@section('content')

    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">{{$category->title}}</h4>
                            </div>
                        </div>
                        @foreach($posts as $post)

                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{asset('post_images/'.$post->large_img)}}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                               href="">{{$post->category->title}}</a>
                                            <a class="text-body" href=""><small>{{$post->created_at}}</small></a>
                                        </div>
                                        <p class="m-0">{{$post->title}}</p>
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
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{route('category',$post->category->id)}}">{{$post->category->title}}</a>
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
                                @foreach($categories as $cat)
                                    <a href="{{route('category',$cat->id)}}" class="btn btn-sm btn-outline-secondary m-1">{{$cat->title}}</a>
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
    category page
@endsection
