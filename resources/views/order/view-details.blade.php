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
            @include('layout/success-message',['status'=>'successful'])
            <div class="col-md-12  col-xl-6">
                <div class="row">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">USA Map</h3></div>
                        <div class="card-body">
                            <div id="vmap9" class="stateh h-300"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Application</h3></div>
                        <div class="card-body">
                            @include('layout/success-message',['status'=>'application-successful'])
                            @if(!Auth::check())
                                <div style="text-align: center">
                                    If you whant this order, you need:<br/><br/>
                                    <a href="/auth/login">Login</a>
                                    <br/>or<br/>
                                    <a href="auth/register">Registration</a>
                                </div>
                            @else
                                @include('order.application')
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
                        <div class="row" style="padding-top: 20px; text-align: right">
                            <div class="btn-list">
                                @can('delete', $order)
                                <form method="post" action="/order/destroy/{{$order->id}}" onsubmit="confirm_on_delete(this);return false;">
                                    @csrf
                                    @method('delete')
                                    <a href="/order/edit/{{$order->id}}/edit" class="btn btn-warning" style="margin-right: 20px">Update</a>
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @can('delete', $order)
    <script>
        function confirm_on_delete(form){
            swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this order file!",
                    type: "warning",

                    confirmButtonText: "Yes, delete it!",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6e7d88',
                },
                function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
        }
    </script>
    @endcan
@stop

@section('scripts')
    <!-- INTERNAL Vector js -->
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jvectormap.js')}}"></script>

    <!-- SWEET-ALERT JS -->
    <script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/sweet-alert.js')}}"></script>

@stop
