@extends('admin.layouts.app')
@section('content')
@include('layouts.include.body_header')
    <div class="container">
     
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Change Password</h6>
                    </div>
                </div>
                <form name="changepassword" id="changepassword" action="{{ route('chagepassword',$userid)}}" method="post">
                    <div class="c-stage__panel u-p-medium">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">New Password</label> 
                                    <input class="c-input" name="newpassword" id="newpassword" placeholder="Enter new password" type="password" >
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Confirm New Password</label> 
                                    <input class="c-input" name="confirmPassword" id="confirmPassword" placeholder="Enter confirm new password" type="Password" >
                                    
                                </div>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Change Password" type="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>
<style>
    input.has-error {
        border-color: red;
    }
    .has-error .select2,.has-error .select2-selection{
        color: red !important;
        border-color: red !important;
    }

</style>
@endsection
