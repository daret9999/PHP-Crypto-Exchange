@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 col-sm-12">
                <div class="card-body lf-bg-grey-light">
                    {{ Form::open(['route' => 'admin.pages.store', 'id' => 'pageForm']) }}
                    @include('core.pages.admin._form', ['buttonText'=> __('Create')])
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('plugins/cvalidator/cvalidator.js') }}"></script>
    @if(language(App()->getLocale())['direction']==PAGE_DIRECTION_RIGHT_TO_LEFT)
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-fa.js') }}"></script>
    @else
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-en.js') }}"></script>
    @endif

    <script>
        (function ($) {
            'use strict';

            $('#pageForm').cValidate({
                rules: {
                    title: 'required|escapeInput',
                    slug: 'required|escapeInput'
                }
            });

            $('input[name="title"]').on('input', function () {
                let title = $(this).val().trim().toLowerCase().replace(/ +/g, '-');
                $('input[name="slug"]').val(title);
            });
        })(jQuery);
    </script>
@endsection
