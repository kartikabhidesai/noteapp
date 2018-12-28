@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
 <div class="container">
                <div class="row u-mb-large">
                    <div class="col-md-12">
                        <div class="c-table-responsive@wide">
                            <table class="c-table" id="datatable">
                                <caption class="c-table__title">
                                   <div class="c-card__header c-card__header--transparent o-line">
                                       <h4 class="c-card__title"><b>File List</b></h4>
                                        <div class="c-card__meta">
                                            <a href="{{ route("add-file")}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
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
                                        <td class="c-table__cell">{{ $filelist[$i]['file_title']}}</td>
                                        <td class="c-table__cell">{{ $filelist[$i]['created_at']}}</td>
                                        <td class="c-table__cell">{{ $filelist[$i]['ip_address']}}</td>
                                        
                                        <td class="c-table__cell">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                
                                                <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item" href="{{ route('edit-file',$filelist[$i]['id'])}}">Edit</a>
                                                    <a class="c-dropdown__item dropdown-item" href="{{ route('download-file',$filelist[$i]['file_name'])}}">Download</a>
                                                    <a class="c-dropdown__item dropdown-item deletenote" data-image="{{ $filelist[$i]['file_name']}}" data-toggle="modal" data-target="#deleteModel" data-token="{{ csrf_token() }}"  data-id="{{ $filelist[$i]['id'] }}">
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
@endsection
