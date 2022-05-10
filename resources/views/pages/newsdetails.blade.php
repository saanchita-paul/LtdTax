@extends('master')

@section('content')

<main>
    <div class="container">
        
        <div class="row">

            <div class="col-lg-8 offset-2 col-sm-12">
            <ul class="DBreadCum">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active"><a href="">{{$news->name}}</a></li>
        </ul>
                <div class="DetailsBody">
                    <h1 class="Title">{{$news->name}}</h1>

                    <p class="date"> <span class="Info2">{{$news->created_at->format('jS M, Y')}}</span></p>
                    @if($news->feature_img)
                    <img class="img-fluid single-news-img" alt="{{$news->name}}"
                        src="{{asset('uploads/news/'.$news->feature_img)}}">
                    @else
                    <img class="img-fluid single-news-img" alt="{{$news->name}}"
                        src="{{asset('uploads/1.jpg')}}">
                    @endif

                    <br>
                    <p class="Intro">{{$news->short_desc}}</p>
                    <p> {!! $news->description !!}</p>
                </div>
                <div class="DCommentArea mt-2 border text-center">
                    <div class="row">
                        <div class="col-sm-3">
                            <p>Share This Article: </p>
                        </div>
                        <div class="col-sm-6">


                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>

                        </div>
                    </div>

                </div>
                <br><br>
              

            </div>

        </div>
    </div>

</main>
<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fa108bfc648df27"></script>
@endsection
