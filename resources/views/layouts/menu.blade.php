<nav class="col-md-2 d-none d-md-block bg-light sidebar shadow">
    <div class="sidebar-sticky">
        <!--Default menu for all users -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.user.index') }}">
                    <i class="fas fa-users"></i> Mon compte
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.password.edit') }}">
                    <i class="fas fa-lock"></i> Mot de passe
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.gift.create') }}">
                    <i class="fas fa-gift"></i> Dons
                </a>
            </li>
            <!-- End default menu for all users -->

            @if(Auth::user()->role->role_type_id === 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.history') }}">
                        <i class="fas fa-signal"></i> Historique
                    </a>
                </li>
            @endif
        </ul>
        @if(Auth::user()->role->role_type_id === 2 || Auth::user()->role->role_type_id === 3)
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users"></i> Membres
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-export"></i> Export
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.mailing.index') }}">
                        <i class="fas fa-envelope"></i> Mailing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.newsletter.index') }}">
                        <i class="far fa-newspaper"></i> NewsLetter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.gift.index') }}">
                        <i class="fas fa-gift"></i> Gestion des Dons
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-signal"></i> Statistiques
                    </a>
                </li>
                @endif

                @if(Auth::user()->role->role_type_id === 3)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i> Gestion des Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cogs"></i> Configuration
                        </a>
                    </li>
                @endif
            </ul>
    </div>
</nav>
