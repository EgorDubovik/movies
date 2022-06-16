@extends('layout.main')

@section('content')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">View Profile</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="row">
            @if($errors->any())
                @include("layout/error-message")
            @endif
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Company Logo</div>
                    </div>
                    <div class="card-body">
                        <div class="text-center chat-image mb-5">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <a class="" href="profile.html"><img alt="avatar" src="{{ URL::asset('assets/images/users/7.jpg')}}" class="brround"></a>
                            </div>
                            <div class="main-chat-msg-name">
                                <a href="profile.html">
                                    <h5 class="mb-1 text-dark fw-semibold">{{Auth::user()->company_name}}</h5>
                                </a>
                                <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{(Auth::user()->is_mover) ? "Mover" : ""}} {{(Auth::user()->is_driver) ? "Driver" : ""}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Reviews </div>
                    </div>
                    <div class="card-body">
                        <div style="color: #9d9d9d;" class="mb-2">
                            <div class="jq-star" style="width:20px;  height:20px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-705{fill:url(#705_SVGID_1_);}.svg-hovered-705{fill:url(#705_SVGID_2_);}.svg-active-705{fill:url(#705_SVGID_3_);}.svg-rated-705{fill:#f1c40f;}</style><linearGradient id="705_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:lightgray"></stop><stop offset="1" style="stop-color:lightgray"></stop> </linearGradient><linearGradient id="705_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#f1c40f"></stop><stop offset="1" style="stop-color:#f1c40f"></stop> </linearGradient><linearGradient id="705_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FEF7CD"></stop><stop offset="1" style="stop-color:#FF9511"></stop> </linearGradient><path data-side="center" class="svg-empty-705" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-705" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-705" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div>
                            {{$user->rating->avg('star')}}
                            <span style="margin-left: 20px;">{{$user->rating->count()}} Reviews</span>
                        </div>
                        <table class="table text-nowrap text-md-nowrap mb-0">
                            @foreach($user->rating as $review)
                                <tr>
                                    <td><a href="/profile/view/{{$review->sender->id}}">{{$review->sender->company_name}}</a></td>
                                    <td>{{\Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td>{{$review->star}}</td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card panel-theme">
                    <div class="card-header">
                        <div class="float-start">
                            <h3 class="card-title">Contact information</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="list-group no-margin">
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-mail"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-globe"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{$user->website}}</a>
                            </li>
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-phone"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{$user->phone}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <span>{{$user->orders->count()}} orders</span>

                        </div>
                        view new orders if it is mover company
                    </div>
                    <div class="card-footer text-end">

                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>

@stop
