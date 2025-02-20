@extends('layouts.master',['hideBreadcrumb'=>true,'activeSideNav' => active_side_nav(),'topLess' => true])
@section('title', $title)
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$title}}</h4>
                            @if(isset($isRoute) && has_permission($route))
                                <a class="btn btn-info {{isset($extraClass)?$extraClass:''}}"
                                   href="{{ route($route) }}">{{ __($routeName) }}</a>
                            @endif
                        </div>
                        <div class="card-body">
                            {{ $dataTable['filters'] }}
                            {{ $dataTable['advanceFilters'] }}
                            @component('components.table',['class'=> 'lf-data-table'])
                                @slot('thead')
                                    <tr>
                                        <th class="min-desktop">{{ __('First Name') }}</th>
                                        <th class="min-desktop">{{ __('Last Name') }}</th>
                                        <th class="min-desktop">{{ __('Registration Date') }}</th>
                                        <th class="text-right all no-sort">{{ __('Action') }}</th>
                                    </tr>
                                @endslot

                                @foreach($dataTable['items'] as $referralUser)
                                    <tr>
                                        <td>{{ $referralUser->profile->first_name }}</td>
                                        <td>{{ $referralUser->profile->last_name }}</td>
                                        <td>{{ $referralUser->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('referral.users.earnings', $referralUser->id) }}">{{ __("View Earning") }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endcomponent
                            {{ $dataTable['pagination'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    @include('layouts.includes.list-css')
@endsection

@section('script')
    @include('layouts.includes.list-js')
@endsection
