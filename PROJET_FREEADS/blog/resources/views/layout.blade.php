<!--layout-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Freeads
        </title>
        <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="header">
                <ul class="top-nav-main">
                    <li class="menu-menu">
                        <a href="">
                            ACCUEIL
                        </a>
                    </li>
                    <li class="menu-menu">
                        <a href="">
                            A PROPOS
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        @yield('contenu')
    </body>
</html>
