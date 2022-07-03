@extends('layout.main')

@section('content')

    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app ">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Notifications List</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Notifications List</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <!-- Container -->
                <div class="container">
                    <ul class="notification">
                        @foreach($notifications as $notification)
                        <li>
                            <div class="notification-time">
                                <span class="time">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="time">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md online">
                                        <img alt="avatar" class="br-7" src="../assets/images/users/1.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="fs-15 text-dark fw-bold mb-0">
                                                {{App\Models\User::find($notification->data['sender_id'])->company_name}}
                                                @if(is_null($notification->read_at))
                                                    <span class="badge bg-success ms-3 px-2 pb-1 mb-1">New notification</span>
                                                @endif
                                            </p>
                                            <p class="mb-0 fs-13 text-dark"><a href="/notifications/read/{{$notification->id}}">{{$notification->data['subject']}}</a> </p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted fs-11">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <div class="text-center mb-4">
                        <button class="btn ripple btn-primary w-md">Load more</button>
                    </div>
                </div>
                <!-- End Container -->
                <!-- /Row -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->

@stop

@section('scripts')

@stop
