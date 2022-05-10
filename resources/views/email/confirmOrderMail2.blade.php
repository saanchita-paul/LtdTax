<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
  .column{
    width: 100%;
  }

}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
</style>

</head>
<body style="font-size: 1rem;font-family: 'roboto', sans-serif;color: #212529;background: #E8E8E8;">
    <div class="row" style="box-sizing: border-box;background: #1d3c13;text-align:center;width: 930px;margin:0 auto;padding-top: 20px;padding-bottom: 5px;">
            <div class="column" style="box-sizing: border-box;width: 100%;height:auto;text-align: center;">
                <p style="box-sizing:border-box;margin-top:10px;color:#262425;font-size:20px;text-align:center;color: white;">ORDER DETAILS</p> 
            </div>
        </div>
    <div class="container" style="padding-right: 15px;padding-left: 15px;margin:0 auto;width: 900px;background: white;">
        <div class="row" style="box-sizing: border-box;margin-left: -5px;margin-right: -5px;">
            <div class="column" style="box-sizing: border-box;padding: 5px;width: 50%;text-align: center;">
              <img style="width:50%;float:left;margin-top:25px;" src="https://thetaxmanltd.com/web/media/common/logo.png" alt="logo">
            </div>
            <div class="column" style="box-sizing: border-box;float: right;width: 50%;padding: 5px;height:50px;text-align: center;">
                <h2 style="float: right;color:grey;margin-top:25px;">INVOICE</h2>
            </div>
        </div>
        <div class="row" style="box-sizing: border-box;margin-left: -5px;margin-right: -5px;clear:both;">
            <div class="column" style="box-sizing: border-box;float: left;width: 40%;padding: 8px;height:auto;">
                <table style="box-sizing: border-box;border-collapse: collapse;border-spacing: 0;width: 100%;">
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Rupayan Karim Tower,</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Level-9, Suite-B,</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">80, VIP Road,</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Kakrail-Dhaka-1000.</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Phone: 01853157143, 01743546552</td>
                    </tr>
                </table>
            </div>
            <div class="column" style="box-sizing: border-box;float: left;width: 30%;padding: 5px;height:150px;"></div>
            <div class="column" style="box-sizing: border-box;float: left;width: 30%;padding: 5px;height:150px;"></div>
        </div>
        <div class="row" style="box-sizing: border-box;margin-left: -5px;margin-right: -5px;margin-bottom:170px;clear:both;">
            <div class="column" style="box-sizing: border-box;float: left;width: 30%;padding: 5px;height:150px;">
            </div>
            <div class="column" style="box-sizing: border-box;float: left;width: 30%;padding: 5px;height:150px;">
                
            </div>
            <div class="column" style="box-sizing: border-box;float: right;width: 40%;padding: 5px;height:auto;">
                <table style="box-sizing: border-box;border-collapse: collapse;border-spacing: 0;width: 100%;border: 1px solid #ddd;">
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: center;padding: .4rem ;background-color: #DBDBDB;font-size: 12px;border: 2px solid grey ;"><strong style="box-sizing: border-box;">INVOICE</strong><strong style="box-sizing: border-box;"></strong></td>
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: center;padding: .4rem ;background-color: #DBDBDB;font-size: 12px;border: 2px solid grey ;"><strong style="box-sizing: border-box;">DATE</strong></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 14px;border: 2px solid grey ;">{{$invoice_id}}</td>
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 14px;border: 2px solid grey ;">
                        <?php
                            $order_date = strtotime($date);
                            echo date(' jS F, Y, l', $order_date);
                            ?>
                        </td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td colspan="2" class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: center;padding: .4rem ;background-color: #DBDBDB;font-size: 12px;border: 2px solid grey ;"><strong style="box-sizing: border-box;"> PAYMENT METHOD</strong></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        @if($payment_method == 'cash')
                            <td colspan="2" class="text-center fnt-sz2" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 14px;border: 2px solid grey ;">CASH ON DELIVERY</td>
                        @else
                            <td colspan="2" class="text-center fnt-sz2" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 14px;border: 2px solid grey ;">SSL COMMERZ</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="box-sizing: border-box;margin-left: -5px;margin-right: -5px;margin-bottom:240px;clear:both;">
            <div class="column" style="box-sizing: border-box;float: left;width: 40%;padding: 5px;height:auto;">
                <table style="box-sizing: border-box;border-collapse: collapse;border-collapse:separate;border-spacing:0 5px;width: 100%;">
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;background-color: #DBDBDB;border: 2px solid grey ;"><strong>From</strong></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Rupayan Karim Tower,</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Level-9, Suite-B,</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">80, VIP Road,</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Kakrail-Dhaka-1000.</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">Phone: 01853157143, 01743546552</td>
                    </tr>
                </table>
            </div>
            <div class="column" style="box-sizing: border-box;float: left;width: 20%;padding: 5px;height:150px;">
                
            </div>
            <div class="column" style="box-sizing: border-box;float: right;width: 40%;padding: 5px;height:auto;">
                <table style="box-sizing: border-box;border-collapse: collapse;border-collapse:separate;border-spacing:0 5px;width: 100%;">
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;background-color: #DBDBDB;border: 2px solid grey ;"><strong>To</strong></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">{{$billing_address->firstname}}</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">{{$billing_address->email}}</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">{{$billing_address->phone}}</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">{{$billing_address->address}} {{$billing_address->zip_code}}</td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-center fnt-sz2" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">{{$billing_address->district_name}}, {{$billing_address->division_name}}.</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="box-sizing: border-box;margin-left: -5px;margin-right: -5px;clear: both;margin-bottom: 170px;">
            <div class="column" style="box-sizing: border-box;float: right;width: 100%;padding: 5px;height:auto;">
                <table style="box-sizing: border-box;border-collapse: collapse;width: 100%;">
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;background-color: #DBDBDB;border: 2px solid grey;"><strong>DESCRIPTION</strong></td>
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;background-color: #DBDBDB;border-top: 2px  solid grey;border-bottom: 2px  solid grey;border-right:2px  solid grey;"><strong>QTY</strong></td>
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;background-color: #DBDBDB;border-top: 2px  solid grey;border-bottom: 2px  solid grey;"><strong>UNIT PRICE</strong></td>
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;background-color: #DBDBDB;border: 2px solid grey;"><strong>AMOUNT</strong></td>
                    </tr>
                    @foreach($order->trainorderDetails as $tra)
                    <?php $training = App\Models\Training::where('status',1)->where('id',$tra->training_id)->get();?>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;border: 2px  solid grey;text-align: left;padding: .4rem ;font-size: 12px;">
                            <table style="box-sizing: border-box;border-collapse: collapse;border-collapse:separate;border-spacing:0 5px;width: 100%;">
                                @foreach($training as $train) 
                                    <tr style="box-sizing: border-box;">
                                        <td class="text-black in-bg fnt-sz" style="box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;">{{$train->title}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;">{{$tra->qty}}</td>
                        <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;">{{$tra->price}}</td>
                        <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;">{{$tra->qty * $tra->price}}</td>
                    </tr>
                    @endforeach		
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="border-right: 2px  solid grey;border-left: 2px  solid grey;box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;"></td>
                        <td colspan="2" class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;"><strong>SUBTOTAL</strong></td>
                        <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;"><strong>{{$order->total + $order->discount}}</strong></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                        <td class="text-black in-bg fnt-sz" style="border-right: 2px  solid grey;border-left: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 14px;"><i>Thank you for being with The Taxman!</i></td>
                        <td colspan="2" class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;"><strong>DISCOUNT</strong></td>
                        <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;"><strong>{{$order->discount}}</strong></td>
                    </tr>
                    <tr style="box-sizing: border-box;">
                       <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;border-left: 2px  solid grey;box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;"></td>
                        <td colspan="2" class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: left;padding: .4rem ;font-size: 12px;"><strong>TOTAL</strong></td>
                        <td class="text-black in-bg fnt-sz" style="border-bottom: 2px solid grey;border-right: 2px  solid grey;box-sizing: border-box;text-align: center;padding: .4rem ;font-size: 12px;"><strong>{{$order->total}}</strong></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="box-sizing: border-box;height:auto;padding-bottom: 10px;">
            <div class="column" style="box-sizing: border-box;width: 100%;text-align: center;">
                <span style="font-size: 14px;">If you have any questions about this invoice, please contact</span><br>
                <span style="font-size: 14px;">[The Taxman Global Limited, Phone: 01853157143, 01743546552, thetaxmanlimited@gmail.com]</span>
            </div>
        </div>
    </div>
        <div class="row" style="box-sizing: border-box;background: #1d3c13;text-align:center;width: 930px;margin:0 auto;padding-top: 20px;padding-bottom: 5px;">
            <div class="column" style="box-sizing: border-box;width: 100%;height:auto;text-align: center;">
                <ul style="text-align:center;padding: 0;margin: 0;">
                    <li style="display:inline-block;list-style-type:none;"><a style="border-bottom:none" href="https://www.facebook.com" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com&amp;source=gmail&amp;ust=1628629613622000&amp;usg=AFQjCNHCofQ2KYFcI82TbrydwC2tVCFlUg"><img style="" width="28" src="https://ci4.googleusercontent.com/proxy/oXlG_CnH_y98fSMhxPIralyQtT1GskTu0WYwG-IJytzKBiV8wY9e03o5H8gMwoC3ZPOOLnxi4-X74NygBJU6vaw1ZceEpagtGu2Ku7xHWAjJoclgIkFCpMh8iZy1=s0-d-e1-ft#https://cdn.exclaimer.com/Handbook%20Images/facebook-icon_square_32x32.png" class="CToWUd"></a></li>
                    <li style="display:inline-block;list-style-type:none;"><a style="border-bottom:none" href="https://www.twitter.com" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.twitter.com&amp;source=gmail&amp;ust=1628629613622000&amp;usg=AFQjCNFlHbvLYuECNyGiRxZdME20pTM0kQ"><img style="" width="28" src="https://ci3.googleusercontent.com/proxy/fplKqtxUX6-sk_zdxnNro2ognjjAe7cgLOiPH96r_RfyBMCvnA7AVsdGBgnEPqKEMlGgP0C4bAVQ8xPFYeUE8M5ExGx8f9h32z_bWuli5paA6R_oozOgbSYJyak=s0-d-e1-ft#https://cdn.exclaimer.com/Handbook%20Images/twitter-icon_square_32x32.png" class="CToWUd"></a></li>
                    <li style="display:inline-block;list-style-type:none;"><a style="border-bottom:none" href="https://bd.linkedin.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://bd.linkedin.com/&amp;source=gmail&amp;ust=1628629613622000&amp;usg=AFQjCNGcwv8wufuV_jWUc1kiJoorqCOVeQ"><img style="" width="28" src="https://ci6.googleusercontent.com/proxy/j5DEu8O5pYBBKygIrMsdu31OIttoBx9QoCJmGw9B238MWyqWKMtd_hsyi6kqvBF3-inUr2n16kgNiTOwlOlHg7zJMidq2VOQM2lEDg_uQVXCCikrWyPMehkYtMvj=s0-d-e1-ft#https://cdn.exclaimer.com/Handbook%20Images/linkedin-icon_square_32x32.png" class="CToWUd"></a></li>
                    <li style="display:inline-block;list-style-type:none;"><a style="border-bottom:none" href="https://www.pinterest.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.pinterest.com/&amp;source=gmail&amp;ust=1628629613622000&amp;usg=AFQjCNFohQInqMFWowS0HBSu0GADLU8KHA"><img style="" width="28" src="https://ci5.googleusercontent.com/proxy/tZFlizZR2F5ZWXZAiGDbm68DeeAaSt1cOYnCe469Z7jXC728x0p5kQWXcL5SjW0Fh6MY1Y6elyL5WPEDD8aSnefRC1fDP1wj-OXf_HHONzn1qP58Ov5RV9oMXiup1g=s0-d-e1-ft#https://cdn.exclaimer.com/Handbook%20Images/pinterest-icon_square_32x32.png" class="CToWUd"></a></li>
                </ul>
                <p style="box-sizing:border-box;margin-top:10px;color:#262425;font-size:12px;text-align:center;color: white;">©2021 Taxman. All rights reserved.</p> 
            </div>
        </div>
</body>

