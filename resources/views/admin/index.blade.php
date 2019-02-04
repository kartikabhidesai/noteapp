@extends('admin.layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
                <div class="row u-mb-large">
                    <div class="col-md-12">
                        <div class="c-table-responsive@wide">
                            <table class="c-table" id="datatable">
                                <caption class="c-table__title">
                                   <div class="c-card__header c-card__header--transparent o-line">
                                       <h4 class="c-card__title"><b>User List</b></h4>
                                        
                                    </div>
                                </caption>
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head">No</th>
                                        <th class="c-table__cell c-table__cell--head">First Name</th>
                                        
                                        <th class="c-table__cell c-table__cell--head">Last Name</th>
                                        <th class="c-table__cell c-table__cell--head">Email</th>
                                        <th class="c-table__cell c-table__cell--head">Last Login</th>
                                        <th class="c-table__cell c-table__cell--head">Ip Address</th>
                                        <th class="c-table__cell c-table__cell--head">Status</th>
                                        <th class="c-table__cell c-table__cell--head">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($userlist) > 0)
                                    @for($i=0; $i < count($userlist); $i++)
                                        <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">{{ $i+1 }}</span></td>
                                        <td class="c-table__cell">{{ $userlist[$i]['first_name']}}</td>
                                        <td class="c-table__cell">{{ $userlist[$i]['last_name']}}</td>
                                        <td class="c-table__cell">{{ $userlist[$i]['email']}}</td>
                                        <td class="c-table__cell">{{ $userlist[$i]['last_login']}}</td>
                                        <td class="c-table__cell">{{ $userlist[$i]['last_login_ip']}}</td>
                                        <td class="c-table__cell">
                                            @if($userlist[$i]['status'] == '0')
                                                <span class="c-badge c-badge--success deactive" data-token="{{ csrf_token() }}"  data-id="{{ $userlist[$i]['id'] }}" data-toggle="modal" data-target="#deactivemodel" >Active</span>
                                            @else
                                                <span class="c-badge c-badge--danger active"  data-token="{{ csrf_token() }}"  data-id="{{ $userlist[$i]['id'] }}" data-toggle="modal" data-target="#activemodel"> Deactive</span>
                                            @endif
                                        </td>
                                        
                                        <td class="c-table__cell">
                                                <div class="c-dropdown dropdown">
                                                    <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                        <a class="c-dropdown__item dropdown-item" href="{{ route('edituser',$userlist[$i]['id']) }}">Edit</a>
                                                        <a class="c-dropdown__item dropdown-item" href="{{ route("viewuser",$userlist[$i]['id']) }}">View</a>
                                                        <a class="c-dropdown__item dropdown-item" href="{{ route("chagepassword",$userlist[$i]['id']) }}">Change Password</a>
                                                        <a class="c-dropdown__item dropdown-item delete" data-token="{{ csrf_token() }}"  data-toggle="modal" data-target="#deleteModel" data-token="{{ csrf_token() }}"  data-id="{{ $userlist[$i]['id'] }}">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    @endfor
                                    @else
                                    <tr class="c-table__row">
                                        <td class="c-table__cell" colspan="5" style="color:red">Note Data Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div><!-- // .c-card -->
                    </div>
                </div><!-- // .row -->
            </div>
<div class="c-modal modal fade" id="deactivemodel" tabindex="-1" role="dialog" aria-labelledby="standard-modal" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">
                <div class="c-modal__header">
                    <h3 class="c-modal__title">deactive User</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__body">
                    <p>Are you sure want to deactive user  ?</p>
                </div>
                <div class="c-modal__footer">
                    <button class="c-btn c-btn--info pull-right" data-dismiss="modal">Cancel</button>
                    <button class="c-btn c-btn--danger yes-sure-deactive"><i class="fa fa-trash-o u-mr-xsmall "></i> Deactive User </button>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div>

<div class="c-modal modal fade" id="activemodel" tabindex="-1" role="dialog" aria-labelledby="standard-modal" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">
                <div class="c-modal__header">
                    <h3 class="c-modal__title">Active User</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__body">
                    <p>Are you sure want to active user ?</p>
                </div>
                <div class="c-modal__footer">
                    <button class="c-btn c-btn--info pull-right" data-dismiss="modal">Cancel</button>
                    <button class="c-btn c-btn--danger yes-sure-active"><i class="fa fa-trash-o u-mr-xsmall "></i> Active User</button>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div>
@endsection
