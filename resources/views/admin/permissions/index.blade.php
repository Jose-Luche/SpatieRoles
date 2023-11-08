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
                                <h3 class="box-title">Permissions</h3>
                                <a href="{{route('admin.permissions.create')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Create Permission</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permission as $row)
                                                <tr>

                                                    <td> {{ $row->name }} </td>
                                                    <td>
                                                        <a href="{{route('admin.permissions.edit', $row->id)}}" class="btn btn-info" ><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a>
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
