<div class="untree_co--site-wrap">
    <nav class="untree_co--site-nav js-sticky-nav
    @if (Request::is('profil','tentangkami','user/dashboard'))
        py-2 bg-white shadow-sm text-dark
    @else
        navbar-dark bg-transparent
    @endif">

        <div class="container d-flex align-items-center">
            <!-- Logo -->
            <div class="logo-wrap">
                <a href="/" class="untree_co--site-logo 
                    @if (Request::is('profil','tentangkami','user/dashboard')) text-dark @endif">
                    LuxtonHotel
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="site-nav-ul-wrap text-center d-none d-lg-block">
                <ul class="site-nav-ul js-clone-nav">
                    <li class="active">
                        <a href="/" class="@if (Request::is('profil','tentangkami')) text-dark @endif">
                            Beranda
                        </a>
                    </li>
                    <li class="has-children">
                        <a href="/tipekamar" class="@if (Request::is('profil','tentangkami')) text-dark @endif">
                            Tipe Kamar
                        </a>
                    </li>
                    <li>
                        <a href="/fasilitas" class="@if (Request::is('profil','tentangkami')) text-dark @endif">
                            Fasilitas
                        </a>
                    </li>
                    <li>
                        <a href="/tentangkami" class="@if (Request::is('profil','tentangkami')) text-dark @endif">
                            Tentang Kami
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Ikon (Profile, dsb.) -->
            <div class="icons-wrap text-md-right">
                <ul class="d-flex align-items-center">
                    <li style="list-style: none">
                        <a href="/profil">
                            <i class="bi bi-person-circle mr-2 fs-5 
                                @if (Request::is('profil','tentangkami')) text-dark @endif">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Toggle Mobile -->
            <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
    </nav>
</div>
