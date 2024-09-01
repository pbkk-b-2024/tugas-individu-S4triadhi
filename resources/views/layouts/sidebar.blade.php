<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Pertemuan 1 -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Pertemuan 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Basic Routing -->
                        <li class="nav-item">
                            <a href="{{ route('basic') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Basic Routing</p>
                            </a>
                        </li>
                        <!-- Route Parameters -->
                        <li class="nav-item">
                            <a href="{{ route('parameter.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-link"></i>
                                <p>Route Parameters</p>
                            </a>
                        </li>
                        <!-- Named Routes -->
                        <li class="nav-item">
                            <a href="{{ route('named') }}" class="nav-link">
                                <i class="nav-icon fas fa-bookmark"></i>
                                <p>Named Routes</p>
                            </a>
                        </li>
                        <!-- Route Groups -->
                        <li class="nav-item">
                            <a href="{{ route('group') }}" class="nav-link">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>Route Groups</p>
                            </a>
                        </li>
                        <!-- Fallback Routing -->
                        <li class="nav-item">
                            <a href="{{ route('fallback.test') }}" class="nav-link">
                                <i class="nav-icon fas fa-exclamation-triangle"></i>
                                <p>Fallback Routing</p>
                            </a>
                        </li>
                        <!-- GenapGanjil -->
                        <li class="nav-item">
                            <a href="{{ route('number.index', ['operation' => 'genapGanjil']) }}" class="nav-link">
                                <i class="nav-icon fas fa-random"></i>
                                <p>Genap Ganjil</p>
                            </a>
                        </li>
                        <!-- Fibonacci -->
                        <li class="nav-item">
                            <a href="{{ route('number.index', ['operation' => 'fibonacci']) }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Fibonacci</p>
                            </a>
                        </li>
                        <!-- Prima -->
                        <li class="nav-item">
                            <a href="{{ route('number.index', ['operation' => 'prima']) }}" class="nav-link">
                                <i class="nav-icon fas fa-sort-numeric-up"></i>
                                <p>Prima</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
