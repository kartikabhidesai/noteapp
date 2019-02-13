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
                <a class="c-sidebar__link {{ ($currentRoute == 'dashboard' ? 'is-active' : '') }}" href="{{ route('dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>Overview
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'view-note' ||  $currentRoute == 'edit-note' || $currentRoute == 'add-note' || $currentRoute == 'note' ? 'is-active' : '') }}" href="{{ route('note') }}">
                    <i class="fa fa-pencil-square-o u-mr-xsmall"></i>Note
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'edit-file' || $currentRoute == 'add-file' || $currentRoute == 'file' ? 'is-active' : '') }}" href="{{ route('file') }}">
                    <i class="fa fa-clone u-mr-xsmall"></i>File Upload
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'edit-image' || $currentRoute == 'imagedraw' || $currentRoute == 'imagedrawlist' ? 'is-active' : '') }}" href="{{ route('imagedrawlist') }}">
                    <i class="fa fa-picture-o u-mr-xsmall"></i>Image Draw
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'spreadsheet' || $currentRoute == 'add-sheet' || $currentRoute == 'edit-sheet' || $currentRoute == 'view-sheet' ? 'is-active' : '') }}" href="{{ route('spreadsheet') }}">
                    <i class="fa fa-file-excel-o u-mr-xsmall"></i>Spread Sheet
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'changepassword' ? 'is-active' : '') }}" href="{{ route('changepassword') }}">
                    <i class="fa fa-edit u-mr-xsmall" ></i>Change Password
                </a>
            </li>
        </ul>
    </div>
</div>