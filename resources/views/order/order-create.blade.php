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
        <div class="col-md-12 col-xl-6 m-auto">
            <form method="post">
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Address from:</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0">
                            <div class="form-group">
                                <label class="form-label">Address line 1 <span class="text-red">*</span></label>
                                <input type="text" class="form-control"placeholder="Address line 1" name="address_from_line1">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address line 2</label>
                                <input type="text" class="form-control"placeholder="Optional" name="address_from_line2">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mb-0">
                            <input type="text" class="form-control" placeholder="City" name="city_from">
                        </div>
                        <div class="form-group col-md-5 mb-0">
                            <input type="text" class="form-control" placeholder="ZIP code" name="zip_from">
                        </div>
                        <div class="form-group col-md-2 mb-0">
                            <select class="form-control form-select" placeholder="State" name="state_from">
                                <option selected>State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Address to:</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0">
                            <div class="form-group">
                                <label class="form-label">Address line 1 <span class="text-red">*</span></label>
                                <input type="text" class="form-control"placeholder="Address line 1" name="address_to_line1">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address line 2</label>
                                <input type="text" class="form-control"placeholder="Optional" name="address_to_line2">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mb-0">
                            <input type="text" class="form-control" placeholder="City" name="city_to">
                        </div>
                        <div class="form-group col-md-5 mb-0">
                            <input type="text" class="form-control" placeholder="ZIP code" name="zip_to">
                        </div>
                        <div class="form-group col-md-2 mb-0">
                            <select class="form-control form-select" placeholder="State" name="state_to">
                                <option selected>State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Volume cb. ft. <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="Volume cb. ft." name="volume">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Price per cb. ft. <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="Price per cb. ft." name="price">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Date send</label>
                                <input type="date" class="form-control" placeholder="Date send" name="date_send">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Date receive</label>
                                <input type="date" class="form-control" placeholder="Date receive" name="date_receive">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating floating-label1">
                            <textarea class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                            <label for="floatingTextarea2">Description</label>
                        </div>
                    </div>
                    <div class="form-footer mt-2">
                        <button type="send" class="btn btn-success">Save new order</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@stop
