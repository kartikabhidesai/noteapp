@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row" >
        <div class="col-12" >
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-edit"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Edit Draw Image</h6>
                    </div>
                </div>
                <div class="c-stage__panel u-p-medium">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="noteTitle">Draw Title</label> 
                                <input class="c-input" name="noteTitle" id="noteTitle" placeholder="Enter Note Title" value="{{ $fileEDit[0]['draw_name']}}" type="text">
                                <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <input class="c-input" type="hidden" name="imageName" id="imageName" value="{{ $fileEDit[0]['filename']}}">
                                <input class="c-input" type="hidden" name="imageName" id="imageId" value="{{ $fileEDit[0]['id']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="width: 100%;height: 100%;">
                        <div class="col-lg-12" style="width: 100%;height: auto;">
                            <button class="c-btn c-btn--info" onclick="p.show()"> Start Draw</button>
                            <div id="wrapper">
                                <div id="conatinerqwe"></div>
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
<style>
    #wrapper {
        height:100%;
        margin:0;
        padding:0;
        background-color: lightgray;
    }
    .c-stage{
        height: 100%;
    }
    #conatinerqwe {
        position: absolute;
        top: 50px;
        bottom: 50px;
        left: 20px;
        right: 20px;
    }

    @media (min-width:1200px){
        .u-p-medium{
            height:600px;
        }
    }
    @media (min-width:992px){
        .u-p-medium{
            height:600px;
        }
    }
    @media (min-width:768px){
        .u-p-medium{
            height:600px;
        }
    }
    @media (min-width:576px){
        .u-p-medium{
            height:600px;
        }
    }
</style>
@endsection
