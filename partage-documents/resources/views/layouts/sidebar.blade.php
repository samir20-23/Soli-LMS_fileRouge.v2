<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documents.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documents</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ressources.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Ressources</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
