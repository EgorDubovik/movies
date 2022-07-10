@extends('layout.main')

@section('content')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">View Profile</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="row">
            @if($errors->any())
                @include("layout/error-message")
            @endif
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Company Logo</div>
                    </div>
                    <div class="card-body">
                        <div class="text-center chat-image mb-5">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <a class="" href="#"><img alt="avatar" src="{{ URL::asset('assets/images/users/7.jpg')}}" class="brround"></a>
                            </div>
                            <div class="main-chat-msg-name">
                                <a href="#">
                                    <h5 class="mb-1 text-dark fw-semibold">{{$user->company_name}}</h5>
                                </a>
                                <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{($user->is_mover) ? "Mover" : ""}} {{($user->is_driver) ? "Driver" : ""}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h3 class="card-title">Favorite</h3></div>
                    <div class="card-body">
                        @if(Gate::check('add-to-favorite', $user))
                            <div class="text-center">
                                <a href="/favorite/add/{{$user->id}}" class="btn-success btn"><i class="fa fa-plus"></i> add to favorite</a>
                            </div>
                        @else
                            <div class="text-center">
                                <p>In your favorite list</p>
                                @include('favorite.remove-button',['id'=>$user->id,'text'=>'remove from favorite'])
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card panel-theme">
                    <div class="card-header">
                        <div class="float-start">
                            <h3 class="card-title">Contact information</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="list-group no-margin">
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-mail"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-globe"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{$user->website}}</a>
                            </li>
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-phone"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{$user->phone}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Reviews </div>
                    </div>
                    <div class="card-body">
                        @can('send-rating', $user->id)
                            <button type="button" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#input-modal" >You can leave review</button>
                        @endcan
                        <div style="color: #9d9d9d;" class="mb-2">
                            <span class="rating-stars my-rating-8" data-rating="{{$user->rating->avg('star')}}"></span>
                            <span style="margin-left: 10px; font-weight: bold">{{$user->rating->avg('star')}}</span>
                            <span style="margin-left: 20px;">{{$user->rating->count()}} Reviews</span>
                        </div>
                        <table class="table text-nowrap text-md-nowrap mb-0">
                            @foreach($user->rating as $review)
                                <tr>
                                    <td><a href="/profile/view/{{$review->sender->id}}">{{$review->sender->company_name}}</a></td>
                                    <td>{{\Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td>{{$review->star}}</td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <span>{{$orders->count()}} orders</span>

                        </div>
                        @include('order.order-view',['status'=>'all'])
                    </div>
                    <div class="card-footer text-end">

                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
@include('modals.send-review',['receiver_id' => $user->id])
@stop

@section('scripts')
    <!-- Rating -->
    <script src="{{ URL::asset('assets/plugins/rating/jquery-rate-picker.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/rating/rating-picker.js')}}"></script>

    <script src="{{ URL::asset('assets/plugins/ratings-2/jquery.star-rating.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/ratings-2/star-rating.js')}}"></script>
@stop
