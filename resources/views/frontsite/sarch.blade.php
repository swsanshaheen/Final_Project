@extends('frontsite.layout.master')

@section('content')
    <br>
    <br>
    <br>
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">search:{{$serched}} </h4>
                </div>
            </div>

            <div class="col-lg-6">
                @if($post!=null)
                    <h4 class="m-0 text-uppercase font-weight-bold" style="text-align: center;color: #FFCC00 ">
                        posts resalt</h4>
                @endif
                @foreach($post as $po)
                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                        <img class="img-fluid" src="{{asset('post_images/'.$po->feature_img)}}" alt=""
                             style="width: 110px;">
                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                   href="{{route('category',$po->category->id)}}">{{$po->category->title}}</a>
                            </div>
                            <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                               href="{{route('single',$po->id)}}">{{$po->title}}</a>
                        </div>
                    </div>
                @endforeach
                <br>
                <br>
                <br>
                @if($category_resalt!=null)
                    <h4 class="m-0 text-uppercase font-weight-bold" style="text-align: center;color: #FFCC00 ">
                        categories resalt</h4>
                @endif
                @foreach($category_resalt as $category)
                    <div class="container">
                        <div class="section-title">
                            <a href="{{route('category',$category->id)}}"><h4
                                    class="m-0 text-uppercase font-weight-bold">{{$category->title}}</h4></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <br>
            <br>
            @if($category_resalt==null&&$post==null)
                <h4 class="m-0 text-uppercase font-weight-bold" style="text-align: center;color: #FFCC00 ">No
                    matching</h4>
            @endif
        </div>
    </div>
    <br>
    <br>
    <br>
@endsection

@section('title')
    search page
@endsection
