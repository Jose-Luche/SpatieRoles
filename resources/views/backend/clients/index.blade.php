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
                                <h3 class="box-title">Clients</h3>
                                @if (Auth()->User()->can('client-create'))
                                    <a href="{{route('client.create')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Create Client</a> 
                                @endif
                                
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                @if (Auth()->User()->can('client-edit') || Auth()->User()->can('client-delete') )
                                                    <th width="25%">Action</th> 
                                                @endif
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>

                                                    <td> {{ $client->name }} </td>
                                                    <td> {{ $client->email }} </td>
                                                    <td> {{ $client->address }} </td>
                                                    <td >
                                                        @if (Auth()->User()->can('client-edit'))
                                                            <a href="{{route('client.edit', $client->id)}}" class="btn btn-info" ><i class="fa-solid fa-pen-to-square"></i></a> 
                                                        @endif
                                                        
                                                        @if (Auth()->User()->can('client-delete'))
                                                            <a href="{{route('client.delete', $client->id)}}" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a> 
                                                        @endif
                                                            
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
<!-- Custom Js -->

<script src={{asset('../assets/vendor_components/datatable/datatables.min.js')}}></script>

