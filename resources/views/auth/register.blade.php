
<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/images/brand/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/transparent-style.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ URL::asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ URL::asset('assets/colors/color1.css')}}" />

</head>

<body class="app sidebar-mini ltr login-img">

<!-- BACKGROUND-IMAGE -->
<div class="">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src="{{ URL::asset('assets/images/brand/logo-white.png')}}" class="header-brand-img m-0" alt="">
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-6" style="width:500px">
                    <form class="login100-form validate-form">
                            <span class="login100-form-title">
									Registration
								</span>
                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-account" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="User name">
                        </div>
                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email">
                        </div>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Password">
                        </div>
                        <label class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                        </label>
                        <div class="container-login100-form-btn">
                            <a href="index.html" class="login100-form-btn btn-primary">
                                Register
                            </a>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">Already have account?<a href="login.html" class="text-primary ms-1">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- END PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->

<!-- JQUERY JS -->
<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- SHOW PASSWORD JS -->
<script src="{{ URL::asset('assets/js/show-password.min.js')}}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ URL::asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

<!-- Color Theme js -->
<script src="{{ URL::asset('assets/js/themeColors.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{ URL::asset('assets/js/custom.js')}}"></script>

</body>

</html>