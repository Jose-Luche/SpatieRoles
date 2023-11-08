@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp



<aside class="main-sidebar">
  <section class="sidebar">	
      
      <div class="user-profile">
          <div class="ulogo">
              <a href="index-2.html">
                <!-- logo for regular state and mobile devices -->
                  <div class="d-flex align-items-center justify-content-center">					 	
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Kejani</b> </h3>
                  </div>
              </a>
          </div>
      </div>
    
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">  
        
      
      @role('admin')
      
        <li class= "{{ ($route == 'admin')?'active':'' }}">
          <a href="{{route('admin.roles.index')}}">
            <i data-feather="user"></i>
            <span>Roles</span>
          </a>
        </li>

        <li class= "{{ ($route == 'admin')?'active':'' }}">
          <a href="{{route('admin.permissions.index')}}">
            <i data-feather="user"></i>
            <span>Permissions</span>
          </a>
        </li>
      @endrole

      <li class= "{{ ($route == 'admin')?'active':'' }}">
        <a href="{{route('admin.users.index')}}">
          <i data-feather="user"></i>
          <span>Users</span>
        </a>
      </li>

      <li class= "{{ ($route == 'client')?'active':'' }}">
        <a href="{{route('client.index')}}">
          <i data-feather="user"></i>
          <span>Client</span>
        </a>
      </li>
       
    </ul>
  </section>
</aside>

<div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>