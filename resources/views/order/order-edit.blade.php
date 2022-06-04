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
                        <form method="post" action="/order/{{$order->id}}">
                            @method('PUT')
                            @csrf
                            @if($errors->any())
                                @include("layout/error-message")
                            @endif
                            @if(session()->has('successful'))
                                <div class="alert alert-success">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"></path><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"></path></svg></span>
                                    <strong>Success Message</strong>
                                    <hr class="message-inner-separator">
                                    <p>{{session()->get('successful')}}</p>
                                </div>

                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Address from <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="address_from" placeholder="Address from" name="address_from" value="{{$order->address_from}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">ZIP from <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="ZIP from" name="zip_from" value="{{$order->zip_from}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Address to <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="name2" placeholder="Address to" name="address_to" value="{{$order->address_to}}">
                                    </div>
                                    <label class="form-label">ZIP to <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="ZIP to" name="zip_to" value="{{$order->zip_to}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Volume cb. ft. <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Volume cb. ft." name="volume" value="{{$order->volume}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Price per cb. ft. <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Price per cb. ft." name="price" value="{{$order->price}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Date send</label>
                                        <input type="date" class="form-control" placeholder="Date send" name="date_send" value="{{$order->date_send}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Date receive</label>
                                        <input type="date" class="form-control" placeholder="Date receive" name="date_receive" value="{{$order->date_receive}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating floating-label1">
                                    <textarea class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px" name="description">{{$order->description}}</textarea>
                                    <label for="floatingTextarea2">Description</label>
                                </div>
                            </div>
                            <div class="form-footer mt-2">
                                <button type="send" class="btn btn-success">Confirm  Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
