@extends('layout.main')

@section('content')

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Orders</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- CONTENT -->
        <div class="row">

            <div class="col-md-12  col-xl-6">
                <div class="row">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">USA Map</h3></div>
                        <div class="card-body">
                            <div id="vmap9" class="stateh h-300"></div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Actions</h3></div>
                        <div class="card-body">
                            @if(!Auth::check())
                                <div style="text-align: center">
                                    If you whant this order, you need:<br/><br/>
                                    <a href="/auth/login">Login</a>
                                    <br/>or<br/>
                                    <a href="auth/register">Registration</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12  col-xl-6" id="orders-line">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Addres from:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$order->address_from}}, {{$order->zip_from}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Addres to:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$order->address_to}}, {{$order->zip_to}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Volume :</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$order->volume}}  cb. ft.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Price :</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">${{$order->price}} per cb. ft.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Created by:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><a href="/company/{{$order->company->company_id}}"> {{$order->company->company_name}}</a></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Deliver to:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{($order->date_receive) ? $order->date_receive : "No date"}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@stop

@section('scripts')
    <!-- INTERNAL Vector js -->
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jvectormap.js')}}"></script>

@stop
