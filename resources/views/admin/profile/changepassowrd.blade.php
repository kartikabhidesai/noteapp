@extends('admin.layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-edit"></i>
                    </div>
                    
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Change Password</h6>
                    </div>
                    
                </div>
                    <div class="c-stage__panel u-p-medium">      
                        <form action="{{ route('adminchagepassword') }}" method="post" enctype="multipart/form-data" id="changepassword" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="noteTitle">Old Password</label> 
                                        <input class="c-input" name="oldpassword" id="oldpassword" placeholder="Enter old password" type="password">
                                        <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="noteTitle">New Password</label> 
                                        <input class="c-input" name="newpassword" id="newpassword" placeholder="Enter new password" type="password">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="noteTitle">Confirm New Password</label> 
                                        <input class="c-input" name="confirmpassword" id="confirmpassword" placeholder="Enter confirm new password" type="password">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        
                            <br>
                         
                            <div class="row">
                                <div class="col-lg-3">
                                    <input class="c-btn c-btn--info c-btn--fullwidth" value="Save Password" type="submit">
                                </div>
                            </div>
                       </form>
                    </div>
                    
            </article>
        </div>
    </div>
</div>
<style>
    input.has-error {
        border-color: red;
    }
</style>
@endsection
