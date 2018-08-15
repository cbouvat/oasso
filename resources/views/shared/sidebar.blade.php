<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                <span data-feather="home"></span> Accueil
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.user.index') }}">
                <span data-feather="user"></span> Informations personnelles
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.password.edit') }}">
                <span data-feather="lock"></span> Mot de passe
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="award"></span> Adhésions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.gift.create') }}">
                <span data-feather="gift"></span> Dons
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.history') }}">
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
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <span data-feather="users"></span> Membres
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.subscription.index') }}">
                <span data-feather="award"></span> Adhésions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.gift.index') }}">
                <span data-feather="gift"></span> Dons
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.mailing.index') }}">
                <span data-feather="mail"></span> Mailing
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.newsletter.index') }}">
                <span data-feather="send"></span> NewsLetter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="download"></span> Export
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="bar-chart"></span> Statistiques
            </a>
        </li>
    </ul>
    @endif
</div>
