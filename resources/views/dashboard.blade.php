@extends('layout.main')

@section('content')

<div class="main-container container-fluid">
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Create new order</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Jobs</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- CONTENT -->
    <div class="row">
        <div class=''><a href="/order/create">Add new order</a> </div>
        @include('order.order-view')
    </div>

</div>

@stop
