@extends('master')

@section('content')

<main>
    <div class="container">
        <ul class="DBreadCum">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active"><a href="">{{$consult->title}}</a></li>
        </ul>
        <div class="row">
            <div class="col-lg-8 col-sm-12">

                <div class="DetailsBody">
                    <h1 class="Title">{{$consult->title}}</h1>
                    <p class="date"> <span class="Info2">{{$consult->created_at->format('jS M, Y')}}</span></p>
                    <p> {!! $consult->content !!}</p>
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
                <!-- <div class="RelatedArticles">
                    <div class="widget-title the-global-title mt-4">
                        <h4><a href="" rel="nofollow noopener">Related Articles</a><span
                                class="widget-title-icon fa"></span></h4>
                    </div>
                
                </div> -->

            </div>

            <div class="col-lg-4 col-sm-12">

                <div class="DPublication mb-4">
                    <div class="widget-title the-global-title">
                        <h4><a href="" rel="nofollow noopener">More Consultancy</a><span
                                class="widget-title-icon fa"></span></h4>
                    </div>

                    <div class="PublicationListArea">
                        <ul class="PublicationList">
                        @foreach($more_consultancy as $cons)
                            <li class="mb-3"><a href="{{route('consultancy.details',[$cons->id,$cons->slug])}}"><strong><i style="color:#005A13;" class="fa fa-dot-circle-o" aria-hidden="true"></i> <span class="ml-1">{{$cons->title}}</span></strong></a></li>
                        @endforeach
                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </div>

</main>

<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fa108bfc648df27"></script>



@endsection
