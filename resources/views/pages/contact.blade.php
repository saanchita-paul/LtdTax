@extends('master')

@section('content') 

<main>
    <div class="contact-area">
        <div class="container">
            <div class="map-nd-form-area">
                <p class="Heading wow fadeInDown animated text-center">
                    @if(!empty($contact->title))
                        {{$contact->title}}
                    @else
                        Get in Touch with Us
                    @endif
                </p>
                <div class="address-area">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                            <div class="single-address">
                                <div class="row h-100">
                                    <div class="col-md-12 m-auto">
                                        <div class="part-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="part-text">
                                            <span>
                                                @if(!empty($contact->phone1))
                                                <a href="callto:{{$contact->phone1}}">{{$contact->phone1}}</a> <br>
                                                @else
                                                <a href="callto:8801713185414">8801713185414</a> <br>
                                                @endif
                                                @if(!empty($contact->phone2))
                                                <a href="callto:{{$contact->phone2}}">{{$contact->phone2}}</a>
                                                @else
                                                <a href="callto:8801713185414">8801713185429</a>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                           <div class="single-address">
                                <div class="row h-100">
                                    <div class="col-md-12 m-auto">
                                        <div class="part-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="part-text">
                                            @if(!empty($contact->email))
                                            <span><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></span>
                                            @else
                                            <span><a href="mailto:infor@taxman.com">infor@taxman.com</a></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                           <div class="single-address">
                                <div class="row h-100">
                                    <div class="col-md-12 m-auto">
                                        <div class="part-icon">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <div class="part-text">
                                            @if(!empty($contact->web_url))
                                            <span><a href="{{$contact->web_url}}">{{$contact->web_url}}</a></span>
                                            @else
                                            <span><a href="https://www.thetaxmanltd.com/">https://www.thetaxmanltd.com/</a></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                            <div class="single-address">
                                <div class="row h-100">
                                    <div class="col-md-12 m-auto">
                                        <div class="part-icon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </div>
                                        <div class="part-text" style="top: 10px;padding-bottom: 10px;">
                                            @if(!empty($contact->address))
                                            <span>{{$contact->address}}</span>
                                            @else
                                            <span>House # 05, 3rd Floor, Road # 17, Block # E, Banani, Dhaka–1213, Bangladesh</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ContactBg">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="part-form">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                             @endif
                            @if(Session::has('success'))
                                <div class="alert alert-info">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form class="contact-form" action="/contactsend" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" name="name" id="name" required="" placeholder="Name">
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" name="email" id="email" required="" placeholder="Mail">
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" name="subject" id="subject" required="" placeholder="Subject">
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <textarea name="message" required="" id="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 text-center">
                                        <button type="submit" value="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        @if(!empty($contact->map_url))
                            <iframe src="{{$contact->map_url}}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        @else
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1389863.9951176567!2d88.54954275009054!3d22.86786926959688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9254f07c82b%3A0xfb8be384adebf83f!2sTaxman.com.bd!5e0!3m2!1sen!2sbd!4v1617532902288!5m" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
