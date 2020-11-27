<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/home" class="brand-link">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="{{ config('app.name') }} Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : null }}" href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
