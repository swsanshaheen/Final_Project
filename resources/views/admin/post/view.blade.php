@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Post Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Catagory Name</span>
                                        <span class="info-box-number text-center text-muted mb-0"> {{$post->category->titel}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Comments Number</span>
                                        <span class="info-box-number text-center text-muted mb-0">
                                        <?php $i=0;?>
                                            @foreach($comment as $comme)
                                                <?php $i++?>
                                            @endforeach
                                            {{$i}}
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Views Number</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$post->views}} </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">

                                <div class="post clearfix">

                                    <span style="color: blue"><b>{{$post->user->name}}</b></span>
                                    <br>
                                    <span class="description">;{{$post->user->email}} - {{$post->created_at}}</span>
                                    <!-- /.user-block -->
                                    <br> <hr > <h2 style="color: #b41650">;{{$post->titel}}</h2>
                                    <p>
                                        <br>{{$post->body}}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        {{--                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$post->titel}}</h3>--}}
{{--                        <img alt="image" width="100%" height="80%" src="{{asset('post_images/'.$post->image)}}">--}}

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('title')
    Add post
@endsection
