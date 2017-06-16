@extends('layouts.public_master')

@section('content')
    {{-- intro menu --}}
    <section id="intro" class="one dark cover">
        <div class="container">
            <header>
                <h2 class="alt">Hi! This is a <strong>profit</strong> site, a <a
                            href="http://html5up.net/license">free</a>
                    responsive<br/>
                    site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>

                <p>Ligula scelerisque justo sem accumsan diam quis<br/>
                    vitae natoque dictum sollicitudin elementum.</p>
            </header>
            <footer>
                <a href="#portfolio" class="button scrolly">Magna Aliquam</a>
            </footer>
        </div>
    </section>

    <section id="joinus" class="two">
        <div class="container">
            <header>
                <h3>Join Us</h3>
            </header>

            <form action="" id="login">
                <div class="row">
                    <div class="7u 12u$(mobile)"><input type="text" name="name" placeholder="User Id"/></div>
                    <div class="5u$ 12u$(mobile)"><input type="text" name="email" placeholder="Password"/></div>
                </div>
                <div class="row">
                    <p class="12u$ error alert alert-danger">Testing</p>
                </div>

                <div class="row">
                    <div class="12u$">
                        <button type="submit">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="7u 0u(mobile)"></div>
                    <div class="5u$ 12u$(mobile)">
                        <a href="" class="customurl">Do not have an account? REGISTER NOW!!</a>
                    </div>
                </div>
        </form>
        </div>
    </section>
@endsection