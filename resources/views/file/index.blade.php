@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
 <div class="container">
                <div class="row u-mb-large">
                    <div class="col-md-12">
                        <div class="c-table-responsive@wide">
                            <table class="c-table">
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
                                        <th class="c-table__cell c-table__cell--head">No.</th>
                                        <th class="c-table__cell c-table__cell--head">File Name</th>
                                        <th class="c-table__cell c-table__cell--head">Action</th>
                                        
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">1</span></td>
                                        <td class="c-table__cell">Design Works</td>
                                        
                                        
                                        <td class="c-table__cell">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                
                                                <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item" href="{{ route('edit-file')}}">Edit</a>
                                                    <a class="c-dropdown__item dropdown-item" href="{{ route('download-file')}}">Download</a>
                                                    <a class="c-dropdown__item dropdown-item" href="{{ route('delete-file')}}">Delete</a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">2</span></td>
                                        <td class="c-table__cell">Design Works</td>
                                        
                                        
                                        <td class="c-table__cell">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                
                                                <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item" href="#">Edit</a>
                                                    <a class="c-dropdown__item dropdown-item" href="#">Delete</a>
                                                    <a class="c-dropdown__item dropdown-item" href="#">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">3</span></td>
                                        <td class="c-table__cell">Design Works</td>
                                        
                                        
                                        <td class="c-table__cell">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                
                                                <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item" href="#">Edit</a>
                                                    <a class="c-dropdown__item dropdown-item" href="#">Delete</a>
                                                    <a class="c-dropdown__item dropdown-item" href="#">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    
                                    
                                    <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">4</span></td>
                                        <td class="c-table__cell">Design Works</td>
                                       
                                        
                                        <td class="c-table__cell">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                
                                                <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item" href="#">Edit</a>
                                                    <a class="c-dropdown__item dropdown-item" href="#">Delete</a>
                                                    <a class="c-dropdown__item dropdown-item" href="#">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    

                               
                                </tbody>
                            </table>
                        </div><!-- // .c-card -->
                    </div>
                </div><!-- // .row -->
            </div>
@endsection
