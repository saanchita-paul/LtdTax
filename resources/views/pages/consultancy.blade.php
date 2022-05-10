@extends('master')

@section('content')

<main>
    <div class="container-fluid " id="news">
        <section class="PageTitleInner">
            <div class="PageTitleInnerBg" data-stellar-background-ratio="0.6" style="background-position: 50% -30.8px;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="SectionTitle text-center wow fadeIn animated"
                            style="visibility: visible; animation-name: fadeIn;">
                            <p><span>Consultancy</span></p>
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
                        @foreach($consult as $con)
                        <div class="col-lg-4 col-sm-6 d-flex">
                            <div class="DInnerBlogList align-self-stretch">
                                <a href="{{route('consultancy.details',[$con->id,$con->slug])}}">
                                    <!-- <div class="Imgresize">
                                        <figure class="ImgViewer">
                                            <picture class="FixingRatio">
                                                @if($con->bg_img)
                                                <img class="img-fluid news-page-img" alt="{{$con->title}}"
                                                    src="{{asset('uploads/training/'.$con->bg_img)}}">
                                                @else
                                                <img class="img-fluid news-page-img" alt="{{$con->title}}"
                                                    src="{{asset('uploads/1.jpg')}}">
                                                @endif
                                            </picture>
                                        </figure>
                                    </div> -->
                                    <div class="Desc">
                                        <div class="FixHeight">
                                            <h3 class="Title">{{$con->title}}</h3>
                                            <!-- <p class="Brief">{{$con->introduction}}</p> -->
                                        </div>
                                        <p class="Writter">{{$con->created_at}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="pagination d-flex justify-content-center">

                        {!! $consult->appends(['sort' => 'consultancies'])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection
