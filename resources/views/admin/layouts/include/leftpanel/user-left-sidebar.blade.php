@php
$currentRoute = Route::current()->getName();
@endphp
<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="{{ route('dashboard') }}">
            <img class="c-sidebar__brand-img" src="{{ asset('img/logo.png') }}" alt="Logo"> Dashboard
        </a>
        <h4 class="c-sidebar__title">Dashboard</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'admin-dashboard' ? 'is-active' : '') }}" href="{{ route('admin-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>Overview
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'chagepassword' || $currentRoute == 'edituser' || $currentRoute == 'userlist' || $currentRoute == 'viewuser'   ? 'is-active' : '') }}" href="{{ route('userlist') }}">
                    <i class="fa fa-users u-mr-xsmall"></i>User List
                </a>
            </li>
            
        </ul>
    </div>
</div>
