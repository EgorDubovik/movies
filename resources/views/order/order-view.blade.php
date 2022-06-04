
    <script>
        var orders = @json($orders);
    </script>
    <div class="col-md-12  col-xl-6" id="orders-line">

    </div>

    <script>
        window.onload = function(){
            orders.forEach(function (order) {
                $('#orders-line').append(
                    '<div class="card">'+
                        '<div class="card-status bg-green br-te-7 br-ts-7"></div>'+
                        '<div class="card-body">'+
                            '<div class="row">'+
                                '<div class="col-2">'+
                                    '<div>'+
                                        '<strong style="font-size: 18px">'+order.volume+'</strong> cb.ft.'+
                                    '</div>'+
                                    '<div>'+
                                        '<strong style="font-size: 18px">$'+order.price+' </strong> per. cb'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-10">'+
                                    '<div>'+
                                        '<span style="color: #9d9d9d">From:</span> <a href="#" style="font-weight: bold"> '+order.address_from+' '+order.zip_from+'</a>'+
                                    '</div>'+
                                    '<div style="margin-top: 10px">'+
                                        '<span style="color: #9d9d9d">To</span>: <a href="#" style="font-weight: bold"> '+order.address_from+' '+order.zip_to+'</a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                )
            });
        }
    </script>
