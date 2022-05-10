@extends('master')
<style>
label a{
text-decoration: underline!important;
font-weight:normal!important;
color:#0069D9!important;
}
</style>
@section('content')
@if(Cart::count()==0)
<script type="text/javascript">
    window.location.href = "/books";
</script>
@endif
<main>
    <div class="container-fluid" id="news">
        <section class="PageTitleInner">
            <div class="PageTitleInnerBg" data-stellar-background-ratio="0.6" style="background-position: 50% -30.8px;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="SectionTitle text-center wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                            <p><span>Checkout Page</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            @if(Session::has('msg'))
                <span class="text-danger">{{Session::get('msg')}}</span>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <section id="shop-checkout">
                <div class="container">
                    <div class="shop-cart">
                        <form method="post" class="sep-top-md" action="{{url('/order/store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 no-padding">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="upper">Billing &amp; Shipping Address</h4>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="First Name" value="@if(!empty(Auth::user()->name)){{Auth::user()->name}}@else{{old('firstname')}}@endif" name="firstname">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Last Name" value="@if(!empty(Auth::user()->lname)){{Auth::user()->lname}}@else{{old('lastname')}}@endif" name="lastname">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Email" value="@if(!empty(Auth::user()->email)){{Auth::user()->email}}@else{{old('email')}}@endif" name="email">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Phone" value="@if(!empty(Auth::user()->phone)){{Auth::user()->phone}}@else{{old('phone')}}@endif" name="phone">
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input type="text" class="form-control" placeholder="Address" value="{{old('address1')}}" name="address1">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" name="country" value="Bangladesh" class="form-control border-form-control" readonly>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <select class="form-control" name="division_id" id="bill_division_id">
                                                <option>Select Division</option>
                                                @foreach($division as $divi)
                                                <option value="{{$divi->id}}">{{$divi->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <select class="form-control" disabled name="district_id" id="bill_district_id">
                                                <option>Select District</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Postcode / Zip" value="{{old('zip')}}" name="zip">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="upper">Order Summary</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-thumbnail">Images</th>
                                                <th class="cart-product-thumbnail">Product Name</th>
                                                <th class="cart-product-name">Price</th>
                                                <th class="cart-product-name">Quantity</th>
                                                <th class="cart-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $totalDiscount =0; ?>
                                            @foreach( $content as $row)
                                                <tr>
                                                    <?php 
                                                    $totalDiscount += (float)($row->price - $row->options['sale_price']) * $row->qty;
                                                    ?>
                                                    <input type="hidden" value="{{$totalDiscount}}" name="discount">
                                                    <td class="cart-product-thumbnail">
                                                        <div class="cart-product-thumbnail-name">
                                                            <img src="{{asset('uploads/publication/'.$row->options->image)}}" alt="" class="text-center pb-3" style="height: 50px;width: 50px">
                                                        </div>
                                                    </td>
                                                    <td class="cart-product-thumbnail">
                                                        <div class="cart-product-thumbnail-name">{{$row->name}}</div>
                                                    </td>
                                                    <td class="cart-product-thumbnail">
                                                        <div class="cart-product-thumbnail-name">{{$row->price}}</div>
                                                    </td>
                                                    <td class="cart-product-thumbnail">
                                                        <div class="cart-product-thumbnail-name">{{$row->qty}}</div>
                                                    </td>
                                                    <td class="cart-product-subtotal">
                                                        <span class="amount">{{$row->price*$row->qty}}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                               <!-- <input type='checkbox' data-toggle='collapse' data-target='#collapsediv1'name="checkbox"> Ship to a different address</input> -->
                                <div id='collapsediv1' class='collapse div1'>
                                    <div class="row mt-4">
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="First Name" value="{{old('ship_firstname')}}" name="ship_firstname">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Last Name" value="{{old('ship_lastname')}}" name="ship_lastname">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Email" value="{{old('ship_email')}}" name="ship_email">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Phone" value="{{old('ship_phone')}}" name="ship_phone">
                                        </div>
										<div class="col-lg-12 form-group">
                                            <input type="text" class="form-control" placeholder="Address" value="{{old('ship_address1')}}" name="ship_address1">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" name="ship_country" value="Bangladesh" class="form-control border-form-control" readonly>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <select class="form-control" name="ship_division_id" id="ship_division_id">
                                                <option>Select Division</option>
                                                @foreach($division as $divi)
                                                <option value="{{$divi->id}}">
                                                    {{$divi->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <select class="form-control" name="ship_district_id" id="ship_district_id">
                                                <option>Select District</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" placeholder="Postcode / Zip" value="" name="ship_zip">
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <textarea class="form-control" placeholder="Customer Note" name="shipping_note">{{old('shipping_note')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <h4>Order Total</h4>
                                    <table class="table">
                                        <tr class="mr-4">
                                            <th class="pr-4">Subtotal</th>
                                            <td>৳ {{$subtotal=Cart::subtotal()}}<input type="hidden" name="total" value="{{$subtotal}}"/></td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td>
                                            ৳ <?php $td = number_format($totalDiscount,2);echo str_replace(',','',$td);?>
                                            </td>
                                        </tr>	
                                        <tr>
                                            <th>Total</th>
                                            <td>
                                            ৳ <?php $r = Cart::subtotal();
                                                $p=intval($r);
                                                $tot= $p-$totalDiscount; 
                                                
                                                $tota = number_format($tot,2);
                                                echo str_replace(',','',$tota);?>
                                            </td>
                                        </tr>	
                                    </table>
                                </div>
                            </div>
                            <?php
                            $cash = DB::table('payment_details')
                            ->select('payment_details.*','payment_methods.method_name as name')
                            ->join('payment_methods','payment_methods.id','=','payment_details.method_id')
                            ->where('payment_details.method_id',1)
                            ->get()
                            ->toArray();

                            $ssl = DB::table('payment_details')
                            ->select('payment_details.*','payment_methods.method_name as name')
                            ->join('payment_methods','payment_methods.id','=','payment_details.method_id')
                            ->where('payment_details.method_id',2)
                            ->get()
                            ->toArray();
                            $cash_enable = $cash[0]->key_value;
                            $ssl_enable = $ssl[0]->key_value;
                            ?>
                            <div class="col-12 ml-2 float-right">
                                <h4>Payment Method</h4>
                                @if($subtotal == 0)
                                    @if($cash_enable == 'yes')
                                        <input class="ml-2" type="radio" name="payment" value="cash" checked="">&nbsp; Conditional Sale <br>
                                    @endif
                                    @if($cash_enable == 'no' && $ssl_enable == 'no')
                                    <span class="text-danger ml-2">No Payment Method Found.</span>
                                    @endif
                                @else
                                    @if($ssl_enable == 'yes')
                                            <input type="radio" class="ml-2" name="payment" checked="" value="ssl">&nbsp; SslCommerz<br> &nbsp;<span style="font-size:12px;">(আপনি যদি SSL Commerz Option ব্যবহার করেন তাহলে আপনাকে অতিরিক্ত  ২০০ টাকা ডিসকাউন্ট দেওয়া হবে।)</span><br>
                                    @endif
                                    @if($cash_enable == 'yes')
                                        <input type="radio" name="payment" class="ml-2" value="cash" >&nbsp;Conditional Sale <br>&nbsp; <span style="font-size:12px;">(আপনি যদি Conditional Sale Option ব্যবহার করেন তাহলে আপনাকে  ২০০ টাকা অগ্রিম প্রদান করতে হবে যা অফেরৎযোগ্য হিসেবে বিবেচিত করা হবে।)</span><br>
                                    @endif

                                    @if($cash_enable == 'no' && $ssl_enable == 'no')
                                        <span class="text-danger ml-2">No Payment Method Found.</span>
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-12 ml-3 mt-2">
                                <input type="checkbox" name="terms" id="terms" required="">
                                <label for="terms"><span class="font-weight-normal">I agree to the</span> <a href="{{URL('/terms-condition')}}">Terms & Coditions</a>, <a href="{{URL('/privacy-policy')}}">Privacy Policy</a> <span class="font-weight-normal">and</span> <a href="{{URL('/return-refund')}}">Return & Refund Policy</a></label>
                                <button type="submit" class="btn btn-primary icon-left float-right mt-3"><span>Proceed to Order</span></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

@endsection
