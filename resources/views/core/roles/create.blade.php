@extends('layouts.master',['activeSideNav' => active_side_nav()])
@section('title', $title)
@section('content')
    <div class="container my-5">
        {{ Form::open(['route'=>['roles.store'], 'method'=>'POST' ,'class'=>'roles-form clearfix', 'id' => 'roleForm']) }}
        @include('core.roles._form',['buttonText'=>__('Create')])
        {{ Form::close() }}
    </div>
@endsection

@section('script')
    @include('core.roles._script')
    @if(language(App()->getLocale())['direction']==PAGE_DIRECTION_RIGHT_TO_LEFT)
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-fa.js') }}"></script>
    @else
        <script src="{{ asset('plugins/cvalidator/cvalidator-language-en.js') }}"></script>
    @endif
    <script src="{{ asset('plugins/cvalidator/cvalidator.js') }}"></script>
    <script>
        "use strict";

        $(document).ready(function () {
            var form =$('#roleForm').cValidate({
                rules : {
                    'name' : 'required|max:255',
                },
            });
        });
    </script>
@endsection
