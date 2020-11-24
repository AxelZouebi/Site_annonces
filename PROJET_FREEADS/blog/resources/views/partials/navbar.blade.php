<header class="block justify-between items-center bg-blue-900">
    <nav>
        <div class="w-full relative w-12 h-20">
            <div class="absolute left-50">
                <div class="relative -left-50">
                    <a class="text-white text-4xl font-bold py-4" href="{{ route('jobs.index') }}">
                        <!-- <img src="{{ asset('img/upwirk-logo.png') }}"> -->
                        C&C
                    </a>
                </div>
            </div>
            @auth
            @else
            <li class="list-none text-center float-right w-1/6 relative my-3 py-2 py-0">
                <a href="{{ route('login') }}" class="text-white hover:text-orange-400">
                    Se connecter
                </a>
            </li>
            @endauth
        </div>
        <div class="flex relative w-full h-4 justify-center">
            <ul class="flex items-center relative h-14 -m-6 bg-gray-100 rounded-full">
                @auth
                <li class="relative m-5 py-2 py-0">
                    <a href="{{ route('jobs.index') }}" class="text-blue-800 hover:text-orange-600">
                        Ma ville
                    </a>
                </li>
                <li class="relative m-5 py-2 py-0">
                    <a href="{{ route('jobs.index') }}" class="text-blue-800 hover:text-orange-600">
                        A propos
                    </a>
                </li>
                <li class="relative m-5 py-2 py-0">
                    <a href="{{ route('home.home') }}" class="text-blue-800 hover:text-orange-600">
                        Mon compte
                    </a>
                </li>
                <li class="relative m-5 py-2 py-0">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-blue-800 hover:text-orange-600">
                        Se déconnecter
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                @else
                <li class="relative mr-4 my-5 ml-8 py-2 py-0">
                    <a href="{{ route('accueil') }}" class="font-bold text-blue-800 hover:text-orange-600">
                        Ma ville
                    </a>
                </li>
                <li class="relative mr-4 my-5 ml-4 py-2 py-0">
                    <a href="{{ route('accueil') }}" class="font-bold text-blue-800 hover:text-orange-600">
                        A propos
                    </a>
                </li>
                <li class="relative mr-8 my-5 ml-4 py-2 py-0">
                    <a href="{{ route('register') }}" class="font-bold text-blue-800 hover:text-orange-600">
                        Ajouter mon annonce
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
