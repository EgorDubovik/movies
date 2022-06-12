@extends('layout.main')

@section('content')

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Deal between "<a href="#">{{$deal->mover->company_name}}</a>" and "<a
                    href="#">{{$deal->driver->company_name}}</a>"</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Deal
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-2" style="font-size: 18px;">
                    <div class="row">
                        <div class="col-md-6">
                            <span style="color: #a2a2a2">Status:</span>
                            <span>{{\App\Models\Deal::STATUS[$deal->status]}}</span>
                        </div>
                        <div class="col-md-6">
                            @can('change-deal-status-driver',$deal)
                                @if($deal->status < \App\Models\Deal::IN_PROGRESS)
                                    <a href="/deal/{{$deal->id}}/update/status/driver/{{\App\Models\Deal::IN_PROGRESS}}"
                                       class="btn btn-success ml-5">I am ready to go</a>
                                @endif
                                <a href="/deal/{{$deal->id}}/update/status/driver/{{\App\Models\Deal::DELIVERED}}"
                                   class="btn btn-success ml-5">Delivered</a>
                                @if($deal->status < \App\Models\Deal::DELIVERED)
                                    <a href="/deal/{{$deal->id}}/update/status/driver/{{\App\Models\Deal::CANCEL}}" class="btn btn-danger ml-5">Cancel it</a>
                                @endif
                            @endcan
                            @if(Gate::check('change-deal-status-mover',$deal))
                                @if($deal->status < \App\Models\Deal::DONE)
                                    <a href="/deal/{{$deal->id}}/update/status/mover/{{\App\Models\Deal::DONE}}" class="btn btn-success ml-5">Done</a>
                                @elseif($deal->status == \App\Models\Deal::CANCEL)
                                        <span style="font-size: 12px;">Driver cancel the deal. You can close this deal and run your order again</span>
                                        <a href="/deal/{{$deal->id}}/close" class="btn btn-success">Yes, do it</a>
                                @endif
                            @else
                                @if(Auth::user()->is_mover && Auth::user()->id == $deal->mover_id)
                                    <button href="#" class="btn btn-success disable ml-5">Done</button> <span
                                        style="font-size: 12px;">You can change status only when driver change the status to "Delivered"</span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- CONTENT -->
        <div class="row">
            <div class="col-md-12  col-xl-6">
                <div class="card">
                    @if(Auth::user()->id == $deal->mover_id)
                        @if(Gate::check('send-rating',$deal->driver_id))
                            <div class="card-header">
                                <div> <span style="color:#868e96">Leave review about </span><strong>{{$deal->driver->company_name}}</strong></div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="/send/rating/{{$deal->driver_id}}">
                                    @csrf
                                    <div class="rating-stars block" id="company_rating" data-stars="5">
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="form-floating floating-label">
                                            <textarea class="form-control" placeholder="review" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Reviews</label>
                                        </div>
                                    </div>
                                    <div class="row"><button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button></div>
                                </form>
                            </div>
                        @else
                            <div class="card-header">
                                <h4>Update customer information</h4>
                            </div>
                            <div class="card-body">

                                <form class="format-horizontal" method="post" action="/deal/{{$deal->id}}/update/customer">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Customer phone number:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="customer_phone" value="{{$deal->customer_phone}}"
                                                   class="form-control" id="inputName" placeholder="Customer phone number">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Customer first and last
                                            Name:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="customer_fio" value="{{$deal->customer_fio}}"
                                                   class="form-control" id="inputName"
                                                   placeholder="Customer first and last Name:">
                                        </div>
                                    </div>
                                    <div class="mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-9">
                                            <button class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="card-header">
                            <h4>Customer information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">Customer phone</div>
                                <div class="col-md-8">{{$deal->customer_phone}}</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">Customer First and Last Name</div>
                                <div class="col-md-8">{{$deal->customer_fio}}</div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-md-12  col-xl-6" id="orders-line">
                <div class="card">
                    @if(Auth::user()->id == $deal->driver_id)
                        @if(Gate::check('send-rating', $deal->mover_id))
                            <div class="card-header">
                                <div> <span style="color:#868e96">Leave review about </span><strong>{{$deal->mover->company_name}}</strong></div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="/rating/send/{{$deal->mover_id}}">
                                    @csrf
                                    <div class="rating-stars block" id="company_rating" data-stars="5">
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="form-floating floating-label">
                                            <textarea name="comment" class="form-control" placeholder="review" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Reviews</label>
                                        </div>
                                    </div>
                                <div class="row"><button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button></div>
                                </form>
                            </div>
                        @else
                            <div class="card-header">
                                <h4>Update your information</h4>
                            </div>
                            <div class="card-body">
                                <form class="format-horizontal" method="post" action="/deal/{{$deal->id}}/update/driver">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Driver phone number:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="driver_phone" value="{{$deal->driver_phone}}"
                                                   class="form-control" id="inputName" placeholder="Driver phone number">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Customer first and last
                                            Name:</label>
                                        <div class="col-md-9">
                                            <input type="text" name="driver_fio" value="{{$deal->driver_fio}}"
                                                   class="form-control" id="inputName"
                                                   placeholder="Driver first and last Name:">
                                        </div>
                                    </div>
                                    <div class="mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-9">
                                            <button class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="card-header">
                            <h4>Driver information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">Driver phone</div>
                                <div class="col-md-8">{{$deal->driver_phone}}</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">driver First and Last Name</div>
                                <div class="col-md-8">{{$deal->driver_fio}}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <di class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="vmap9" class="stateh h-300"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Addres from:</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$deal->order->address_from}}
                                                , {{$deal->order->zip_from}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Addres to:</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$deal->order->address_to}}
                                                , {{$deal->order->zip_to}}</p>
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
                                                    <p class="text-muted mb-0">{{$deal->order->volume}} cb. ft.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Price :</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">${{$deal->order->price}} per cb. ft.</p>
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
                                            <p class="text-muted mb-0"><a
                                                    href="/profile/{{$deal->order->company->id}}"> {{$deal->order->company->company_name}}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Deliver to:</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{($deal->order->date_receive) ? $deal->order->date_receive : "No date"}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </di>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <!-- INTERNAL Vector js -->
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jvectormap.js')}}"></script>

    <!-- Rating -->
    <script src="{{ URL::asset('assets/plugins/rating/jquery-rate-picker.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/rating/rating-picker.js')}}"></script>
@stop
