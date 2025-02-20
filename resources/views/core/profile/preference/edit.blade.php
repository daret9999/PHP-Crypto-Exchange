@extends('layouts.master',['hideBreadcrumb'=>true,'activeSideNav' => active_side_nav(),'topLess' => true])
@section('title', $title)
@section('content')
    @include('layouts.dashboard.title')
    @component('components.profile', ['user' => $user])
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__($title)}}</h4>
                </div>
                <div class="card-body">
                    {{ Form::model($user->preference, ['route'=>['preference.update'],'class'=>'form-horizontal change-preference-form col-xl-8','method'=>'put', 'id' => 'preferenceForm']) }}
                    {{--default language--}}
                    <div class="form-group row">
                        <label for="default_language"
                               class="col-md-4 control-label">{{ __('Default Language') }}</label>
                        <div class="col-md-8">
                            {{ Form::select('default_language',$languages, null, ['class'=> form_validation($errors, 'default_language'), 'id' => 'default_language']) }}
                            <span class="invalid-feedback"
                                  data-name="default_language">{{ $errors->first('default_language') }}</span>
                        </div>
                    </div>

                    {{--Default Exchange--}}
                    <div class="form-group row">
                        <label for="default_coin_pair"
                               class="col-md-4 control-label">{{ __('Default Exchange') }}</label>
                        <div class="col-md-8">
                            {{ Form::select('default_coin_pair', $coinPairs,  null, ['class'=> form_validation($errors, 'default_coin_pair'), 'id' => 'default_coin_pair']) }}
                            <span class="invalid-feedback"
                                  data-name="default_coin_pair">{{ $errors->first('default_coin_pair') }}</span>
                        </div>
                    </div>

                    {{--submit button--}}
                    <div class="form-group">
                        {{ Form::submit(__('Update'),['class'=>'btn btn-info lf-card-btn form-submission-button']) }}
                        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-danger lf-card-btn reset-button']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @endcomponent
@endsection
@section('style')
    @include('layouts.includes._avatar_and_loader_style')
@endsection

@section('script')
    @if(language(App()->getLocale())['direction']==PAGE_DIRECTION_RIGHT_TO_LEFT)
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-fa.js') }}"></script>
    @else
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-en.js') }}"></script>
    @endif
    <script src="{{ asset('plugins/cvalidator/cvalidator.js') }}"></script>
    <script>
        "use strict";

        $(document).ready(function () {
            var form = $('#preferenceForm').cValidate({
                rules: {
                    'default_language': 'required',
                    'default_coin_pair': 'required',
                },
            });
        });
    </script>
@endsection
