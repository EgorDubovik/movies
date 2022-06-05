@foreach($orders as $order)
    @if($status == 'all' || $order->status == $status)
    <div class="card">
        <?php $classes = ['green', 'blue', 'red']; ?>
        <div class="card-status bg-{{$classes[$order->status]}} br-te-7 br-ts-7" style=""></div>
        <div class="card-body">
            <div class="row">Order # {{$order->id}}</div>
            <div class="row">
                <div class="created-card">Status: {{App\Models\Order::STATUS[$order->status]}}</div>
                <div class="col-lg-2 col-md-12">
                    <div>
                        <strong style="font-size: 18px">{{$order->volume}}</strong> cb.ft.
                    </div>
                    <div>
                        <strong style="font-size: 18px">${{$order->price}}</strong> per. cb
                    </div>
                </div>
                <div class="col-lg-10 col-md-12">
                    <div>
                        <span style="color: #9d9d9d">From:</span> <span class="address-card"> {{$order->address_from.' '.$order->zip_from}} </span>
                    </div>
                    <div style="margin-top: 10px">
                        <span style="color: #9d9d9d;margin-right: 18px;">To:</span> <span class="address-card">{{$order->address_to.' '.$order->zip_to}}</span>
                    </div>
                </div>
            </div>
            <a href="/order/{{$order->id}}" class="stretched-link"></a>
        </div>
    </div>
    @endif
@endforeach
