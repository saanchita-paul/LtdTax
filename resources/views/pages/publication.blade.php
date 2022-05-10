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
                <div class="SectionTitle text-center wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <p><span>Publications</span></p>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
<div class="container">
    
    <div class="row">
        <div class="col-lg-10 col-sm-12 offset-lg-1">
            <div class="DPublicationText pt-4">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="Publications-List">
            @foreach($publication as $pub)
                <div class="PublicationListItem">
                    <div class="row">
                        <div class="col-lg-2 col-sm-3 pr-0">
                            <a href="{{asset('uploads/publication/'.$pub->file_upload)}}">
                            @if($pub->pub_img)
							<img class="img-responsive img100 border" alt="{{$pub->title}}" src="{{asset('uploads/publication/'.$pub->pub_img)}}" title="{{$pub->title}}" alt="{{$pub->title}}">
							@else
							<img class="img-responsive img100 border" alt="{{$pub->title}}" src="{{asset('uploads/1.jpg')}}" title="{{$pub->title}}" alt="{{$pub->title}}">
							@endif
                                
                            </a>
                        </div>
                        <div class="col-lg-8 col-sm-9 border-right-inner">
                        <a href="{{asset('uploads/publication/'.$pub->file_upload)}}">
                            <div class="Desc">
                                <h3 class="Title">{{$pub->title}}</h3>
                                <p class="Brief">{{$pub->short_desc}}</p>
                                <!-- <p class="Writter"><b>Editor(s):</b> <span>Prof. Dr. M. Feroze Ahmed</span>,  <span>Prof. Dr. M. Ashraf Ali</span>  and <span>Dr. Zafar Adeel</span> - July 2020</p> -->
                                <p class="Edition"><i class="fa fa-pencil-square-o"></i> First Edition: {{$pub->created_at->format('jS M, Y')}}</p>
                            </div>   
                            </a>
                        </div>
                        <div class="col-lg-2 col-sm-3">
                            <div class="row h-100">
                                <div class="col-sm-12 text-center m-auto">
                                    <!-- <p class="Price">$1,000,000</p> -->
                                    <a href="{{asset('uploads/publication/'.$pub->file_upload)}}" target="_blank" class="btn btn-default btn-small">View</a>
                                    <!-- <a href="" class="btn btn-default btn-small Dwonload">Download</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <br>
                @endforeach
            </div>
            
            <div id="btnDiv" class="mt-4 load-more text-center">
            {!! $publication->appends(['sort' => 'publications'])->links() !!}
            </div> 
        </div>

    </div>
        
</div>
</main>



@endsection
