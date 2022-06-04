@extends('admin.layout.master')
@section('content')
    @include('admin.layout.massege')
    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Post Title</label>
                            <input type="text" id="inputName" name="title" value="{{old('title')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Post Body</label>
                            <textarea id="inputDescription" name="body" class="form-control" rows="4" value="{{old('title')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Post image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image "name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus" >Category</label>
                            <select name="category_id" class="form-control custom-select">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Post" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->

@endsection

@section('title')
    Add post
@endsection
