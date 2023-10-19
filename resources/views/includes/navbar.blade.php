<div class="nk-sidebar-content">
    <div class="nk-sidebar-menu" data-simplebar>
        <ul class="nk-menu">
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">Dashboard</h6>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="{{ route('dashboard') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                    <span class="nk-menu-text"> Dashboard</span>
                </a>
            </li><!-- .nk-menu-item -->
            @if(Auth::user()->user_type=="Super Admin")
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                    <span class="nk-menu-text">Account</span>
                </a>
                <ul class="nk-menu-sub" {{ $status ?? '' }}>
                    <li class="nk-menu-item">
                        <a href="{{ route('accounts.create') }}" class="nk-menu-link"><span class="nk-menu-text">Create Account</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('accounts.index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Accounts</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('accounts.rate') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Exchange Rate</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                    <span class="nk-menu-text">Staff Management</span>
                </a>
                <ul class="nk-menu-sub" {{ $status ?? '' }}>
                    <li class="nk-menu-item">
                        <a href="{{ route('users.create') }}" class="nk-menu-link"><span class="nk-menu-text">Register Staff</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('users.index') }}" class="nk-menu-link"><span class="nk-menu-text">Manager Staff</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                    <span class="nk-menu-text">Transactions</span>
                </a>
                <ul class="nk-menu-sub" {{ $status ?? '' }}>
                    <li class="nk-menu-item">
                        <a href="{{ route('transactions.deposit') }}" class="nk-menu-link"><span class="nk-menu-text">Deposit Funds</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('transactions.withdraw') }}" class="nk-menu-link"><span class="nk-menu-text">Withdraw Funds</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('transactions.index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Transactions</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                    <span class="nk-menu-text">Trade</span>
                </a>
                <ul class="nk-menu-sub" {{ $status ?? '' }}>
                    <li class="nk-menu-item">
                        <a href="{{ route('trades.create') }}" class="nk-menu-link"><span class="nk-menu-text">Start Trade</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('trades.index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Trades</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
            @elseif(Auth::user()->user_type=="Staff")
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                    <span class="nk-menu-text">Trade</span>
                </a>
                <ul class="nk-menu-sub" {{ $status ?? '' }}>
                    <li class="nk-menu-item">
                        <a href="{{ route('trades.create') }}" class="nk-menu-link"><span class="nk-menu-text">Start Trade</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('trades.index') }}" class="nk-menu-link"><span class="nk-menu-text">My Trades</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
            @endif
        </ul><!-- .nk-menu -->
    </div><!-- .nk-sidebar-menu -->
</div><!-- .nk-sidebar-content -->
