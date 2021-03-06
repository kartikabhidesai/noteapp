@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-md-6">
            <div class="c-card c-card--responsive u-mb-medium">
                <table class="c-table u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero" >
                            <td class="c-table__cell">Design Works</td>
                            <td class="c-table__cell u-text-right " style="color:green">
                                <h4 class="c-graph-card__number">5</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <article class="c-stage">
                <form name="addnote" id="addnote" action="{{ route('add-note') }}" method="post">
                    <div class="c-stage__panel u-p-medium">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteTitle">Note Title</label> 
                                    <input class="c-input" name="noteTitle" id="noteTitle" placeholder="Enter Note Title" type="text">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        
                        
                       
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="noteDescription">Note Description</label> 
                                    <textarea class="c-input" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-md-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Add Note" type="submit">
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
    .has-error .select2,.has-error .select2-selection{
        color: red !important;
        border-color: red !important;
    }
</style>
@endsection
