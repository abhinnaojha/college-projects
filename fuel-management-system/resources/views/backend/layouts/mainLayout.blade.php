<!
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    </head>
    <body class="p-3">
        <div class="grid grid-cols-5">
            <!--header content-->
            <header class="col-span-5 ">
                <div class="grid grid-cols-10" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="col-start-2 col-span-3">
                        <a href="{{route('home')}}">
                            Home
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="col-start-9 inline">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="inline">
                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="inline">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="inline">
                                <p>
                                    Hello {{ Auth::user()->name }}
                                </p>

                                <div class="" aria-labelledby="navbarDropdown">
                                    <a class="text-red-700 hover:text-red-500" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </header>
            <!--###################################################-->
            <!--main content-->
            <div class="col-start-2 col-span-3 flex justify-center">
                @yield('main_content')
            </div>
            <!--###################################################-->
            <!--footer content-->
            <footer class="text-black col-start-3 col-span-1 mt-8 pt-8 text-centerd">
                footer section
            </footer>
            <!--###################################################-->
        </div>

    </body>
</html>
