@extends('master')
<style>
/* tab-style-start */
.card{border:unset!important;}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
	color: #fff;
	background-color: #0C6934;
	border-color: #dee2e6 #dee2e6 #fff;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link{
	color: rgb(75, 68, 68);
    font-size: 16px;
}
#myTabContent {
    background: #fff;
}

#myTabContent p {
    color: #000;
}

.tab-content li {
    margin-left: 16px;
}

.tab-content h6>span {
    font-size: 15px;
    color: #0C6934;
}

.mdi.mdi-star {
    color: #F5D90B;
    font-size: 19px;
}

.tab-content h5 {
    padding: 30px 0px;
}

.wr-review>h5 {
    color: #0C6934;
}

.wr-review>h5:hover {
    color: #F5D90B;
}



.star-rating {
    direction: rtl;
    padding: 20px;
}

.star-rating input[type=radio] {
    display: none
}

.star-rating label {
    color: #bbb;
    font-size: 28px;
    padding: 0;
    cursor: pointer;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}

.star-rating label:hover,
.star-rating label:hover~label,
.star-rating input[type=radio]:checked~label {
    color: #f2b600
}
li{
    list-style:none;
}


/* review-form-style-start */

.widget-area {
    background-color: #fff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
    -ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
    -o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
    float: left;
    padding: 25px 30px;
    position: relative;
    width: 100%;
    }
    .status-upload {
    background: none repeat scroll 0 0 #f5f5f5;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    float: left;
    width: 100%;
    }
    .status-upload p {
        line-height: 5px;
    }
    .status-upload form {
    float: left;
    width: 100%;
    }
    .status-upload form textarea {
    background: none repeat scroll 0 0 #fff;
    border: medium none;
    -webkit-border-radius: 4px 4px 0 0;
    -moz-border-radius: 4px 4px 0 0;
    -ms-border-radius: 4px 4px 0 0;
    -o-border-radius: 4px 4px 0 0;
    border-radius: 4px 4px 0 0;
    color: #111;
    float: left;
    font-family: Lato;
    font-size: 14px;
    height: 142px;
    letter-spacing: 0.3px;
    padding: 20px;
    width: 100%;
    resize:vertical;
    outline:none;
    border: 1px solid #F2F2F2;
    }
    
    .status-upload ul {
    float: left;
    list-style: none outside none;
    margin: 0;
    padding: 0 0 0 15px;
    width: auto;
    }
    .status-upload ul > li {
    float: left;
    }
    .status-upload ul > li > a {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    color: #777777;
    float: left;
    font-size: 14px;
    height: 30px;
    line-height: 30px;
    margin: 10px 0 10px 10px;
    text-align: center;
    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    width: 30px;
    cursor: pointer;
    }
    .status-upload ul > li > a:hover {
    background: none repeat scroll 0 0 #606060;
    color: #fff;
    }
    .status-upload form button {
    border: medium none;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    color: #fff;
    float:left;
    font-family: Lato;
    font-size: 14px;
    letter-spacing: 0.3px;
    margin-right: 9px;
    margin-top: 9px;
    padding: 6px 15px;
    }
    .dropdown > a > span.green:before {
    border-left-color: #2dcb73;
    }
    .status-upload form button > i {
    margin-right: 7px;
    }
    .preview {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}
.xzoom-container {
    display: inline;
}
.xzoom-thumbs {
    border: none;
    margin-top: 10px;
    width: 107%;
    text-align: left;
}
.xzoom-thumbs img {
    width: 17%;
    margin-right: 10px;
}

.xzoom-gallery, .xzoom-gallery2, .xzoom-gallery3, .xzoom-gallery4, .xzoom-gallery5, .xactive {
    border: none;
    box-shadow: none;
}
.xzoom-gallery, .xzoom-gallery2, .xzoom-gallery3, .xzoom-gallery4, .xzoom-gallery5 {
    margin-left: 0;
    margin-bottom: 0px;
}
.card {
    margin-top: 70px;
    background: transparent;
    padding: 0;
    line-height: 1.5em;
    border: none;
}
.product-title {
    margin-bottom: 20px;
}
.product-description {
    padding-bottom: 20px;
}
.rating, .price {
    margin-bottom: 20px;
}
.checked, .price span {
    color: #ff9f1a;
}
.sizes p {
    font-weight: normal;
    padding-top: 10px;
}
.sizes {
    margin-bottom: 20px;
}
.price, .sizes, .colors {
    font-weight: bold;
    font-size: 16px;
}
.details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}
.add-to-cart{
    margin-left:4px;
    background:#005A13;
    display: inline-block;
    font-weight: 400;
    color: white;
    outline:0;
    border:none;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    padding: .395rem .85rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
}
}
.like {
    background: #0044A9!important;
    padding: .6em 1.2em!important;
    border: none!important;
    text-transform: uppercase!important;
    font-weight: 400!important;
    color: #fff!important;
    -webkit-transition: background .3s ease!important;
    transition: background .3s ease!important;
    margin-top: 12px!important;
    border-radius: 3px!important;
}
.button {
    cursor:pointer;
    display: inline-block;
    background:#005A13;
    font-weight: 400;
    color: white;
    outline:0;
    border:none;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    padding: .395rem .85rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
}
.quantity {
    vertical-align: middle;
}
.DPublicationList.align-self-stretch img {
    /* height: 206px; */
    max-height: 100%;

    /* align-self: center; */
}


.DPublicationList h3 {
    padding: 5px 8px;
    margin: 0;
    font-size: 15px;
    color: #003671;
    line-height: 22px;
}
.cImage {
    height: 270px;
    overflow: hidden;
    display: flex;
}
.red-btn {
    background: red;
    border-color: red;
}
@media screen and (min-width: 997px) {
.wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
}
}

.DStepArea{
    background: unset!important;
    padding:0!important;
}
.card{
    margin-top: 10px!important;
}
.card-body{
    padding: 0 !important;;
}
.card-body.shadow {
    padding-top: 0;
}
.DPublicationList {
    background: #fff;
    box-shadow: 1px 1px 5px rgb(0 0 0 / 20%) inset;
    width: 100%;
    margin-top: 20px;
}
a.add-to-cart:hover{
    color:white;
}
/* tab-style-end */
</style>
@section('content')
<main>

    <div class="container">
        <div class="row mt-3 pt-5" >
            <div class="col-lg-10 col-sm-12 offset-lg-1">
                <div>
                    <img src="{{asset('uploads/publication/'.$package->package_img)}}" alt="{{$package->package_name}}">
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-10 mx-auto">
                <div class="DetailsBody">
                <br>
                <span class="text-justify">
                <h4>{{$package->package_name}}</h4> 
                    <h3 title="{{$package->package_name}}">
                    @if($books_in_package)
                        @if(!empty($package->price))
                        <span class="h4 ml-2">Price:</span> <span class="text-success h4">&#2547; {{$package->regular_price}}</span> <span class="text-danger ml-2 mr-2 h4"> {{Off($package->regular_price,$package->price)}}% DISCOUNT </span> <a href="{{url('cart/'.$package->id)}}" class="add-to-cart" type="submit">Purchase Now</a></h4>
                         @endif
                    @endif</h3>
                    
                </span>
            
                <p class="text-justify" style="text-align:justify !important;"> {!! $package->package_desc !!}</p>
               
                <!-- </form> -->
                <br>
                </div>
           </div>
        </div>

            <div class="DStepArea">
        <div class="container">
            <div class="CatTitle">
                <h2 >The Package Includes the following books:  <span></span></h2>
            </div>
            <div class="DPublicationArea mb-4">
                <div class="row mx-auto">
                @foreach($books as $book) 
                    @foreach($books_in_package as $pac)
                        @if($pac->book_id == $book->id )
                        <a href="{{route('publication.details',[$book->id, $book->slug])}}">
                            <div class="card ml-4" style="width: 16rem;">
                            <div class="DPublicationList">
                            <div class="cImage">
                                @if(!empty($book->feature_img))
                                <img class="card-img-top" src="{{asset('uploads/book/'.$book->feature_img)}}" alt="Card image cap">
                                @else
                                <img src="{{asset('web/img/slider/utpal-shuvro2.jpg')}}" alt="{{$book->title}}">
                                @endif
                            </div>
                            <div class="card-body">
                            <div class="BorderLeft">
                            <h3 class="card-title">{{$book->name}}</h3>
                            </div>                       
                            <div class="PublicationTime text-center">
                                    <p class="Time"><i class="fa fa-calendar" aria-hidden="true"></i><b> Published:</b>
                                        {{$book->created_at->format('jS M, Y')}}</p>
                                </div>
                            </div>
                            </div>
                         </div>
                        </a>
                        @endif
                    @endforeach
                @endforeach
                </div>
              
          
    </div>
            </div>
        </div>
    </div>
    
</main>
@endsection
