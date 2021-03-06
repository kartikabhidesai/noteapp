@extends('layouts.app')
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
                        <h6 class="u-mb-zero">Edit Spread Sheet</h6>
                    </div>
                </div>
               
                    <div class="c-stage__panel u-p-medium">
                        <input type="hidden" id="id" value="{{ $sheetdata[0]['id'] }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Sheet Title</label> 
                                    <input class="c-input" name="noteTitle" id="noteTitle" placeholder="Enter Sheet Title" type="text" value="{{ $sheetdata[0]['title'] }}" disabled>
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        
                        
                       
                        
                        <div class="row" >
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteDescription">Spread Sheet</label> 
                                    <div id="my" ></div>
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
<script>
    var data=<?php print_r($sheetdata[0]["data"]); ?>;
</script>
@endsection
