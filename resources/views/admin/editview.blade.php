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
                        <h6 class="u-mb-zero">Edit User Details</h6>
                    </div>
                </div>
                <form name="edituserdetails" id="edituserdetails" action="{{ route('edituser',$userlist[0]["id"])}}" method="post">
                    <div class="c-stage__panel u-p-medium">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">First Name</label> 
                                    <input class="c-input" name="first_name" id="first_name" placeholder="Enter first name" type="text" value="{{ $userlist[0]['first_name'] }}">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Last Name</label> 
                                    <input class="c-input" name="lastname" id="lastname" placeholder="Enter Last name" type="text" value="{{ $userlist[0]['last_name'] }}">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Email</label> 
                                    <input class="c-input" name="email" id="email" placeholder="Enter email" type="text" value="{{ $userlist[0]['email'] }}">                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Role</label> 
                                    <select  class="c-select"  name="role_type">
                                        <option value="" >Select Role Type</option>
                                        <option value="1" @if($userlist[0]['role_type'] == '1') {{ 'selected="selected"'}} @endif>User</option>
                                        <option value="0" @if($userlist[0]['role_type'] == '0') {{ 'selected="selected"'}} @endif>Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                   
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Edit Details" type="submit">
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
