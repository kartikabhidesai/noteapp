@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-pencil-square-o"></i>
                    </div>
                    
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Edit File</h6>
                    </div>
                    
                </div>
                    <div class="c-stage__panel u-p-medium">       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">File Title</label> 
                                    <input class="c-input" name="noteTitle" id="noteTitle" placeholder="Enter Note Title" type="text">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="/file-upload" class="dropzone" id="custom-dropzone" style="height: 180px;">
                                    <div class="dz-message" data-dz-message>
                                        <i class="dz-icon fa fa-cloud-upload"></i>
                                        <span>Drag a file here or browse for a file to upload.</span>
                                    </div>

                                    <div class="fallback">
                                        <input name="file" type="file" multiple>
                                    </div>
                                </form>
                            </div>
                         </div><br>
                         
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Add Note" type="submit">
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
