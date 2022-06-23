@extends('layout.main')

@section('content')

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">My Deals</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Deals</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- CONTENT -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        List my Deals
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
                            @forelse($deals as $deal)
                                <tr >
                                    <td class="align-middle">{{$deal->id}}</td>
                                    <td class="align-middle">{{\Carbon\Carbon::parse($deal->created_at)->diffForHumans()}}</td>
                                    <td class="align-middle"><a href="/order/{{$deal->order->id}}">Order #{{$deal->order->id}}</a> </td>
                                    <td class="align-middle">{{\App\Models\Deal::STATUS[$deal->status]}}</td>
                                    <td class="align-middle"><a href="/deal/{{$deal->id}}" class="btn btn-success"><i class="fa fa-eye"></i> view</a> </td>
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
