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
                            <th>Company Name</th>
                            <th>Added</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->favorite as $favorite)
                                <tr>
                                    <td><a style="font-size: 18px;" href="/profile/view/{{$favorite->company->id}}">{{$favorite->company->company_name}}</a></td>
                                    <td>{{\Carbon\Carbon::parse($favorite->created_at)->diffForHumans()}}</td>
                                    <td>
                                        @include('favorite.remove-button',['id'=>$favorite->company_id,'text'=>'remove'])

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>

                            <th>Company Name</th>
                            <th>Added</th>
                            <th>Action</th>
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

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            console.log('load');
            $('#example').DataTable();
        });
    </script>
@stop


