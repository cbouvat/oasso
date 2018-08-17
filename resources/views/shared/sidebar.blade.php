<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                <span data-feather="home"></span> Accueil
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <span data-feather="user"></span> Informations personnelles
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/password') ? 'active' : '' }}" href="{{ route('user.password.edit') }}">
                <span data-feather="lock"></span> Mot de passe
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/subscription*') ? 'active' : '' }}" href="{{ route('user.subscription.index') }}">
                <span data-feather="award"></span> Adhésions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/gift*') ? 'active' : '' }}" href="{{ route('user.gift.index') }}">
                <span data-feather="gift"></span> Dons
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/history') ? 'active' : '' }}" href="{{ route('user.history') }}">
                <span data-feather="activity"></span> Historique
            </a>
        </li>
    </ul>

    @if(Auth::user()->role->role_type_id == 2 || Auth::user()->role->role_type_id == 3)
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administration</span>
    </h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                <span data-feather="users"></span> Membres
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/subscription*') ? 'active' : '' }}" href="{{ route('admin.subscription.index') }}">
                <span data-feather="award"></span> Adhésions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/gift*') ? 'active' : '' }}" href="{{ route('admin.gift.index') }}">
                <span data-feather="gift"></span> Dons
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/mailing*') ? 'active' : '' }}" href="{{ route('admin.mailing.index') }}">
                <span data-feather="mail"></span> Mailing
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/newsletter*') ? 'active' : '' }}" href="{{ route('admin.newsletter.index') }}">
                <span data-feather="send"></span> NewsLetter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/export*') ? 'active' : '' }}" href="#">
                <span data-feather="download"></span> Export
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/statistic*') ? 'active' : '' }}" href="{{ route('admin.statistic.index') }}">
                <span data-feather="bar-chart"></span> Statistiques
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/session*') ? 'active' : '' }}" href="{{ route('admin.session.index') }}">
                <span data-feather="user-x"></span> Connexions
            </a>
        </li>
    </ul>
    @endif
</div>
