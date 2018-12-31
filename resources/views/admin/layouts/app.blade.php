<!doctype html>
<html lang="en-us">

    @include('admin.layouts.include.header')
    <body class="o-page ">
        @php
        $session = Session::all();
        @endphp
        <input type="hidden" id="loginusertype" value="">
        
        @include('admin.layouts.include.breadcrumb')
        @include('admin.layouts.include.message')
        @include('admin.layouts.include.leftpanel.user-left-sidebar')
    <main class="o-page__content">
        @yield('content')
    </main>
    @include('admin.layouts.include.footer')
</body>

</html>