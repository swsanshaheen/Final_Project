@extends('admin.layout.master')
@section( 'title')
    Edit page
@endsection
@section('content')
    @include('admin.layout.massege')
    <section class="content">
        <form method="post" action="{{route('category.update',$category)}} " >
            @csrf
            @method('PUT')
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
                                <label for="inputName">Category Title</label>
                                <input type="text" id="inputName" name="title" value=" {{$category->title}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Category Code</label>
                                <input type="text" id="inputName" name="code" value="{{$category->code}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="edit category" name="submit" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection

