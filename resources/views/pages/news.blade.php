@extends('master')

@section('content')
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
                            <p><span>Latest News</span></p>
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
                        @foreach($news as $new)
                        <div class="col-lg-4 col-sm-6 d-flex">
                            <div class="DInnerBlogList align-self-stretch">
                                <a href="{{route('news.details',[$new->id,$new->slug])}}">
                                    <div class="Imgresize">
                                        <figure class="ImgViewer">
                                            <picture class="FixingRatio">
                                            @if($new->feature_img)
                                                <img class="img-fluid news-page-img" alt="{{$new->name}}"
                                                    src="{{asset('uploads/news/'.$new->feature_img)}}">

                                                  @else
                                    <img src="{{asset('web/img/slider/utpal-shuvro2.jpg')}}"
                                                alt="{{$new->name}}">
                                            @endif
                                            </picture>
                                        </figure>
                                    </div>
                                    <div class="Desc">
                                        <div class="FixHeight">
                                            <h3 class="Title">{{$new->name}}
                                            </h3>
                                            <p class="Brief">{{$new->short_desc}}</p>
                                        </div>
                                        <p class="Writter">{{$new->created_at->format('jS M, Y')}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                       


                      
                    </div>
                    <div class="pagination d-flex justify-content-center">
                    {!! $news->appends(['sort' => 'news'])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
