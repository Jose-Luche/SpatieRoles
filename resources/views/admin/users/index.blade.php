<!-- Content Wrapper. Contains page content -->

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Roles</h3>
                                <a href="{{route('admin.users.create')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Create User</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>

                                                    <td> {{ $user->name }} </td>
                                                    <td> {{ $user->email }} </td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info" >Roles</a>
                                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id)}}"
                                                            onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        
                                                    </td>
                                            
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <!-- /.content -->
        </div>
    </div>
@endsection
<!-- /.content-wrapper -->
