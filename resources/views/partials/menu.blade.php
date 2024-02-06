<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Selamat Datang, <br> {{ auth()->user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- @if (auth()->user()->role == 'user') -->
                <!-- <li class="nav-item">
                        <a href="{{ url("/dashboard/assets") }}" class="nav-link {{ request()->is("dashboard/assets") || request()->is("dashboard/assets/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/car-solid.svg') }}" alt="barang" width="20px" height="20px">
                            </i>
                            <p>
                                Barang
                            </p>
                        </a>
                    </li> -->
                <!-- @endif -->
                @if (auth()->user()->role != 'direktur')
                <li class="nav-item">
                    <a href="{{ url("/dashboard/permintaans") }}" class="nav-link {{ request()->is("dashboard/permintaans") || request()->is("dashboard/permintaans/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/pen-solid.svg') }}" alt="barang" width="20px" height="20px">

                        </i>
                        <p>
                            Reservasi
                        </p>
                    </a>
                </li>
                @endif

                <!-- <li class="nav-item">
                    <a href="{{ url("/dashboard/tests") }}" class="nav-link {{ request()->is("dashboard/tests") || request()->is("dashboard/tests/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/pen-solid.svg') }}" alt="barang" width="20px" height="20px">

                        </i>
                        <p>
                            Test
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("/dashboard/interviews") }}" class="nav-link {{ request()->is("dashboard/interviews") || request()->is("dashboard/interviews/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/pen-solid.svg') }}" alt="barang" width="20px" height="20px">

                        </i>
                        <p>
                            Interview
                        </p>
                    </a>
                </li> -->


                <!-- @if (auth()->user()->role == 'vendor' || auth()->user()->role == 'finance' || auth()->user()->role == 'gudang')
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/pembayarans") }}" class="nav-link {{ request()->is("dashboard/pembayarans") || request()->is("dashboard/pembayarans/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/cash-register-solid.svg') }}" alt="barang" width="20px" height="20px">

                            </i>
                            <p>
                                Pembayaran
                            </p>
                        </a>
                    </li>
                    @endif -->

                @if (auth()->user()->role == 'direktur')
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