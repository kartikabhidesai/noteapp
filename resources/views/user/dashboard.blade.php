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
        <div class="col-6">
            <article class="c-stage">
                <div class="c-stage__panel u-p-medium">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="c-card__title">Aktueller Status</h5>
                            
                        </div>
                        
                        <div class="col-6 c-field u-mb-small left">
                            <div class="pull-right" >
                                <input class="c-btn c-btn--info " value="Add Plan" type="submit">
                            </div> 
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="note">Note</label> 
                                <textarea rows="2"  class="c-input" cols="50" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
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
