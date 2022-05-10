@extends('master')

@section('content')
<main>

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
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-2 col-sm-12">
                <div class="Dbooks">

                    <div class="row">
                        @foreach($books as $book)
                    <figure>
                        <a href="{{route('books.single',[$book->id,$book->slug])}}">
                        @if($book->feature_img)
                    <img src="{{asset('uploads/book/'.$book->feature_img)}}" alt="{{$book->name}}">
                    @else
                    <img src="{{asset('uploads/book/chollis-1619418341.jpg')}}" alt="{{$book->name}}"> 
                    @endif
                    </a>
                    <figcaption><a href="{{route('books.single',[$book->id,$book->slug])}}">{{$book->name}}</a></figcaption>
                    <p class="mb-2">by {{$book->author_name}}</p>
                    <span class="price">Price @if($book->sale_price) <del class="text-muted">TK. {{$book->regular_price}} </del> TK. {{$book->sale_price}} @else TK. {{$book->regular_price}} @endif</span>
                    <a class="button" href="{{url('cart/'.$book->id)}}"><i class="fa fa-shopping-cart mr-1"></i> Add to Cart</a>
                </figure> 
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
