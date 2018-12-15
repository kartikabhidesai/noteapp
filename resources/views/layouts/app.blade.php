<!doctype html>
<html lang="en-us">

    @include('layouts.include.header')
    <body class="o-page ">
        @php
        $session = Session::all();
        @endphp
        <input type="hidden" id="loginusertype" value="{{ $session['logindata'][0]['name'] }}">
        
        @include('layouts.include.breadcrumb')
        @include('layouts.include.message')
        @include('layouts.include.leftpanel.user-left-sidebar')
    <main class="o-page__content">
        @yield('content')
    </main>
    @include('layouts.include.footer')
</body>

</html>