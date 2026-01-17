<header>
    <nav>
        <div class="logo">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Bumantara Studio">
            <div class="logo-text-container">
                <span class="logo-text-main">bumantara</span>
                <span class="logo-text-sub">studio</span>
            </div>
        </div>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('about') }}">ABOUT US</a></li>
            <li><a href="{{ route('packages') }}">PACKAGE</a></li>
            <li><a href="{{ route('claimphoto') }}">CLAIM PHOTO</a></li>
            <li><a href="{{ route('gallery') }}">GALLERY</a></li>
        </ul>

        <div class="nav-right">
            @guest
                <!-- BELUM LOGIN -->
                <a href="{{ route('login') }}" class="masuk-btn-outline">MASUK</a>
                <a href="{{ route('register') }}" class="masuk-btn">DAFTAR</a>
            @endguest

            @auth
                <!-- SUDAH LOGIN -->
                <div class="profile-menu" id="profileMenu">
                    <div class="profile-trigger">
                        <svg class="profile-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                        </svg>
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="dropdown-arrow" viewBox="0 0 24 24" fill="currentColor" onclick="toggleDropdown(event)">
                            <path d="M7 10l5 5 5-5z"/>
                        </svg>
                    </div>

                    <div class="profile-dropdown">
                        {{-- @if(Auth::user()->role === 'admin')
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        @endif --}}

                        <a href="{{ route('profile.show') }}">Profile</a>

                        <a href="{{ route('booking3') }}">Pesanan</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
</header>