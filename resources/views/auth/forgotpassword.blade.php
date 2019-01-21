@extends('layouts.login_layout')
@section('content')
<div class="o-page__card o-page--center">
    <div class="c-card u-mb-xsmall">
        <header class="c-card__header u-pt-large">
            <a class="c-card__icon" href="#!">
                <img src="{{ asset('img/logo-login.svg') }}" alt="Dashboard UI Kit">
            </a>
            <h1 class="u-h3 u-text-center u-mb-zero">Welcome back! Reset Password Here.</h1>
        </header>
        
        <div id="errorSection" style="width:100% !important;">

            @if (session('session_error'))
            <div class="alert alert-danger">
                {{ session('session_error') }}
                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            @endif

            @if (session('session_success'))
            <div class="alert alert-success">
                {{ session('session_success') }}
                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            @endif

            @if (session('session_alert'))
            <div class="alert alert-warning">
                {{ session('session_alert') }}
                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            @endif
        </div>

        <form class="form-horizontal c-card__body register" id="forgotpassword" method="POST" action="{{ route('forgotpassword') }}">
            {{ csrf_field() }}
                    
                    
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input1">E-mail address</label> 
                        <input class="c-input" type="email" name="email" id="input1" placeholder="clark@dashboard.com"> 
                    </div>
                    
                   
                    <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Sent Password to email</button>
        </form>
    </div>

    <div class="o-line">
        <a class="u-text-mute u-text-small" href="{{ route('login') }}">Goto Login</a>
    </div>
</div>

<style>
    .alert {
    margin: 0px 10px;
    }
    .alert-danger{
       background-color: #fc9680; 
    }
    .alert-success{
       background-color: #8ddd72; 
    }
    .alert-warning{
       background-color: #f2ec89; 
    }
</style>
@endsection
