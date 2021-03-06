<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    @yield('css')
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
            <div class="search-header">
                Histories
            </div>
            <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-header">
                Result
            </div>
            <div class="search-item">
                <a href="#">
                <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                oPhone S9 Limited Edition
                </a>
            </div>
            <div class="search-item">
                <a href="#">
                <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                Drone X2 New Gen-7
                </a>
            </div>
            <div class="search-item">
                <a href="#">
                <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                Headphone Blitz
                </a>
            </div>
            <div class="search-header">
                Projects
            </div>
            <div class="search-item">
                <a href="#">
                <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                </div>
                Stisla Admin Template
                </a>
            </div>
            <div class="search-item">
                <a href="#">
                <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                </div>
                Create a new Homepage Design
                </a>
            </div>
            </div>
        </div>
        </form>
        <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Messages
                <div class="float-right">
                <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                </div>
                <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                </div>
                <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                </div>
                <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                </div>
                <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                </div>
                <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                </div>
                <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                </div>
                <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                </div>
                <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ auth()->user()->img_avatar }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
            </div>
        </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">DEMO CRUD</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">DEMO</a>
        </div>
        <ul class="sidebar-menu">
            @if(auth()->user()->is_admin == 1)
            <li class="menu-header">Dashboard</li>
            <li class="{{ set_active(['admin/dashboard']) }}"><a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Admin</li>
            <li class="{{ set_active(['admin/kelas*']) }}"><a class="nav-link" href="{{ route('admin.kelas.index') }}"><i class="fas fa-users"></i> <span>CRUD Kelas</span></a></li>
            <li class="{{ set_active(['admin/siswa*']) }}"><a class="nav-link" href="{{ route('admin.siswa.index') }}"><i class="fas fa-users"></i> <span>CRUD Siswa</span></a></li>
            <li class="{{ set_active(['admin/admin*']) }}"><a class="nav-link" href="{{ route('admin.admin.index') }}"><i class="fas fa-users"></i> <span>List Admin</span></a></li>
            <li class="menu-header">Management Sekolah</li>
            <li class="{{ set_active(['admin/slider*']) }}"><a class="nav-link" href="{{ route('admin.slider.index') }}"><i class="fas fa-copy"></i> <span>Slider</span></a></li>
            <li class="{{ set_active(['admin/post*']) }}"><a class="nav-link" href="{{ route('admin.post.index') }}"><i class="fa fa-newspaper"></i> <span>Post</span></a></li>
            <li class="menu-header">Profile</li>
            <li class="{{ set_active(['siswa/profile*']) }}"><a class="nav-link" href="{{ route('siswa.profile.index') }}"><i class="fas fa-user"></i> <span>My Profile</span></a></li>
            @else
            <li class="menu-header">Dashboard</li>
            <li class="{{ set_active(['siswa/dashboard']) }}"><a class="nav-link" href="{{ route('siswa.dashboard.index') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Siswa</li>
            <li class="{{ set_active(['siswa/kelas*']) }}"><a class="nav-link" href="{{ route('siswa.kelas.index') }}"><i class="fas fa-users"></i> <span>Data Kelas</span></a></li>
            <li class="menu-header">Profile</li>
            <li class="{{ set_active(['siswa/profile*']) }}"><a class="nav-link" href="{{ route('siswa.profile.index') }}"><i class="fas fa-user"></i> <span>My Profile</span></a></li>
            @endif
        </ul>
        </aside>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="section-body">
            @yield('content')
        </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
        Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="https://zoinix.com/">Zoinix.COM</a>
        </div>
        <div class="footer-right">
        2.3.0
        </div>
    </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
@yield('js')
<script src="{{ mix('js/app.js') }}"></script>

<script>
        @if (session()->has('success'))
        
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
        
        @elseif(session()->has('error'))
        
            Swal.fire({
                icon: 'error',
                text: 'GAGAL!',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            })
        
        @elseif(session()->has('warning'))

            Swal.fire({
                icon: 'warning',
                text: 'PERINGATAN!',
                title: '{{ session('warning') }}',
                showConfirmButton: false,
                timer: 3000
            })
        
        @elseif(session()->has('info'))
        
            Swal.fire({
                icon: 'info',
                text: 'INFORMASI!',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 3000
            })
        
        @endif
    </script>

<!-- Page Specific JS File -->
</body>
</html>
