@extends('master')

@section('content')
<style>
.foundar-image {
    margin-top: 86px;
}
</style>
<main>
        <div class="founder-ms-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <aside>
                            <div class="ab-us-title-nab">
                                <p>About Us</p>
                            </div>
                            <div class="nav-wrapper">
                                <a href="/founder_message">
                                    Founder Message
                                </a>
                                <a href="/history">
                                    History
                                </a>
                                <a href="/mission_vision">
                                    Mission-Vission
                                </a>
                                <a href="/objectives">
                                    Objectives
                                </a>
                                <a href="/award_achievements">
                                    Award & Achievements
                                </a>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-6">
                        <div class="ab-us-content mt-20">
                            <div class="founder-title-text">
                                <h5 class="text-center">Founder's Message</h5>
                            </div>
                            <div class="founder-text">
                                <p>{!! $page->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if(!empty($founder->founder_name) && !empty($founder->founder_img))
                        <div class="col-lg-3">
                            <div class="foundar-image text-center">
                                <img src="{{asset('uploads/page/'.$founder->founder_img)}}" title="Photo of {{$founder->founder_name}}" alt="{{$founder->founder_name}}">
                            </div>
                            <div class="founder-name text-center">
                                <h5 title="{{$founder->founder_name}}">{{$founder->founder_name}}</h5>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-3">
                            <div class="foundar-image text-center">
                                <img src="{{asset('uploads/page/mr-mowla.jpeg')}}" title="Photo of Mowla Mohammad " alt="Mowla Mohammad, FCA">
                            </div>
                            <div class="founder-name text-center">
                                <h5 title="Mowla Mohammad, FCA">Mowla Mohammad, FCA</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection
