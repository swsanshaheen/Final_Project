@extends('frontsite.layout.master');

@section('content')

    <br>
    <br>
    <br>

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{asset('post_images/'.$post->large_img)}}" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">{{$post->category->title}}</a>
                                <a class="text-body" href="">Jan 01, 2045</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{$post->title}}</h1>
                            <p>{{$post->body}}</p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <span>{{$post->user->name}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
{{--                    {{dd($comments)}}--}}

                    @if($count>0)
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{$count}} Comment</h4>
                        </div>
                        @foreach($comments as $comment)
                        <div class="bg-white border border-top-0 p-4">
                            <div class="media mb-4">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href="">{{$comment->auther}}</a></h6>
                                    <p>{{$comment->body}}</p>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                @else
                <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">No Comments</h4>
                            </div>
                </div>
                @endif
                    <!-- Comment List End -->



                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form action="{{route('comment')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name" name="auther">
                                            <input  type="hidden" class="form-control" id="name" name="post_id" value="{{$id}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control" name="body"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                           class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
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
    single page
@endsection
