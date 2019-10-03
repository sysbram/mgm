<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    
    <div class="logo">
    <a href="/" class="simple-text logo-normal">
        {{ __('MGM') }}
    </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if($check[0][0]==1 || $admin_status == 1)
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
            <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="material-icons">dashboard</i>
                <p>{{ __('Dashboard') }}</p>
            </a>
            </li>
            @endif

            @if($check[1][0]==1 || $admin_status == 1)
            <li class="nav-item{{ $activePage == 'back_office' ? ' active' : '' }}">
            <a class="nav-link" href="/back_office">
                <i class="material-icons">accessibility</i>
                <p>{{ __('Back Office') }}</p>
            </a>
            </li>
            @endif

            @if($check[2][0]==1 || $admin_status == 1)
            <li class="nav-item{{ $activePage == 'member' ? ' active' : '' }}">
            <a class="nav-link" href="/member">
                <i class="material-icons">face</i>
                <p>{{ __('Member') }}</p>
            </a>
            </li>
            @endif

            @if($check[3][0]==1 || $admin_status == 1)
            <li class="nav-item{{ $activePage == 'log_bo' ? ' active' : '' }}">
            <a class="nav-link" href="/log_bo">
                <i class="material-icons">assignment</i>
                <p>{{ __('Log Back Office') }}</p>
            </a>
            </li>
            @endif

        </ul>
    </div>
</div>