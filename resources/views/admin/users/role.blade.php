@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">

        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Users</h4>
                        <a href="{{route('admin.users.index')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Back</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">{{ $user->name }} </div>
                            <div class="col">{{ $user->email }} </div>
                        </div>
                  
                    </div>
                    
                </div>
          
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
                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                    <form method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id])}}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                            <button type="submit">{{ $user_role->name}}</button>
                                    </form>
                                    
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
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

        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Permissions</h4>
                        <div class="d-flex">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id])}}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                            <button type="submit">{{ $user_permission->name}}</button>
                                    </form>
                                    
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
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
