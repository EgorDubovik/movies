@extends('layout.main')

@section('content')

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">My applications</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        List my applications
                    </div>
                    <div class="card-body">
                        <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date appl.</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($applications as $application)
                                <tr>
                                    <td>{{$application->id}}</td>
                                    <td>{{\Carbon\Carbon::parse($application->created_at)->diffForHumans()}}</td>
                                    <td><a href="/order/{{$application->order->id}}">Order #{{$application->order->id}}</a> </td>
                                    <td>{{\App\Models\Application::STATUS[$application->status]}}</td>
                                    <td><a href="/order/{{$application->order->id}}" class="btn-success btn"><i class="fa fa-eye"></i> view</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
