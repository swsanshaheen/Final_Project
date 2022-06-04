@extends('admin.layout.master')
@section('content')

    @include('admin.layout.massege')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Post Title
                        </th>
                        <th style="width: 30%">
                            Image
                        </th>
                        <th>
                            share
                        </th>
                        <th style="width: 8%" class="text-center">
                            category
                        </th>
                        <th style="width: 8%" class="text-center">
                            views
                        </th>
                        <th style="width: 30%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            <a>
                                {{$post->title}}
                            </a>
                            <br/>
                            <small>
                                Created {{$post->created_at}}
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" width="150" src="{{asset('post_images/'.$post->feature_img)}}">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <small>
                                {{$post->shares}}
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">{{$post->category->title}}</span>
                        </td>
                        <td class="project_progress">
                            <small>
                                {{$post->views}}
                            </small>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{route('post.show',$post)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('post.edit',$post)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form action="{{route('post.destroy',$post)}}" method="post">
                                @method('delete')
                                @csrf
                            <button type="submit" class="btn btn-danger btn-sm" >
                                Delete
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
{{$posts->links()}}
    </section>
    <!-- /.content -->

@endsection

@section('title')
    post
@endsection
