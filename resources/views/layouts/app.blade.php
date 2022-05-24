<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('etudiant') }}">@lang('lang.text_registrar')</a>
                              
                @php $locale = session()->get('locale'); @endphp
                <nav class="navbar navbar-light navbar-expand-lg mb-5">
                    <div class="container">          
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                    <a class="nav-link @if($locale=='en')bg-secondary text-light @endif" href="{{route('lang', 'en')}}"><img src="{{ asset('img/flag/en.png')}}" alt="English"> English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($locale=='fr') bg-secondary text-light @endif" href="{{route('lang', 'fr')}}"><img src="{{ asset('img/flag/fr.png')}}" alt="Français"> Français</a>
                                </li>
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">@lang('lang.text_login')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('registration')}}">@lang('lang.text_registration')</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('forum.show') }}">@lang('lang.text_my_articles')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('doc.show') }}">@lang('lang.text_my_documents')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('forum')}}">Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('doc')}}">Documentation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout')}}">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Session de @yield('username')</a>
                                </li>
                                
                                
                                @endguest
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">@yield('title')</h1>
                </div>
            </div>
        </header>
        

        @yield('content')

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Registrariat 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    </body>
</html>
