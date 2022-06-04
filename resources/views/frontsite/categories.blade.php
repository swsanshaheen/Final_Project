@extends('frontsite.layout.master')

@section('content')
    <!-- Featured News Slider Start -->
    @foreach($categories as $category)
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <a href="{{route('category',$category->id)}}"><h4 class="m-0 text-uppercase font-weight-bold">{{$category->title}}</h4></a>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach($posts as $post)
                    @if($post->category_id==$category->id)
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="{{asset('post_images/'.$post->large_img)}}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="text-white" href=""><small>{{$post->created_at}}</small></a><br>
                            <a class="text-white" href="{{route('single',$post->id)}}"><small>{{$post->title}}</small></a>
                        </div>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    <div class="container" >
        {{$categories->links()}}
    </div>

    <!-- Featured News Slider End -->

@endsection

@section('title')
    HOME page
@endsection
