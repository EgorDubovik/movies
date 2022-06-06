
@if($order->user_id == Auth::user()->id)

    @if($order->status == \App\Models\Order::IS_NEW)
        @if($order->applications->isNotEmpty())
            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Date appl.</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($order->applications as $application)
                    <tr>
                        <td>{{$application->id}}</td>
                        <td><a href="/user/{{$application->user->id}}">{{$application->user->company_name}}</a></td>
                        <td>{{$application->created_at}}</td>
                        <td><a class="btn btn-success" href="/order/application/confirm/{{$application->id}}"> confirm</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            List is empty
        @endif
    @else
        You choose company for this job
        {{$order->confirmed_application->user->company_name}}
    @endif
@else
    @can('send-application',$order)
        <a href="/order/application/send/{{$order->id}}" class="btn btn-success">Submit your application</a>
    @endcan
    @if($order->applications->contains('user_id',Auth::user()->id))


        @if($order->confirmed_application)
            @if($order->confirmed_application->user_id == Auth::user()->id)
                They choose you. This is yours DEAl
            @else
                Unfortunately they hired another company
            @endif
        @else
            <div style="text-align: center; font-weight: bold;font-size: 18px;color: #7c7c7c">
                <i class="fa fa-check-square-o" style="font-size: 25px;color: #4cc04c;margin-right: 10px"></i> You already send application for this order
            </div>

            <div style="text-align: right">
                <form action="/order/application/destroy/{{$order->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</button>
                </form>
            </div>
        @endif
    @endif
@endif
