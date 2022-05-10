@extends('master')

@section('content')
@if(Cart::count()== 0)
<script type="text/javascript">
    window.location.href = "/";

</script>

@endif
<main>
<div class="container-fluid" id="news">
<section class="PageTitleInner">
            <div class="PageTitleInnerBg" data-stellar-background-ratio="0.6" style="background-position: 50% -30.8px;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="SectionTitle text-center wow fadeIn animated"
                            style="visibility: visible; animation-name: fadeIn;">
                            <p><span>Cart page</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
<div class="container mt-5">
		
			<div class="row mb-4">
				<div class="col-2">
					<h5>Image</h5>
				</div>
				<div class="col-3">
					<h5>Name</h5>
				</div>
				<div class="col-2">
					<h5>Price</h5>
				</div>
				<div class="col-2">
					<h5>Qty</h5>
				</div>
				<div class="col-2">
					<h5>Total</h5>
				</div>
				<div class="col-1">
					<h5>Remove</h5>
				</div>
			</div>
			<form id="c_cart" action="{{url('books/cart/update')}}" method="post">
			<?php $totalDiscount=0;?>
		
				@csrf
				@foreach( $content as $row)
				<?php
				$totalDiscount += (float)($row->price - $row->options['sale_price']) * $row->qty;
				?>
				<div class="row">
					<div class="col-2">
						<div class="about-image">
							<img src="{{asset('uploads/publication/'.$row->options->image)}}" alt="" class="text-center pb-3" style="height: 100px;width: 100px">
						</div>
					</div>
					<div class="col-3">
						<div class="about-text-content">
							{{$row->name}}
							
						</div>
					</div>
					<div class="col-2">
						<div class="about-text-content">
							{{$row->price}}
							
						</div>
					</div>
					<div class="col-2">
						<div class="about-text-content">
							<input type="hidden" name="rowId[]" value="{{$row->rowId}}" class="c_rowID">
							<input type="number" oninput="maxLengthCheck(this)" name="qty[]"  value="{{$row->qty}}" min="1" max="100" maxlength="3" required="" pattern="\d{3}" class="form-control">
							
						</div>
					</div>
					<div class="col-2">
						<div class="about-text-content">
                        ৳ {{$row->price*$row->qty}}
							
						</div>
					</div>
					<div class="col-1">
						<div class="about-text-content text-center">
							<a href="{{url('/remove/cart/'.$row->rowId)}}" class="text-danger h5 text-center" title="Remove item"><i class="fa fa-times-circle h4" aria-hidden="true"></i></a>
							
						</div>
					</div>
					
				</div>
				@endforeach
				
				<button type="submit" class="float-left mr-4 btn btn-primary">Update Cart</button>
			</form>	

					<a href="{{url('/#publication')}}" class="btn btn-primary float-left">Continue Shopping</a>
			<div class="row mt-5">
            <div class="col-7">
            </div>
				<div class="col-5 mt-5 float-left">
					<table class="table float-left">
						<tr>
							<th>Subtotal</th>
							<td>
                            ৳ {{Cart::subtotal()}}
							</td>
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
					<a href="{{url('/checkout')}}" class="btn btn-primary mb-5 float-right">Checkout</a>
				</div>
			</div>
		</div>
</main>

@endsection
