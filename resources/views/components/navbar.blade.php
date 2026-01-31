<header>
    <nav>
        <div class="logo">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Bumantara Studio">
            <div class="logo-text-container">
                <span class="logo-text-main">bumantara</span>
                <span class="logo-text-sub">studio</span>
            </div>
        </div>

        <!-- Hamburger Button -->
        <button class="hamburger" id="hamburger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- PASTIKAN SEMUA 5 MENU INI ADA -->
        <ul class="nav-links" id="navLinks">
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
            <div class="profile-menu" id="profileMenu">
                <div class="profile-trigger" onclick="toggleDropdown(event)">
                    <svg class="profile-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                    </svg>

                    <span>{{ Auth::user()->name }}</span>

                    <svg class="dropdown-arrow" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </div>

                <div class="profile-dropdown">
                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @else
                    <a href="{{ route('profile.show') }}">Profile</a>
                    <a href="{{ route('booking3') }}">Pesanan</a>
                    @endif

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

<script>
    // Toggle Mobile Menu - FIXED VERSION
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    const body = document.body;
    
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
            body.classList.toggle('menu-open');
        });

        // Close menu when clicking on a link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                body.classList.remove('menu-open');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (body.classList.contains('menu-open') && 
                !e.target.closest('nav') && 
                !e.target.closest('.hamburger')) {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                body.classList.remove('menu-open');
            }
        });
    }

    // Profile Dropdown Toggle
    function toggleDropdown(event) {
        event.stopPropagation();
        const profileMenu = document.getElementById('profileMenu');
        if (profileMenu) {
            profileMenu.classList.toggle('active');
        }
    }

    // Close profile dropdown when clicking outside
    document.addEventListener('click', (e) => {
        const profileMenu = document.getElementById('profileMenu');
        if (profileMenu && !e.target.closest('.profile-menu')) {
            profileMenu.classList.remove('active');
        }
    });

    // Auto close menu saat resize ke desktop
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > 768) {
                if (hamburger && navLinks) {
                    hamburger.classList.remove('active');
                    navLinks.classList.remove('active');
                    body.classList.remove('menu-open');
                }
            }
        }, 250);
    });
</script>