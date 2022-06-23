
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
                        <td><a href="/profile/view/{{$application->user->id}}">{{$application->user->company_name}} </a>
                            <div class="jq-star" style="width:20px;  height:20px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-705{fill:url(#705_SVGID_1_);}.svg-hovered-705{fill:url(#705_SVGID_2_);}.svg-active-705{fill:url(#705_SVGID_3_);}.svg-rated-705{fill:#f1c40f;}</style><linearGradient id="705_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:lightgray"></stop><stop offset="1" style="stop-color:lightgray"></stop> </linearGradient><linearGradient id="705_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#f1c40f"></stop><stop offset="1" style="stop-color:#f1c40f"></stop> </linearGradient><linearGradient id="705_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FEF7CD"></stop><stop offset="1" style="stop-color:#FF9511"></stop> </linearGradient><path data-side="center" class="svg-empty-705" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-705" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-705" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div> {{$application->user->rating->avg('star')}}
                            <div class="row" style="margin-left:20px;margin-top: 10px;font-size: 15px;color: #757575;">
                                {{$application->comment}}
                            </div>
                        </td>
                        <td style="width: 120px">{{\Carbon\Carbon::parse($application->created_at)->diffForHumans()}}</td>
                        <td style="width: 110px;"><a class="btn btn-success" href="/application/confirm/{{$application->id}}"> confirm</a></td>
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
        <br> <a href="/deal/{{$order->deal->id}}">Hee you deal with</a>
    @endif
@else
    @can('send-application',$order)
        <form method="post" action="/application/send/{{$order->id}}">
            @csrf
            <textarea name="comment" class="form-control mb-4" placeholder="Comment for application"></textarea>
            <button  class="btn btn-success btn-block">Submit your application</button>
        </form>

    @endcan
    @if($order->applications->contains('user_id',Auth::user()->id))


        @if($order->confirmed_application)
            @if($order->confirmed_application->user_id == Auth::user()->id)
                They choose you. <br> This is yours <a href="/deal/{{$order->deal->id}}">DEAl</a>
            @else
                Unfortunately they hired another company
            @endif
        @else
            <div style="text-align: center; font-weight: bold;font-size: 18px;color: #7c7c7c">
                <i class="fa fa-check-square-o" style="font-size: 25px;color: #4cc04c;margin-right: 10px"></i> You already send application for this order
            </div>

            <div style="text-align: right">
                <form action="/application/destroy/{{$order->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</button>
                </form>
            </div>
        @endif
    @endif
@endif
