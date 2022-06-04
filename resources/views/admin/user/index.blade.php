@extends('admin.layout.master')
@section( 'title')
    Users
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
    @include('admin.layout.massege')
    <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User</h3>

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
                            User Name
                        </th>
                        <th style="width: 20%">
                            User Email
                        </th>
                        <th style="width: 20%">
                            Create At
                        </th>
                        <th style="width: 30%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $users)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a>
                                    {{$users->name}}
                                </a>

                            </td>

                            <td class="project_progress">
                                <a>
                                    {{$users->email}}
                                </a>
                            </td>

                            <td class="project_progress">
                                <a>
                                     {{$users->created_at}}
                                </a>
                            </td>

                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{route('change',$users->id)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    change password
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('user.edit',$users)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form method="post" action="{{route('user.destroy',$users)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" >
                                        <i class="fas fa-trash">
                                        </i>
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
        {{$user->links()}}
    </section>
    <!-- /.content -->
@endsection
