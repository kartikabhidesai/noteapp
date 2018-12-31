@extends('admin.layouts.app')
@section('content')
@include('layouts.include.body_header')
   <div class="c-card u-p-medium u-text-small u-mb-small">
                            <h6 class="u-text-bold">General Info</h6>

                            <dl class="u-flex u-pv-small u-border-bottom">
                                <dt class="u-width-25">First Name</dt>
                                <dd>{{ $userlist[0]['first_name'] }}</dd>
                            </dl>

                            <dl class="u-flex u-pv-small u-border-bottom">
                                <dt class="u-width-25">Last Name</dt>
                                <dd>{{ $userlist[0]['last_name'] }}</dd>
                            </dl>

                            

                           
                            <dl class="u-flex u-pv-small u-border-bottom">
                                <dt class="u-width-25">Last Name</dt>
                                <dd>{{ $userlist[0]['email'] }}</dd>
                            </dl>
                            <dl class="u-flex u-pt-small">
                                <dt class="u-width-25">Status</dt>
                                <dd> 
                                        @if($userlist[0]['status'] == '0')
                                                <span class="c-badge c-badge--success deactive" >Active</span>
                                        @else
                                                <span class="c-badge c-badge--danger active"  > Deactive</span>
                                        @endif
                                </dd>
                            </dl>
                        </div>
@endsection
