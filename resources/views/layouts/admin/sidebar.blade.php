<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="#">
                <img src="{{ asset('assets') }}/img/logos.png" width="160" height="90" alt="Tabler">
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3">
            </div>
            <div class="d-none d-lg-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ asset('assetsAdmin') }}/static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->username }}</div>
                        <div class="mt-1 small text-muted">{{ Auth::user()->role }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a href="#" class="dropdown-item">Logout</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <!-- Tampilkan menu hanya untuk pengguna dengan role 'kelompok' -->
            @if (Auth::check() && Auth::user()->role === 'Pemimpin Kelompok')
                <ul class="navbar-nav pt-lg-3">
                    <li class="nav-item {{ request()->is(['/kelompok/dashboard']) ? 'active' : '' }}">
                        <a class="nav-link" href="/kelompok/dashboard">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown {{ request()->is(['kelompok/anggota', 'kelompok/jadwal']) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle {{ request()->is(['karyawan', 'department']) ? 'show' : '' }}"
                            href="#navbar-base" data-bs-toggle="dropdown"
                            data-bs-auto-close="{{ request()->is(['kelompok/anggota', 'kelompok/jadwal']) ? 'true' : 'false' }}"
                            role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Data Master
                            </span>
                        </a>
                        <div
                            class="dropdown-menu {{ request()->is(['kelompok/anggota', 'kelompok/jadwal']) ? 'show' : '' }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item {{ request()->is(['kelompok/anggota']) ? 'active' : '' }}"
                                        href="/kelompok/anggota">
                                        Data Anggota
                                    </a>
                                    <a class="dropdown-item {{ request()->is(['kelompok/jadwal']) ? 'active' : '' }}"
                                        href="/kelompok/jadwal">
                                        Data Jadwal
                                    </a>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is(['/kelompok/submit-absensi']) ? 'active' : '' }}">
                        <a class="nav-link" href="/kelompok/submit-absensi">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-clipboard-data" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                </path>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                </path>
                                <path d="M9 17v-4"></path>
                                <path d="M12 17v-1"></path>
                                <path d="M15 17v-2"></path>
                                <path d="M12 17v-1"></path>
                            </svg>
                            <span class="nav-link-title">
                                Submit Absensi
                            </span>
                        </a>
                    </li>
                </ul>
            @endif

            <!-- Tampilkan menu hanya untuk pengguna dengan role 'anggota' -->
            @if (Auth::check() && Auth::user()->role === 'Pemimpin Apel')
                <ul class="navbar-nav pt-lg-3">
                    <li class="nav-item {{ request()->is(['/apel/dashboard']) ? 'active' : '' }}">
                        <a class="nav-link" href="/apel/dashboard">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ request()->is(['apel/rekapitulasi']) ? 'active' : '' }}">
                        <a class="nav-link" href="/apel/rekapitulasi">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-current-location" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
                                    <path d="M12 2l0 2"></path>
                                    <path d="M12 20l0 2"></path>
                                    <path d="M20 12l2 0"></path>
                                    <path d="M2 12l2 0"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Rekapitulasi
                            </span>
                        </a>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</aside>
