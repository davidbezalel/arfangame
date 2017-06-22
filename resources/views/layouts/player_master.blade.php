<!DOCTYPE html>
<head>
    <!-- templatemo 419 black white -->
    <!--
    Black White
    http://www.templatemo.com/preview/templatemo_419_black_white
    -->
    <title>{{ $data['title'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/templatemo_style.css">
    <link rel="stylesheet" href="/css/style.css">

    {{-- load all additional css --}}
    <?php
    if (isset($data['styles'])) {
        foreach ($data['styles'] as $style) {
            echo '<link rel="stylesheet" href="/css/' . $style . '">';
        }
    }
    ?>
</head>
<body>
<div class="templatemo-container">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 black-bg left-container">
        <h1 class="logo-left hidden-xs margin-bottom-60">Arfan</h1>

        <div class="tm-left-inner-container">
            <ul class="nav nav-stacked templatemo-nav">
                <li><a href="/" class="<?php echo($data['function'] == 'index' ? 'active' : ''); ?>"><i
                                class="fa fa-home"></i>Homepage</a></li>
                <li><a href="" id="signin" class="<?php echo($data['function'] == 'login' ? 'active' : ''); ?>"><i
                                class="fa fa-sign-in"></i>Sign In</a></li>
                <li><a href="" id="registertrigger"
                       class="<?php echo($data['function'] == 'register' ? 'active' : ''); ?>"><i
                                class="fa fa-user-plus"></i>Register</a></li>
            </ul>
        </div>
    </div> <!-- left section -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
        <h1 class="logo-right hidden-xs margin-bottom-60">Game</h1>

        <div class="tm-right-inner-container">
            @yield('content')
        </div>

    </div> <!-- right section -->
</div>
{{-- load all required javascript --}}
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/dist/js/app.min.js"></script>

{{-- load all the additional javascript --}}
<?php
if (isset($data['scripts'])) {
    foreach ($data['scripts'] as $script) {
        echo '<script src="/js/player/' . $script . '"></script>';
    }
}
?>
</body>
</html>