@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">

        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Roles</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                                    @csrf
                                    @method('PUT') <!-- Different from the normal way of doing things -->
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Role Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" value="{{$role->name}}">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div> <!-- End row -->

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">

                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                

            </section>



        </div>
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Role Permissions</h4>
                        <div class="d-flex">
                            @if ($role->permissions)
                                @foreach ($role->permissions as $role_permission)
                                    <form method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])}}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                            <button type="submit">{{ $role_permission->name}}</button>
                                    </form>
                                    
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Permissions <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            
                                                            <select name="permission" id="permission"  class="form-control">
                                                                @foreach ($permissions as $row)
                                                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                                @endforeach
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- End row -->

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Assign">

                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                

            </section>



        </div>
    </div>
@endsection
