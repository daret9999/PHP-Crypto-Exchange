@extends('layouts.master',['headerLess'=>true, 'activeSideNav' => active_side_nav()])
@section('title', __('Financial Suspension'))
@section('content')
    @component('components.box')
        <div class="mx-lg-4">
            <h2 class="text-center text-danger font-size-48">{{ __('Financially Suspended!')  }}</h2>
            <p class="text-center pb-3">{{ __('Please contact administrator to get back your financial access.') }}</p>
            @guest
                <a href="{{ route('home') }}" class="btn btn-success btn-block">{{ __('Go Home') }}</a>
            @endguest
            @auth
                <a href="{{ route('profile.index') }}" class="btn btn-success btn-block">{{ __('Go Profile') }}</a>
            @endauth
        </div>
    @endcomponent
@endsection
