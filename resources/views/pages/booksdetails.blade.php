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
/* tab-style-end */
</style>
@section('content')
<main >

<div class="container-fluid pbooks" id="news">
        <section class="PageTitleInner">
            <div class="PageTitleInnerBg" data-stellar-background-ratio="0.6" style="background-position: 50% -30.8px;">
         
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="SectionTitle text-center wow fadeIn animated"
                            style="visibility: visible; animation-name: fadeIn;">
                            <p><span>Books</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<div class="container mb-4">
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session()->get('success') }}
</div>
@endif
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <section id="default" class="padding-top0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="xzoom-container">
                                <img class="xzoom img-responsive img100 Ratio Ratio16x9" id="xzoom-default" data-aspectratio="" src="{{asset('uploads/book/'.$books->feature_img)}}" title="" alt="">
                                <div class="xzoom-thumbs">
                                    <a href="{{asset('uploads/book/'.$books->feature_img)}}"><img class="xzoom-gallery img-responsive img100" src="{{asset('uploads/book/'.$books->feature_img)}}"  xpreview="{{asset('uploads/book/'.$books->feature_img)}}" title="The description goes here"></a>
                                    @foreach($book_gallary as $gallery)
                                    <a href="{{asset('uploads/book/'.$gallery->name)}}"><img class="xzoom-gallery img-responsive img100" src="{{asset('uploads/book/'.$gallery->name)}}" title="The description goes here"></a>
                                    @endforeach     
                                    <!--<a href="media/imgAll/mars.jpg"><img class="xzoom-gallery img-responsive img100" src="media/imgAll/mars.jpg"  xpreview="media/imgAll/mars.jpg" title="The description goes here"></a>-->
                                    <!--<a href="media/imgAll/pluton.jpg"><img class="xzoom-gallery img-responsive img100" src="media/imgAll/pluton.jpg"  xpreview="media/imgAll/pluton.jpg" title="The description goes here"></a>-->
                                    <!--<a href="media/imgAll/saturne.jpg"><img class="xzoom-gallery img-responsive img100" src="media/imgAll/saturne.jpg"  xpreview="media/imgAll/saturne.jpg" title="The description goes here"></a>-->
                                    <!--<a href="media/imgAll/111.jpg"><img class="xzoom-gallery img-responsive img100" src="media/imgAll/111.jpg"  xpreview="media/imgAll/111.jpg" title="The description goes here"></a>-->
                                </div>
                                <!-- <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                </ul> -->
                            </div>        
                        </div>
                    </div>
                    </section>
                    <!-- <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                      <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    </ul> -->
                    
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $books->name}}</h3>
                    <!--<div class="rating">-->
                    <!--    <div class="stars">-->
                    <!--        <span class="fa fa-star checked"></span>-->
                    <!--        <span class="fa fa-star checked"></span>-->
                    <!--        <span class="fa fa-star checked"></span>-->
                    <!--        <span class="fa fa-star"></span>-->
                    <!--        <span class="fa fa-star"></span>-->
                    <!--    </div>-->
                    <!--    <span class="review-no">41 reviews</span>-->
                    <!--</div>-->
                    <p class="product-description">{{ $books->short_desc}}</p>
                    @if($books->sale_price != '')
                    <h4 class="price">Current Price: <span>৳ {{ $books->sale_price}}</span> <del>৳ {{ $books->regular_price}}</del></h4>
                    @else
                    <h4 class="price">Current Price: <span>৳ {{ $books->regular_price}}</span></h4>
                    @endif
              <form action="{{url('/cartadd/'.$books->id)}}" method="post">
              @csrf
                    <div class="action">

                        <span class="button quantity">-</span>
                        <input type="number" name="qty" class="input quantity" oninput="maxLengthCheck(this)" maxLength="3" style="height:37px;" value="1" min="1" />
                        <span class="button quantity">+</span>
                
                    <button class="add-to-cart" type="submit">Add to cart</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>
@if ($errors->any())
<div class="alert alert-warning" role="alert">
<strong>Warning! </strong> @if ($errors->count() == 1)
{{$errors->first()}}
@else
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
</div>
@endif

<div class="review-section mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Write Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p class="p-2">{!! $books->description!!}.</p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <ul class="tab-content">
                                <li>
                                    <h5>Customer Reviews</h5>
                                </li>
                                @if($reviews->count() > 0)
                                @foreach( $reviews as $review) 
                                <li>
                                <?php for ($i=1; $i <= $review->rating; $i++) { 
                                 echo '<span class="mdi mdi-star"></span>';
                                 } ?>
                                </li>
                                <?php  $user=App\Models\User::where('id',$review->user_id)->first();?>
                                <li>
                              
                                <strong>{{$user->name}} {{$user->lname}}</strong>  <span>on</span> <span>{{$review->created_at}}</span></h6>
                                <p class="review-comment pt-2 pb-2">{{ $review->review}}</p>
                                </li> <br>
                                @endforeach
                                @else
                                <li>No reviews found.</li>
                                @endif
                                
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="rating-section">
                                <h5 class="pl-3">Write Your Review and Rating</h5>
                                <form method="post"
                                    action="{{url('/book/review/'.$books->id)}}">
                                    @csrf
                                <div class="star-rating">
                                    <input id="star-5" type="radio" name="rating" value="5" />
                                    <label for="star-5" title="5 stars">
                                        <i class="active fa fa-star" aria-hidden="true"></i>
                                    </label>
                                    <input id="star-4" type="radio" name="rating" value="4" />
                                    <label for="star-4" title="4 stars">
                                        <i class="active fa fa-star" aria-hidden="true"></i>
                                    </label>
                                    <input id="star-3" type="radio" name="rating" value="3" />
                                    <label for="star-3" title="3 stars">
                                        <i class="active fa fa-star" aria-hidden="true"></i>
                                    </label>
                                    <input id="star-2" type="radio" name="rating" value="2" />
                                    <label for="star-2" title="2 stars">
                                        <i class="active fa fa-star" aria-hidden="true"></i>
                                    </label>
                                    <input id="star-1" type="radio" name="rating" value="1" />
                                    <label for="star-1" title="1 star">
                                        <i class="active fa fa-star" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="widget-area no-padding blank">
                                    <div class="status-upload">
                                            <textarea name="review" class="form-control mb-3" rows="5" placeholder="Write Your Review"></textarea>
                                            @if(Auth::user())
                                            <button type="submit" class="btn btn-success green ml-4">
                                                Submit</button>
                                                @else
                                                <button type="submit" disabled class="btn btn-success green ml-4">
                                                Submit</button> <span>Please first login then rating and review submit</span>
                                                @endif
                                       
                                    </div>
                                    </form>
                                    <!-- Status Upload  -->
                                </div>
                                <!-- Widget Area -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
