<header id="scrolledHeader">
    <nav>
        {{-- Sezione sx: hamburger + logo --}}
        <div class="sx-section">
            <!-- Icona hamburger -->
            <div class="ham-container" id="ham">
                <div class="hamburger">
                </div>
            </div>

            <ul class='menulist'>
                <li><a href='{{ route('login') }}'>Accedi</a></li>
                <li><a href='#'>Registrati</a></li>
                <li><a href='#'>Il mio profilo</a></li>
                <li><a href='#'>Aggiungi ristorante</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

            <a href="{{route('indexViewLink')}}">
                <img src="{{asset('/storage/assets/site-logo/site-logo.svg')}}" alt="site-logo">
                {{-- FIVEBOO'S --}}
             </a>
        </div>
    </nav>
</header>
