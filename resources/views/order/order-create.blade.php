@extends('layout.main')

@section('content')

<div class="main-container container-fluid">
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">New Order</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- CONTENT -->
    <div class="row">
        <div class="col-md-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Details</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Address from</label>
                                    <input type="text" class="form-control" id="address_from" placeholder="Address from" name="address_from">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">ZIP from</label>
                                    <input type="text" class="form-control" placeholder="ZIP from" name="zip_from">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Address to</label>
                                    <input type="text" class="form-control" id="name2" placeholder="Address to" name="address_to">
                                </div>
                                <label class="form-label">ZIP to</label>
                                <input type="text" class="form-control" placeholder="ZIP to" name="zip_to">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Valume cb. ft.</label>
                                    <input type="text" class="form-control" placeholder="Valume cb. ft." name="valume">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Price per cb. ft.</label>
                                    <input type="text" class="form-control" placeholder="Price per cb. ft." name="price">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Date send</label>
                                    <input type="date" class="form-control" placeholder="Date send" name="date_send">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Date receive</label>
                                    <input type="date" class="form-control" placeholder="Date receive" name="date_receive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                        </div>
                        <div class="form-footer mt-2">
                            <button type="send" class="btn btn-primary">Confirm  Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
