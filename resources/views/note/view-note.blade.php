@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
 <div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">View Note</h6>
                    </div>
                </div>
               
                    <div class="c-stage__panel u-p-medium">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Note Title</label> 
                                    <input class="c-input" name="noteTitle" id="noteTitle" placeholder="Enter Note Title" value="{{ $note['0']['note_titile'] }}" type="text" disabled>
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteDescription">Note Description</label> 
                                    <textarea name="noteDescription" disabled>{{ $note['0']['note_description'] }}</textarea>
                                    
                                </div>
                            </div>
                        </div>
                   
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
