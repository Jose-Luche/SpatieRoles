@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">

        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Permissions</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.permissions.update', $permissions->id) }}">
                                    @csrf
                                    @method('PUT') <!-- Different from the normal way of doing things -->
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Permission <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" value="{{$permissions->name}}">
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
                        <h4 class="box-title">Roles</h4>
                        <div class="d-flex">
                            @if ($permissions->roles)
                                @foreach ($permissions->roles as $permission_role)
                                    <form method="POST" action="{{ route('admin.permissions.roles.remove', [$permissions->id, $permission_role->id])}}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                            <button type="submit">{{ $permission_role->name}}</button>
                                    </form>
                                    
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.permissions.roles', $permissions->id) }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Roles <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            
                                                            <select name="role" id="role"  class="form-control">
                                                                @foreach ($roles as $row)
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
