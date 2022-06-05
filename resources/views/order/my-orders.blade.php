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
                <div class='' style="padding-bottom: 20px;">
                    @can('create', \App\Models\Order::class)
                        <a class="btn btn-primary" href="/order/create"><i class="fa fa-plus"></i> Add new order</a>
                    @endcan
                    <a class="btn btn-primary" href="/order/create"><i class="fa fa-plus"></i> Add new order</a>

                </div>
                @include('order.order-view')
            </div>

        </div>
    </div>
@stop
