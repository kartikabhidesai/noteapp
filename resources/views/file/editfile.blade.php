@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <form action="{{ route('edit-file',$filedetails[0]['id']) }}" method="post" enctype="multipart/form-data" id="editfile" >
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
                                    <input class="c-input" name="filetitle" id="filetitle" placeholder="Enter Note Title" value="{{ $filedetails[0]['file_title']}}" type="text">
                                    <input class="c-input" name="fileid" id="fileid"  value="{{ $filedetails[0]['id']}}" type="hidden">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                    <label class="c-field__label" for="noteTitle">Upload File</label> 
                                    <input name="fileupload" id="fileupload" type="file" >
                                </div>
                         </div><br>
                         
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Edit File" type="submit">
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
</style>

@endsection
