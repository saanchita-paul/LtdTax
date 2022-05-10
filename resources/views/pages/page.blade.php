@extends('master')

@section('content') 

<main>

    <div class="container-fluid" id="news">
        <section class="PageTitleInner">
            <div class="PageTitleInnerBg" data-stellar-background-ratio="0.6" style="background-position: 50% -30.8px;">
            @if($page->page_img)
                    <img class="img-fluid single-news-img" alt="{{$page->name}}"
                        src="{{asset('uploads/page/'.$page->page_img)}}">
                    @else
                    <img class="img-fluid single-news-img" alt="{{$page->name}}"
                        src="{{asset('uploads/1.jpg')}}">
                    @endif
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="SectionTitle text-center wow fadeIn animated"
                            style="visibility: visible; animation-name: fadeIn;">
                            <p><span>{{$page->name}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="DNews">

                <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="DetailsBody">
                    <p> {!! $page->content !!}</p>
                </div>
                <br><br>
                <!-- <div class="RelatedArticles">
                    <div class="widget-title the-global-title mt-4">
                        <h4><a href="" rel="nofollow noopener">Related Articles</a><span
                                class="widget-title-icon fa"></span></h4>
                    </div>
                
                </div> -->

            </div>

        </div>
                   
                </div>
            </div>
        </div>
    </div>
</main>

@endsection