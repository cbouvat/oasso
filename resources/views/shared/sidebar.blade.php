<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                <span data-feather="home"></span> {{ __('app.Home') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <span data-feather="user"></span> {{ __('app.Personal informations') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/password') ? 'active' : '' }}" href="{{ route('user.password.edit') }}">
                <span data-feather="lock"></span> {{ __('app.Password') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/subscription*') ? 'active' : '' }}" href="{{ route('user.subscription.index') }}">
                <span data-feather="award"></span> {{ __('app.Subscriptions') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user/gift*') ? 'active' : '' }}" href="{{ route('user.gift.index') }}">
                <span data-feather="gift"></span> {{ __('app.Gifts') }}
            </a>
        </li>
    </ul>

    @if(Auth::user()->role->role_type_id == 2 || Auth::user()->role->role_type_id == 3)
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>{{ __('Administration') }}</span>
    </h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                <span data-feather="users"></span> {{ __('app.Members') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/subscription*') ? 'active' : '' }}" href="{{ route('admin.subscription.index') }}">
                <span data-feather="award"></span> {{ __('app.Subscriptions') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/gift*') ? 'active' : '' }}" href="{{ route('admin.gift.index') }}">
                <span data-feather="gift"></span> {{ __('app.Gifts') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/newsletter*') ? 'active' : '' }}" href="{{ route('admin.newsletter.index') }}">
                <span data-feather="send"></span> {{ __('app.NewsLetter') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/export*') ? 'active' : '' }}" href="{{ route('admin.export.index') }}">
                <span data-feather="download"></span> {{ __('app.Export') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/statistic*') ? 'active' : '' }}" href="{{ route('admin.statistic.index') }}">
                <span data-feather="bar-chart"></span> {{ __('app.Statistics') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/session*') ? 'active' : '' }}" href="{{ route('admin.session.index') }}">
                <span data-feather="user-x"></span> {{ __('app.Connections') }}
            </a>
        </li>
    </ul>
    @endif
</div>
