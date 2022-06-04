@extends('admin.layout.master')
@section( 'title')
    edit User
@endsection
@section('content')
    <section class="content">
        <form method="post" action="{{route('user.update',$user)}}" enctype="multipart/form-data">
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
                                <label for="inputName">User Name</label>
                                <input type="text" id="inputName" name="name" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">User Email</label>
                                <input type="text" id="inputName" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update user" name="submit" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

