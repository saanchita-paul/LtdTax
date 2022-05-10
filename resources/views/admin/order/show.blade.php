@extends('admin')

@section('content')
<style>
.in-bg{
    background-color: #DBDBDB;
}
.fnt-sz{
    font-size: 12px;
}
.fnt-sz2{
    font-size: 14px;
}
td,th{
    padding: .1rem !important;
    border: 2px solid grey !important;
}

.trm .thank td{
    border: none!important;
}
h6{border:2px solid grey !important;}
.h-cus-wid{
    width:480px;
}
.bdr-none{
    border:none!important;
}
</style>
<?php 
    $book_order = App\Models\OrderDetails::where('order_id',$order->id)->first();
    $train_order = App\Models\TrainOrderDetails::where('order_id',$order->id)->first();
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
        @if($book_order || $train_order)
            @if($book_order)
            <section class="account-page section-padding">
                <div id="printableArea" class="p-2 mt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{asset('/web/media/common/logo.png')}}" width="220" alt="Taxman logo" class="" />
                            </div>
                            <div class="col-lg-6">
                                <h2 class="font-weight-bold text-right" style="color:grey;">INVOICE</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="ml-2">Rupayan Karim Tower,</p>
                                <P class="ml-2">Level-9, Suite-B,</P>
                                <p class="ml-2">80, VIP Road,</p>
                                <p class="ml-2">Kakrail-Dhaka-1000.</p>
                                <p class="ml-2">Phone: 01853157143, 01743546552</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4 text-center">
                                <table class="table table-bordered float-right">
                                    <tr>
                                        <td class="text-black in-bg fnt-sz"><strong>INVOICE<strong></td>
                                        <td class="text-black in-bg fnt-sz"><strong>DATE</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center fnt-sz2">{{$order->invoice_id}}</td>
                                        <td class="text-center fnt-sz2">
                                        <?php
                                        $date = strtotime($order->created_at);
                                        echo date(' jS F, Y, l', $date);
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-black in-bg fnt-sz"><strong> PAYMENT METHOD</strong></td>
                                    </tr>
                                    <tr>
                                        @if($order->payment_method == 'cash')
                                        <td colspan="2" class="text-center fnt-sz2">CONDITIONAL SALE</td>
                                        @endif
                                        @if($order->payment_method == 'ssl')
                                        <td colspan="2" class="text-center fnt-sz2">SSL COMMERZ</td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <h6 class="in-bg pt-1 pb-1 pl-1 text-black font-weight-bold fnt-sz2">
                                    From
                                </h6>
                                <p class="ml-2">Rupayan Karim Tower,</p>
                                <P class="ml-2">Level-9, Suite-B,</P>
                                <p class="ml-2">80, VIP Road,</p>
                                <p class="ml-2">Kakrail-Dhaka-1000.</p>
                                <p class="ml-2">Phone: 01853157143, 01743546552</p>
                                <!-- <p class="ml-2">{{$order->billing_adderss->firstname}} {{$order->billing_adderss->lastname}}</p>
                                <p class="ml-2">{{$order->billing_adderss->email}}</p>
                                <p class="ml-2">{{$order->billing_adderss->phone}}</p>
                                <p class="ml-2">
                                @foreach($district as $dis)
                                @if($order->billing_adderss->district_id==$dis->id)
                                {{$dis->name}},
                                @endif
                                @endforeach

                                @foreach($division as $d)
                                @if($order->billing_adderss->division_id==$d->id)
                                {{$d->name}}.
                                @endif
                                @endforeach
                                </p>  -->
                            </div>
                            <div class="col-lg-4 mb-4"></div>
                            <div class="col-lg-4">
                                <h6 class="in-bg pt-1 pb-1 pl-1 text-black font-weight-bold fnt-sz2">To</h6>
                                @if(!empty($orders->fname) || !empty($orders->lname) || !empty($orders->semail) ||
                                !empty($orders->sphone) || !empty($orders->sdistrict_id) || !empty($orders->sdivision_id) )
                                @if(!empty($orders->fname) || !empty($orders->lname))
                                <p class="ml-2">{{$orders->fname}} {{$orders->lname}}</p>
                                @endif
                                @if(!empty($orders->semail))
                                <P class="ml-2">{{$orders->semail}}</P>
                                @endif
                                @if(!empty($orders->saddress))
                                <p class="ml-2">{{$orders->saddress}}</p>
                                @endif
                                @if(!empty($orders->sdistrict_id) || !empty($orders->sdivision_id))
                                <p class="ml-2">
                                    @foreach($district as $dis)
                                    @if($orders->sdistrict_id==$dis->id)
                                    {{$dis->name}},
                                    @endif
                                    @endforeach
                                    @foreach($division as $d)
                                    @if($orders->sdivision_id==$d->id)
                                    {{$d->name}}.
                                    @endif
                                    @endforeach
                                </p>
                                @endif
                                @else
                                <p class="ml-2">{{$order->billing_adderss->firstname}} {{$order->billing_adderss->lastname}}</p>
                                <p class="ml-2">{{$order->billing_adderss->email}}</p>
                                <p class="ml-2">{{$order->billing_adderss->phone}}</p>
                                <p class="ml-2">{{$order->billing_adderss->address}}</p>
                                <p class="ml-2">
                                    @foreach($district as $dis)
                                    @if($order->billing_adderss->district_id==$dis->id)
                                    {{$dis->name}},
                                    @endif
                                    @endforeach

                                    @foreach($division as $d)
                                    @if($order->billing_adderss->division_id==$d->id)
                                    {{$d->name}}.
                                    @endif
                                    @endforeach
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table class="table  trm">
                                    <tr>
                                        <th class="text-black in-bg fnt-sz2"><strong>Description<strong></th>
                                        <th class="text-black in-bg fnt-sz2 text-center"><strong>QTY</strong></th>
                                        <th class="text-black in-bg fnt-sz2 text-center"><strong>UNIT PRICE <strong></th>
                                        <th class="text-black in-bg fnt-sz2 text-center"><strong>AMOUNT</strong></th>
                                    </tr>
                                    @foreach($order->orderdetails as $book)
                                    <?php
                                    $books = App\Models\Book::where('status', 1)->get();
                                    $books_in_package = App\Models\BookInPackage::where('status', 1)->where('package_id', $book->books->id)->get();
                                    ?>
                                    <tr>
                                        <td class="text-black  fnt-sz2 pl-2">
                                            @foreach( $books_in_package as $bk_package)
                                                @foreach($books as $bk)
                                                    @if($bk_package->book_id == $bk->id)
                                                        <p class="bdr-none">{{$bk->name}}</p>           
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td class="text-black  fnt-sz2 text-center">
                                            @foreach( $books_in_package as $bk_package)
                                                @foreach($books as $bk)
                                                    @if($bk_package->book_id == $bk->id)
                                                        <p class="bdr-none text-center">{{$book->qty}}</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach( $books_in_package as $bk_package)
                                                @foreach($books as $bk)
                                                    @if($bk_package->book_id == $bk->id)
                                                        <p class="bdr-none text-center">{{$bk->regular_price}}</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td class="text-black text-center">
                                            @foreach( $books_in_package as $bk_package)
                                                @foreach($books as $bk)
                                                    @if($bk_package->book_id == $bk->id)
                                                        <p class="bdr-none text-center">{{$book->qty * $bk->regular_price}}</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <!-- <td class="text-black  fnt-sz2 text-center">{{$book->qty}}</td>
                                        <td class="text-black  fnt-sz2 text-center">{{$book->price}}</td>
                                        <td class="text-black  fnt-sz2 text-center">{{$book->qty * $book->price}}</td> -->
                                    </tr>
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td class="text-black fnt-sz2 text-center p-2 thank"><i>Thank you for being with The Taxman!</i>
                                        </td>
                                        <td colspan="2" class="text-black fnt-sz2 font-weight-bold p-2">SUBTOTAL</td>
                                        <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">
                                            {{$order->total + $order->discount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black fnt-sz2  p-2"></td>
                                        <td colspan="2" class="text-black fnt-sz2 font-weight-bold p-2">DISCOUNT</td>
                                        <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->discount}}</td>
                                    </tr>
                                    @if($order->payment_method == 'ssl')
                                    <tr>
                                        <td class="text-black fnt-sz2 text-center p-2"></td>
                                        <td class="text-black fnt-sz2  p-2 font-weight-bold" colspan="2">EXTRA DISCOUNT</td>
                                        <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->extra_discount}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-black fnt-sz2 text-center p-2"></td>
                                        <td colspan="2" class="text-black fnt-sz2 font-weight-bold p-2">TOTAL</td>
                                        <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->total - $order->extra_discount}}</td>
                                    </tr>
                                    @if($order->payment_method == 'cash')
                                    <tr>
                                        <td class="text-black fnt-sz2 text-center p-2"></td>
                                        <td class="text-black fnt-sz2  p-2 font-weight-bold" colspan="2">PAID</td>
                                        <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->paid}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black fnt-sz2 text-center p-2"></td>
                                        <td class="text-black fnt-sz2 p-2 font-weight-bold" colspan="2">DUE</td>
                                        <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->total - $order->paid}}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-4 mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-center">If you have any questions about this invoice, please contact</p>
                                <p class="text-center">[The Taxman Global Limited, Phone: 01853157143, 01743546552,
                                    thetaxmanlimited@gmail.com]</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-4">
                    <button onclick="printDiv('printableArea')" class="btn btn-danger float-right ml-2"><i
                            class="mdi mdi-printer mr-1"></i>Print</button>
                    <button id="buttonID" class="btn btn-danger float-right ml-2"><i class="mdi mdi-file-pdf"></i> PDF
                        Download</button>
                </div>
                <br>
            </section>    
            @endif
            @if($train_order)
            <section class="account-page section-padding">
                <div  id="printableArea" class="p-2 mt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                            <img src="{{asset('/web/media/common/logo.png')}}" width="220" alt="Taxman logo" class="" />
                            </div>
                            <div class="col-lg-6">
                                <h2 class="font-weight-bold text-right" style="color:grey;">INVOICE</h2>
                            </div>
                        </div>    
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                            <p class="ml-2">Rupayan Karim Tower,</p> 
                            <P class="ml-2">Level-9, Suite-B,</P> 
                            <p class="ml-2">80, VIP Road,</p> 
                            <p class="ml-2">Kakrail-Dhaka-1000.</p> 
                            <p class="ml-2">Phone: 01853157143, 01743546552</p> 
                            </div>
                        </div>    
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4 text-center">
                                <table class="table table-bordered float-right">
                                <tr>
                                <td class="text-black in-bg fnt-sz"><strong>INVOICE<strong></td>
                                <td class="text-black in-bg fnt-sz"><strong>DATE</strong></td>
                                </tr>
                                <tr>
                                <td class="text-center fnt-sz2">{{$order->invoice_id}}</td>
                                <td class="text-center fnt-sz2">
                                <?php
                                $date= strtotime($order->created_at);
                                echo date(' jS F, Y, l', $date); 
                                ?></td>
                                </tr>
                                <tr>
                                <td colspan="2" class="text-black in-bg fnt-sz"><strong> PAYMENT METHOD</strong></td>
                                </tr>
                                <tr>
                                @if($order->payment_method == 'cash')
                                <td colspan="2" class="text-center fnt-sz2">CONDITIONAL SALE</td>
                                @endif
                                @if($order->payment_method == 'ssl')
                                <td colspan="2" class="text-center fnt-sz2">SSL COMMERZ</td>
                                @endif
                                </tr>
                                </table>
                            </div>
                        </div>    
                    </div>
                    
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <h6 class="in-bg pt-1 pb-1 pl-1 text-black font-weight-bold fnt-sz2">
                                From
                                </h6>
                                <p class="ml-2">Rupayan Karim Tower,</p> 
                                <P class="ml-2">Level-9, Suite-B,</P> 
                                <p class="ml-2">80, VIP Road,</p> 
                                <p class="ml-2">Kakrail-Dhaka-1000.</p> 
                                <p class="ml-2">Phone: 01853157143, 01743546552</p> 
                                <!-- <p class="ml-2">{{$order->billing_adderss->firstname}} {{$order->billing_adderss->lastname}}</p> 
                                <p class="ml-2">{{$order->billing_adderss->email}}</p> 
                                <p class="ml-2">{{$order->billing_adderss->phone}}</p> 
                                <p class="ml-2">  
                                    @foreach($district as $dis)
                                    @if($order->billing_adderss->district_id==$dis->id)
                                    {{$dis->name}},
                                    @endif
                                    @endforeach

                                    @foreach($division as $d)
                                    @if($order->billing_adderss->division_id==$d->id)
                                    {{$d->name}}.
                                    @endif
                                    @endforeach 
                                </p>  -->
                            </div>
                            <div class="col-lg-4 mb-4"></div>
                            <div class="col-lg-4"> 
                            <h6 class="in-bg pt-1 pb-1 pl-1 text-black font-weight-bold fnt-sz2">To</h6>
                            @if(!empty($orders->fname) || !empty($orders->lname) || !empty($orders->semail) || !empty($orders->sphone) || !empty($orders->sdistrict_id) || !empty($orders->sdivision_id) )
                            @if(!empty($orders->fname) || !empty($orders->lname))
                            <p class="ml-2">{{$orders->fname}} {{$orders->lname}}</p> 
                            @endif
                            @if(!empty($orders->semail))
                            <P class="ml-2">{{$orders->semail}}</P> 
                            @endif
                            @if(!empty($orders->sphone))
                            <p class="ml-2">{{$orders->sphone}}</p> 
                            @endif
                            @if(!empty($orders->saddress))
                            <p class="ml-2">{{$orders->saddress}}</p>
                            @endif
                            @if(!empty($orders->sdistrict_id) || !empty($orders->sdivision_id))
                            <p class="ml-2">
                            @foreach($district as $dis)
                                @if($orders->sdistrict_id==$dis->id)
                                {{$dis->name}},
                                @endif
                                @endforeach
                                @foreach($division as $d)
                                @if($orders->sdivision_id==$d->id)
                                {{$d->name}}.
                                @endif
                                @endforeach
                                </p> 
                            @endif
                            @else
                            <p class="ml-2">{{$order->billing_adderss->firstname}} {{$order->billing_adderss->lastname}}</p> 
                            <p class="ml-2">{{$order->billing_adderss->email}}</p> 
                            <p class="ml-2">{{$order->billing_adderss->phone}}</p> 
                            <p class="ml-2">{{$order->billing_adderss->address}}</p> 
                            <p class="ml-2">  
                                @foreach($district as $dis)
                                @if($order->billing_adderss->district_id==$dis->id)
                                {{$dis->name}},
                                @endif
                                @endforeach

                                @foreach($division as $d)
                                @if($order->billing_adderss->division_id==$d->id)
                                {{$d->name}}.
                                @endif
                                @endforeach 
                                </p> 
                            @endif
                            </div>
                        </div>    
                    </div>
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table class="table trm">
                                <tr>
                                <th class="text-black in-bg fnt-sz2"><strong>Description<strong></th>
                                <th class="text-black in-bg fnt-sz2 text-center"><strong>QTY</strong></th>
                                <th class="text-black in-bg fnt-sz2 text-center"><strong>UNIT PRICE <strong></th>
                                <th class="text-black in-bg fnt-sz2 text-center"><strong>AMOUNT</strong></th>
                                </tr>
                                @foreach($order->trainorderDetails as $t)
                                    <?php
                                    $training = App\Models\Training::where('status',1)->where('id',$t->training_id)->get();
                                    ?>
                                    <tr>
                                    <td class="text-black  fnt-sz2">                                
                                    <table>
                                        @foreach($training as $train)                                            
                                            <tr>
                                                <td class="bdr-none">{{$train->title}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    </td>
                                <td class="text-black  fnt-sz2 text-center">{{$t->qty}}</td>
                                <td class="text-black  fnt-sz2 text-center">{{$t->price}}</td>
                                <td class="text-black  fnt-sz2 text-center">{{$t->qty * $t->price}}</td>
                                </tr>			
                                @endforeach
                                </tr>
                                <tr>
                                <td  class="text-black fnt-sz2 text-center p-2 thank"><i>Thank you for being with The Taxman!</i></td>
                                <td colspan="2" class="text-black fnt-sz2 font-weight-bold p-2">SUBTOTAL</td>
                                <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->total + $order->discount}}</td>
                                </tr>
                                <tr>
                                <td  class="text-black fnt-sz2  p-2"></td>
                                <td colspan="2" class="text-black fnt-sz2 font-weight-bold p-2">DISCOUNT</td>
                                <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->discount}}</td>
                                </tr>
                                <tr>
                                <td  class="text-black fnt-sz2 text-center p-2"></td>
                                <td colspan="2" class="text-black fnt-sz2 font-weight-bold p-2">TOTAL</td>
                                <td class="text-black fnt-sz2 text-center p-2 font-weight-bold">{{$order->total}}</td>
                                </tr>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="container mb-4 mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-center">If you have any questions about this invoice, please contact</p>
                                <p class="text-center">[The Taxman Global Limited, Phone: 01853157143, 01743546552, thetaxmanlimited@gmail.com]</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-4">
                    <button onclick="printDiv('printableArea')" class="btn btn-danger float-right ml-2"><i
                            class="mdi mdi-printer mr-1"></i>Print</button>
                    <button id="buttonID" class="btn btn-danger float-right ml-2"><i
                            class="mdi mdi-file-pdf"></i> PDF Download</button>
                </div>
                <br>
            </section>
            @endif
        @else
         <h4 class="mt-4 bg-dark text-white rounded p-4 text-center">No order details found</h4>
        @endif
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
        window.onload = function () {
            document.getElementById('buttonID').addEventListener("click", () => {
                const invoice = this.document.getElementById('printableArea');
                html2pdf().from(invoice).save();
            })
        }

    </script>
@endsection

