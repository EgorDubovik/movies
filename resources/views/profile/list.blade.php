@extends('layout.main')

@section('content')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">List Profile</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profiles</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Orders</th>
                            <th>Start date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="text-align: center"><img src="{{ URL::asset('assets/images/users/21.jpg')}}" alt="profile-user" class="avatar-lg  profile-user brround cover-image"></td>
                                    <td class="align-middle"><a style="font-size: 18px;" href="/profile/view/{{$user->id}}">{{$user->company_name}}</a></td>
                                    <td class="align-middle">
                                        <div class="row">

                                                <div class="rating-stars block my-rating-7"  data-rating="{{$user->rating->avg('star')}}">
                                                </div> {{$user->rating->avg('star')}}

                                        </div>

                                    </td>
                                    <td class="align-middle">{{$user->orders->count()}}</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Orders</th>
                            <th>Start date</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        <!-- ROW-1 CLOSED -->
    </div>

@stop

@section('scripts')
    <!-- Rating -->
    <script src="{{ URL::asset('assets/plugins/ratings-2/jquery.star-rating.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/ratings-2/star-rating.js')}}"></script>


    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            console.log('load');
            $('#example').DataTable();
        });
    </script>
@stop

