<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Aynet Login Page</title>
	<link rel="canonical" href="#" />
    <!-- Custom CSS -->
    <link href="{{asset('backendd/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url('{{asset('backendd/assets/images/background/forest.jpg')}}'); no-repeat center center; background-size: cover;">
            <div class="auth-box p-4 bg-white">
                <div>
                    <div class="logo text-center">
                        <span class="db"><img alt="thumbnail" class="rounded-circle" width="100" src={{asset('frontend/assets/images/aynet.jpeg')}}></span>
                        <h5 class="font-weight-medium mb-3">Aynet Agroforestry</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" name="email" required="" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">LOGIN</button>
                                    </div>
                                </div>
                                <div class="fog-pwd text-center">
                                    <a href="{{ route('password.request') }}" class="font-weight-medium mb-3"><i class="ion ion-locked"></i> Forgot password?</a><br>
                                </div>
                            </form>
                            <div class="text-center">
								<p class="font-weight-medium mb-3">Don't have an account? <a href="{{ route('register') }}" class="text-info ml-5">Sign Up</a></p>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('backendd/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('backendd/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('backendd/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    </script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session:: get('alert-type', 'info')}}"
        switch(type){
          case 'info':
          toastr.info(" {{ Session::get('message') }} ");
          break;
    
          case 'success':
          toastr.success(" {{ Session::get('message') }} ");
          break;
    
          case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
          break;
    
          case 'error':
          toastr.error(" {{ Session::get('message') }} ");
          break;
        }
        @endif
    </script>
</body>

</html>