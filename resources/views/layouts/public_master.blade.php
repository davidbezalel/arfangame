<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ArfanGame {{ $data['title'] }}</title>

    {{-- make site responsive to the screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- load all required css --}}
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/publicmaster.css">

    {{-- load all additional css --}}
    <?php
    if (isset($data['styles'])) {
        foreach ($data['styles'] as $style) {
            echo '<link rel="stylesheet" href="/css/' . $style . '">';
        }
    }
    ?>
</head>

<div id="header">

    <div class="top">

        {{-- site logo --}}
        <div id="logo">
            <span class="image avatar48"><img src="/assets/default_icons/logo.png" alt=""/></span>

            <h1 id="title">Arfan Game</h1>
            @if (Auth::guard('user')->check())
                <p>Great to see you again {{ Auth::guard('user')->user()->name }}</p>
            @else
                <p>Welcome to our site</p>
            @endif
        </div>

        {{-- navigation --}}
        <nav id="nav">
            <ul>
                @if (Auth::guard('user')->check())
                    <li>
                        <a href="#toplogged" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Intro</span></a>
                    </li>
                @else
                    <li>
                        <a href="#intro" id="intro-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Intro</span></a>
                    </li>
                    <li>
                        <a href="#joinus" id="joinus-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Join Us</span></a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</div>

{{-- main content --}}
<div id="main">
    @yield('content')
</div>

{{-- footer --}}
<div id="footer">

    {{-- copyright --}}
    <ul class="copyright">
        <li>&copy; 2017. All rights reserved.</li>
    </ul>

</div>


{{-- load all required javascript --}}
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/js/jquery.scrolly.min.js"></script>
<script src="/js/jquery.scrollzer.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/util.js"></script>
<script src="/js/publicmaster.js"></script>

{{-- load all additional javascript --}}
<?php
if (isset($data['scripts'])) {
    foreach ($data['scripts'] as $script) {
        echo '<script src="/js/' . $script . '"></script>';
    }
}
?>
<body>

</body>
</html>