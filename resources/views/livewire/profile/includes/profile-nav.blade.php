<ul class="link-list-menu">
    <li><a @yield('profile')
            href="{{ route('profile') }}"><em
                class="icon ni ni-user-fill-c"></em><span>My Profile</span></a></li>
    <li><a @yield('risk') href=""><em
                class="icon ni ni-repeat"></em><span>My Trades</span></a>
    </li>
    <li><a @yield('password') href="{{ route('change-password')}}"><em
        class="icon ni ni-eye"></em><span>Change Password</span></a>
    </li>
    <li><a @yield('log') href="{{ route('activity-log')}}"><em
        class="icon ni ni-activity-round"></em><span>Activity Log</span></a>
    </li>
</ul>
