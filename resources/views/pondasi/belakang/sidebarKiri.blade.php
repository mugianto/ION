<nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <img src="{{asset('storage/asetnya/upl/gambar/ion-network-logo-h45.png')}}" alt="Logo ION Network">
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">

                    <li class="nav-item nav-category">ION Section</li>

                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{route('home')}}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item nav-category">CMS HSP</li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs(['artikel.index', 'artikel.create', 'artikel.edit']) ? 'active' : '' }}" 
                        data-bs-toggle="collapse" href="#artikel" role="button" 
                        aria-expanded="{{ request()->routeIs(['artikel.index', 'artikel.create', 'artikel.edit']) ? 'true' : 'false' }}" 
                        aria-controls="edit">
                            <i class="link-icon" data-feather="edit"></i>
                            <span class="link-title">Artikel</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse {{ request()->routeIs(['artikel.index', 'artikel.create']) ? 'show' : '' }}" id="artikel">
                            <ul class="nav sub-menu ms-1">
                                <li class="nav-item">
                                    <a href="{{ route('artikel.index') }}" 
                                    class="nav-link {{ request()->routeIs('artikel.index') ? 'active' : '' }}">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('artikel.create') }}" 
                                    class="nav-link {{ request()->routeIs('artikel.create') ? 'active' : '' }}">Ciptakan</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#kategori" role="button" aria-expanded="false"
                            aria-controls="airplay">
                            <i class="link-icon" data-feather="folder"></i>
                            <span class="link-title">Kategori</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="kategori">
                            <ul class="nav sub-menu ms-1">
                                <li class="nav-item">
                                <a href="{{route('kategori.index')}}" class="nav-link">Semua </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('kategori.create')}}" class="nav-link">Ciptakan</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#pengguna" role="button" aria-expanded="false"
                            aria-controls="airplay">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Users</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="pengguna">
                            <ul class="nav sub-menu ms-1">
                                <li class="nav-item">
                                <a href="{{route('pengguna.index')}}" class="nav-link">Semua </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pengguna.create')}}" class="nav-link">Ciptakan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>