@extends('layout.main')

@section('content')

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Deal between "company name" and "company name"</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Deal
                    </li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- CONTENT -->
        <div class="row">

            <div class="col-md-12  col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer information</h4>
                    </div>
                    <div class="card-body">
                        Infromation about cutomer
                    </div>
                </div>
            </div>

            <div class="col-md-12  col-xl-6" id="orders-line">
                <div class="card">
                    <div class="card-header">
                        <h4>Driver information</h4>
                    </div>
                    <div class="card-body">
                        Infromation about driver
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
