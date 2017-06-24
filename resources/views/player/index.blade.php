<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Arfan Game</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Arfan Game</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="#joinus">Join Us</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Our Studio!</div>
            <div class="intro-heading">It's Nice To Meet You</div>
            <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
        </div>
    </div>
</header>

<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Services</h2>

                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">E-Commerce</h4>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Responsive Design</h4>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Web Security</h4>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

{{-- Join Us Section --}}
<section id="joinus" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Join Us</h2>

                <h3 class="section-subheading text-muted">Come on join us to get the real experience of gambling.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
                        <li><a href="#register" data-toggle="tab">Register</a></li>
                    </ul>
                    <div class="tab-content clear-float">
                        <div class="tab-pane active" id="signin">
                            <div class="alert nonmodalalert redalert" id="error" role="alert"></div>
                            <form action="" id="signinform">
                                <div class="input-group">
                                    <input type="text" name="playerid" class="form-control" placeholder="Player ID">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                </div>
                                <button type="submit" class="pull-right btn btn-flat btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'>" id="signinbtn">Sign In</button>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane clear-float" id="register">
                            <div class="alert nonmodalalert redalert" id="errorregister" role="alert"></div>
                            <form action="" id="registerform">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="playerid" placeholder="User ID">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="repassword"
                                           placeholder="Re-Password">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                </div>
                                <button type="submit" class="pull-right btn btn-flat btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'>" id="registerbtn">Register</button>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>

        </div>
    </div>
</section>

<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/bootstrap/js/jqBootstrapValidation.js"></script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/player/agency.min.js"></script>
<script src="/js/player/auth.js"></script>
</body>
</html>
