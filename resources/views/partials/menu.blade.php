<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Selamat Datang, {{ auth()->user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (in_array(auth()->user()->role, ['koordinator', 'teknisi']))
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/permintaans") }}" class="nav-link {{ request()->is("dashboard/permintaans") || request()->is("dashboard/permintaans/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/book-solid.svg') }}" alt="book" width="20px" height="20px">
                            </i>
                            <p>
                                Work Order
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/penugasan-teknisi") }}" class="nav-link {{ request()->is("dashboard/penugasan-teknisi") || request()->is("dashboard/penugasan-teknisi/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/book-solid.svg') }}" alt="book" width="20px" height="20px">
                            </i>
                            <p>
                                Penugasan Teknisi
                            </p>
                        </a>
                    </li>
                    @endif
                    @if (in_array(auth()->user()->role, ['quality_control', 'supervisor']))
                    <li class="nav-item">
                        <a href="{{ url("/dashboard/persetujuan-work-order") }}" class="nav-link {{ request()->is("dashboard/persetujuan-work-order") || request()->is("dashboard/persetujuan-work-order/*") ? "active" : "" }}">
                        <img src="{{ asset('icons/book-solid.svg') }}" alt="book" width="20px" height="20px">
                            </i>
                            <p>
                                Persetujuan Work Order
                            </p>
                        </a>
                    </li>
                    @endif

                    @if (in_array(auth()->user()->role, ['koordinator', 'general_manager', 'supervisor']))
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