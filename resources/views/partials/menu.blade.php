<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Selamat Datang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (auth()->user()->role == 'user' || auth()->user()->role == 'admin' || auth()->user()->role == 'dirkp')
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/formulirPendaftarans") }}" class="nav-link {{ request()->is("dashboard/formulirPendaftarans") || request()->is("dashboard/formulirPendaftarans/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/book-solid.svg') }}" alt="book" width="20px" height="20px">
                            </i>
                            <p>
                                Pendaftaran
                            </p>
                        </a>
                    </li>
                @endif

                    <!-- @if (auth()->user()->role == 'vendor' || auth()->user()->role == 'finance')
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/pembayarans") }}" class="nav-link {{ request()->is("dashboard/pembayarans") || request()->is("dashboard/pembayarans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-money-bill-alt">

                            </i>
                            <p>
                                Pembayaran
                            </p>
                        </a>
                    </li>
                    @endif -->

                    @if (auth()->user()->role == 'dirkp' || auth()->user()->role == 'dirut')
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/laporans") }}" class="nav-link {{ request()->is("dashboard/laporans") || request()->is("dashboard/laporans/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/file.svg') }}" alt="laporan" width="20px" height="20px">
                            </i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <form id="logoutform" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <p>
                                    <!-- <i class="fas fa-fw fa-sign-out-alt nav-icon"></i> -->
                                    <!-- get icon from public/icons/sign-out -->
                                    <img src="{{ asset('icons/sign-out.svg') }}" alt="logout" width="20px" height="20px">
                                    <p>Logout</p>
                                </p>
                            </a>
                        </form>
                    </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>