@extends('layout.main')

@section('content')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Search by rout</h1>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="map" style="height: 400px;"></div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address from</label>
                                    <input type="text" class="form-control" id="address_from">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address to</label>
                                    <input type="text" class="form-control" id="address_to">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input class="rangeslider1" id="radius" name="example_name" type="text" value="">
                            </div>
                            <div class="row mt-2">
                                <button class="btn btn-success" onclick="searchRoute()">Search</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="orders-line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var orders = @json($points);
    </script>

@stop

@section('scripts')
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/rangeslider.js')}}"></script>


    <!-- GOOGEL MAP -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ENV('GOOGLE_MAP_API')}}"></script>
    <script src="{{ URL::asset('assets/js/ev3_map.js')}}"></script>
    <script>
        var directionsService = new google.maps.DirectionsService();
        var map;
        var polyline = null;
        var circles = [];
        var gmarkers = [];

        function initialize() {
            var center = new google.maps.LatLng(37.719096, -97.398866);
            var myOptions = {
                zoom: 4,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: center
            }
            map = new google.maps.Map(document.getElementById("map"), myOptions);

            polyline = new google.maps.Polyline({
                path: [],
                strokeColor: 'blue',
                strokeWeight: 3,
            });
        }

        function searchRoute(){
            var start = $('#address_from').val()
            var end = $('#address_to').val()
            var method = 'DRIVING';
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.DirectionsTravelMode[method]
            };

            gmarkers.forEach(function (m){
                m.setMap(null);
            })
            gmarkers = [];

            directionsService.route(request, function (response, status) {

                // Check response status
                if (status == google.maps.DirectionsStatus.OK) {

                    var bounds = new google.maps.LatLngBounds();

                    // Get the route
                    var route = response.routes[0];
                    // Create our own Polyline for this step
                    polyline.setPath([]);
                    polyline.setPath(route.overview_path);
                    polyline.setMap(map);

                    // Extend our bounds object with each Polyline point
                    for (var i = 0; i < route.overview_path.length; i++) {
                        bounds.extend(route.overview_path[i]);
                    }
                    map.fitBounds(bounds);
                    var radius = $("#radius").val() * 1000;

                    var points = polyline.GetPointsAtDistance(radius);

                    // createMarker(response.routes[0].legs[0].start_location,'A')
                    // createMarker(response.routes[0].legs[0].end_location,'B')
                    circles.forEach(function (circle){
                       circle.setMap(null);
                    });
                    circles = [];
                    fo = [];
                    points.forEach(function(point) {
                        fo = arePointsNear(orders, {lat: point.lat(), lng: point.lng()}, fo, radius);
                        console.log(fo);
                        var cityCircle = new google.maps.Circle({
                            strokeColor: "#FF0000",
                            strokeOpacity: 0.2,
                            strokeWeight: 2,
                            fillColor: "#FF0000",
                            fillOpacity: 0.15,
                            map,
                            center: { lat: point.lat(), lng: point.lng() },
                            radius: radius
                        })
                        circles.push(cityCircle);
                    });
                    fo.forEach(function (f){
                       createMarker(f,'');
                    });
                    viewOrdersList(fo);
                }
            });
        }

        function ordersParseFloat(){
            orders.forEach(function (order){
                order.lat = parseFloat(order.lat);
                order.lng = parseFloat(order.lng);
            });

            console.log(orders);
        }

        function arePointsNear(checkPoints, centerPoint, points, radius) {
            checkPoints.forEach(function(checkPoint) {
                if(google.maps.geometry.spherical.computeDistanceBetween(checkPoint, centerPoint) <= radius){
                    let shouldSkip = false;
                    points.forEach(function(point){
                        if(checkPoint.id == point.id) {
                            shouldSkip = true
                            return;
                        }
                    })
                    if(shouldSkip) return points;
                    points.push(checkPoint)
                }
            });
            return points;
        }

        function createMarker(point, title){
            var marker = new google.maps.Marker({
                position: point,
                title: title,
                map: map
            });
            gmarkers.push(marker);
        }

        function viewOrdersList(list){
            $('#orders-line').html("");
            list.forEach(function (order) {
                $('#orders-line').append(
                    '<div class="card">'+
                    '<div class="card-status bg-green br-te-7 br-ts-7" style=""></div>'+
                    '<div class="card-body">'+
                    '<div class="row">Order # '+order.id+'</div> '+
                    '<div class="row">'+
                    '<div class="created-card">Status: New</div>'+
                    '<div class="col-lg-2 col-md-12">'+
                    '<div>'+
                    '<strong style="font-size: 18px">'+order.volume+'</strong> cb.ft.'+
                    '</div>'+
                    '<div>'+
                    '<strong style="font-size: 18px">$'+order.price+' </strong> per. cb'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-lg-10 col-md-12">'+
                    '<div>'+
                    '<span style="color: #9d9d9d">From:</span> <span class="address-card"> '+order.address_from+' '+order.zip_from+'</span>'+
                    '</div>'+
                    '<div style="margin-top: 10px">'+
                    '<span style="color: #9d9d9d;margin-right: 18px;">To:</span> <span class="address-card"> '+order.address_to+' '+order.zip_to+'</span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<a href="/order/'+order.id+'" class="stretched-link"></a>'+
                    '</div>'+
                    '</div>'
                )
            });
        }

        $(document).ready(function () {
            ordersParseFloat();
            initialize();
        })

    </script>
@stop
