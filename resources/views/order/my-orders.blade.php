@extends('layout.main')

@section('content')

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">My orders</h1>
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

            <div class="col-md-12  col-xl-6 m-auto">
                <div class='' style="padding-bottom: 20px;">
                    @can('create', \App\Models\Order::class)
                        <a class="btn btn-success" href="/order/create"><i class="fa fa-plus"></i> Add new order</a>
                    @endcan


                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="panel panel-primary">
                            <div class="tab-menu-heading tab-menu-heading-boxed">
                                <div class="tabs-menu-boxed">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#tab25" class="active" data-bs-toggle="tab">All</a></li>
                                        <li><a href="#tab26" data-bs-toggle="tab">New</a></li>
                                        <li><a href="#tab27" data-bs-toggle="tab">Pending</a></li>
                                        <li><a href="#tab28" data-bs-toggle="tab">Done</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab25">
                                        @include('order.order-view',['status'=>'all'])
                                    </div>
                                    <div class="tab-pane" id="tab26">
                                        @include('order.order-view', ['status'=>0])
                                    </div>
                                    <div class="tab-pane" id="tab27">
                                        @include('order.order-view', ['status'=>1])
                                    </div>
                                    <div class="tab-pane" id="tab28">
                                        @include('order.order-view', ['status'=>2])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
