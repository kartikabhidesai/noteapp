@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
 <div class="container">
                <div class="row u-mb-large">
                    <div class="col-md-12">
                        <div class="c-table-responsive@wide">
                            <table class="c-table" id="datatable">
                                <caption class="c-table__title">
                                   <div class="c-card__header--transparent o-line">
                                       <h4 class="c-card__title"><b>Draw List</b></h4>
                                        <div class="c-card__meta">
                                            <a href="{{ route("imagedraw")}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </caption>
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head">No</th>
                                        <th class="c-table__cell c-table__cell--head">File Name</th>
                                        
                                        <th class="c-table__cell c-table__cell--head">Date/Time</th>
                                        <th class="c-table__cell c-table__cell--head">IP Address</th>                                       
                                        <th class="c-table__cell c-table__cell--head">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($filelist) > 0)
                                    @for($i=0; $i < count($filelist); $i++)
                                        <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">{{ $i+1 }}</span></td>
                                        <td class="c-table__cell">{{ $filelist[$i]['draw_name']}}</td>
                                        <td class="c-table__cell">{{ $filelist[$i]['created_at']}}</td>
                                        <td class="c-table__cell">{{ $filelist[$i]['ip_address']}}</td>
                                        
                                        <td class="c-table__cell">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                
                                                <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item" href="{{ route('download-file',$filelist[$i]['filename'])}}">Download</a>
                                                    <a class="c-dropdown__item dropdown-item viewimage" data-image="{{ $filelist[$i]['filename']}}"   data-toggle="modal" data-target="#viewimage" data-token="{{ csrf_token() }}"  data-id="{{ $filelist[$i]['id'] }}"  href="javascript:;">View</a>
                                                    <a href="{{ route("edit-image",$filelist[$i]['id']) }}"class="c-dropdown__item dropdown-item deletenote" >Edit</a>
                                                    <a class="c-dropdown__item dropdown-item deletenote" data-image="{{ $filelist[$i]['filename']}}" data-toggle="modal" data-target="#deleteModel" data-token="{{ csrf_token() }}"  data-id="{{ $filelist[$i]['id'] }}">Delete</a>
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

<div class="c-modal c-modal--huge modal fade" id="viewimage" tabindex="-1" role="dialog" aria-labelledby="modal8" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">View Image</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__body addhtml">
                    
                </div>
                
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
@endsection
