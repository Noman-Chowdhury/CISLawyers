@extends('layouts.frontend')
@section('content')
    {{--    Slider Section--}}
    <section class="wpo-hero-slider" style="height: 600px !important;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($sliderImages as $image)
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image"
                             data-background="{{ asset(config('imagepath.slider').$image->filename) }}">
                            <div class="container-fluid">
                                <div class="slide-content">
                                    <div data-swiper-parallax="300" class="slide-title">
                                        <h2>{{ $image->title?? '' }}</h2>
                                    </div>
                                    <div data-swiper-parallax="400" class="slide-text">
                                        <p>{{ $image->text?? '' }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div data-swiper-parallax="500" class="slide-btns">
                                        {{-- <a href="{{ route('aboutus') }}" class="theme-btn-s2">Explore more</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    {{--    Feature Section--}}
    <section class="wpo-features-section section-padding">
        @php
            if(isset($home)){
            $feature=json_decode($home->feature);
            $law = json_decode($home->law);
            $client = json_decode($home->client);
                        }
        @endphp
        <div class="container">
            <div class="wpo-features-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wpo-features-item">
                            <div class="wpo-features-icon">
                                <div class="icon">
                                    <i class="fi flaticon-badge"></i>
                                </div>
                            </div>
                            <div class="wpo-features-text">
                                <h2><a href="{{ $feature->feature->left->url ?? '#' }}">{{$feature->feature->left->title ?? ' '}}</a></h2>
                                <p>{{$feature->feature->left->text ?? ' '}}.</p>
                            </div>
                            <div class="visible-icon">
                                <i class="fi flaticon-badge"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wpo-features-item">
                            <div class="wpo-features-icon">
                                <div class="icon">
                                    <i class="fi flaticon-diary"></i>
                                </div>
                            </div>
                            <div class="wpo-features-text">
                                <h2><a href="{{ $feature->feature->middle->url ?? '#' }}">{{$feature->feature->middle->title ?? ' '}}</a></h2>
                                <p>{{$feature->feature->middle->text ?? ' '}}.</p>
                            </div>
                            <div class="visible-icon">
                                <i class="fi flaticon-diary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wpo-features-item">
                            <div class="wpo-features-icon">
                                <div class="icon">
                                    <i class="fi flaticon-support"></i>
                                </div>
                            </div>
                            <div class="wpo-features-text">
                                <h2><a href="{{ $feature->feature->right->url ?? '#' }}">{{$feature->feature->right->title ?? ' '}}</a></h2>
                                <p>{{$feature->feature->right->text ?? ' '}}.</p>
                            </div>
                            <div class="visible-icon">
                                <i class="fi flaticon-support"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Section-->
    <section class="wpo-contact-section section-padding">
        <div class="container">
            <div class="wpo-contact-section-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="wpo-contact-form-area">
                            <h2>Free Consulting</h2>
                            <form method="post" class="contact-validation-active" id="contact-form-main">
                                <div>
                                    <input type="text" class="form-control" name="name" id="c-name"
                                           placeholder="Your Name*">
                                </div>
                                <div>
                                    <input type="email" class="form-control" name="email" id="c-email"
                                           placeholder="Your Email*">
                                </div>
                                <div>
                                    <select name="subject" class="form-control">
                                        <option disabled="disabled" selected>Subject</option>
                                        <option>Family Law</option>
                                        <option>Personal Injury</option>
                                        <option>Criminal Law</option>
                                        <option>Education Law</option>
                                        <option>Business Law</option>
                                    </select>
                                </div>
                                <div class="fullwidth">
                                    <textarea class="form-control" name="note" id="c-note"
                                              placeholder="Message..."></textarea>
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn">Make An Appointment</button>
                                    <div id="c-loader">
                                        <i class="ti-reload"></i>
                                    </div>
                                </div>
                                <div class="clearfix error-handling-messages">
                                    <div id="c-success">Thank you</div>
                                    <div id="c-error"> Error occurred while sending email. Please try again later.
                                    </div>
                                </div>
                            </form>
                            <div class="border-style"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="wpo-contact-content">
                            <h2>We are here to fight against any violance with experience</h2>
                            <div class="wpo-contact-content-inner">
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                    in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                    old.</p>
                                <p>and going through the cites of the word in classical literature, discovered the
                                    undoubtable source. Lorem Ipsum comes from sections.</p>
                                <div class="signeture">
                                    <h4>Mertie Warrior</h4>
                                    <p>Vertex Chambers, CEO</p>
                                    <span><img src="assets/images/signeture.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visible-text">
                    <span>C</span>
                </div>
            </div>
        </div>
    </section>
{{--    Law Section--}}
    <section class="wpo-service-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="wpo-section-title">
                        <h2>{{ $feature->law->header->left ?? '' }}</h2>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
                    <div class="wpo-section-title">
                        <p>{{ $feature->law->header->right ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-4 col-12 service-thumbs">
                    <div class="service-thumbs-outer">
                        @foreach($laws as $law)
                        <div class="service-thumb @if($loop->iteration ==2) active-thumb @endif" data-case="#service-content-{{$law->id}}">
                            <p>{{ $law->name }}</p>
                            <span class="number">{{ $loop->iteration }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col col-lg-8 col-12 service-content">
                    <div class="service-content-outer">
                        @foreach($laws as $law)
                        <div class="service-data  @if($loop->iteration ==2) active-service-data @endif" id="service-content-{{ $law->id }}">
                            <div class="service-data-img">
                                <img src="{{asset(config('imagepath.law').$law->image)}}" alt="{{ $law->name }}" height="90%" width="90%">
                                <div class="service-data-text">
                                    <h3><a href="#">{{ $law->name }}</a></h3>
                                    <p>{{ $law->content }} <a href="#">More About..</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wpo-case-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="wpo-section-title">
                        <h2>Resent Case Studies & Our
                            Best Work.</h2>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
                    <div class="wpo-section-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="sortable-gallery">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="gallery-filters case-menu">
                            <ul>
                                <li><a data-filter="*" href="#" class="current">All Project</a></li>
                                <li><a data-filter=".business" href="#">Business</a></li>
                                <li><a data-filter=".criminal" href="#">Criminal</a></li>
                                <li><a data-filter=".family" href="#">Family Matter</a></li>
                                <li><a data-filter=".real" href="#">Real Estate</a></li>
                                <li><a data-filter=".personal" href="#">Personal Injury</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="clearfix case-grids gallery-container">
                            <div class="grid business real">
                                <div class="img-holder">
                                    <img src="assets/images/case/img-1.jpg" alt>
                                    <div class="hover-content">
                                        <a class="theme-btn" href="#">Criminal Law</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid family">
                                <div class="img-holder">
                                    <img src="assets/images/case/img-2.jpg" alt>
                                    <div class="hover-content">
                                        <a class="theme-btn" href="#">Family Law</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid business real personal">
                                <div class="img-holder">
                                    <img src="assets/images/case/img-3.jpg" alt>
                                    <div class="hover-content">
                                        <a class="theme-btn" href="#">Business Law</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid criminal family">
                                <div class="img-holder">
                                    <img src="assets/images/case/img-4.jpg" alt>
                                    <div class="hover-content">
                                        <a class="theme-btn" href="#">Real Estate</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid criminal personal real">
                                <div class="img-holder">
                                    <img src="assets/images/case/img-5.jpg" alt>
                                    <div class="hover-content">
                                        <a class="theme-btn" href="#">Personal Injury</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid business family personal">
                                <div class="img-holder">
                                    <img src="assets/images/case/img-6.jpg" alt>
                                    <div class="hover-content">
                                        <a class="theme-btn" href="#">Family Law</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wpo-testimonials-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <div class="wpo-section-title">
                        <h2>{{ $client->client->title ?? '' }}</h2>
                        <p>{{ $client->client->text ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="wpo-testimonial-wrap owl-carousel">
                        <div class="wpo-testimonial-item">
                            <p>“There are many variations of passages of Lorem Ipsum available, but the majority
                                have suffered alteration in some form, by injected humour variations incididunt ut
                                labore et dolore. Quis ipsum suspendisse ultrices gravida.”</p>
                            <div class="wpo-testimonial-info">
                                <div class="wpo-testimonial-info-img">
                                    <img src="assets/images/testimonial/img-1.jpg" alt="">
                                </div>
                                <div class="wpo-testimonial-info-text">
                                    <h5>Robert William</h5>
                                    <span>CEO & Founder </span>
                                </div>
                            </div>
                        </div>
                        <div class="wpo-testimonial-item">
                            <p>“There are many variations of passages of Lorem Ipsum available, but the majority
                                have suffered alteration in some form, by injected humour variations incididunt ut
                                labore et dolore. Quis ipsum suspendisse ultrices gravida.”</p>
                            <div class="wpo-testimonial-info">
                                <div class="wpo-testimonial-info-img">
                                    <img src="assets/images/testimonial/img-2.jpg" alt="">
                                </div>
                                <div class="wpo-testimonial-info-text">
                                    <h5>Ken Williamson</h5>
                                    <span>CEO & Founder </span>
                                </div>
                            </div>
                        </div>
                        <div class="wpo-testimonial-item">
                            <p>“There are many variations of passages of Lorem Ipsum available, but the majority
                                have suffered alteration in some form, by injected humour variations incididunt ut
                                labore et dolore. Quis ipsum suspendisse ultrices gravida.”</p>
                            <div class="wpo-testimonial-info">
                                <div class="wpo-testimonial-info-img">
                                    <img src="assets/images/testimonial/img-3.jpg" alt="">
                                </div>
                                <div class="wpo-testimonial-info-text">
                                    <h5>David Miller</h5>
                                    <span>CEO & Founder </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wpo-team-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="wpo-section-title">
                        <h2>Meet Our Most Talented &
                            Qualified Attorneys</h2>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
                    <div class="wpo-section-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="wpo-team-wrap">
                <div class="row">
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="wpo-team-item">
                            <div class="wpo-team-img">
                                <img src="assets/images/team/img-1.jpg" alt="">
                                <div class="social">
                                    <ul>
                                        <li class="switch"><i class="ti-plus"></i></li>
                                        <li class="on"><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wpo-team-text">
                                <h2><a href="#">Jenelia Orkid</a></h2>
                                <span>Family Lawyer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="wpo-team-item">
                            <div class="wpo-team-img">
                                <img src="assets/images/team/img-2.jpg" alt="">
                                <div class="social">
                                    <ul>
                                        <li class="switch"><i class="ti-plus"></i></li>
                                        <li class="on"><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wpo-team-text">
                                <h2><a href="#">David Harry</a></h2>
                                <span>Criminal Lawyer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="wpo-team-item">
                            <div class="wpo-team-img">
                                <img src="assets/images/team/img-3.jpg" alt="">
                                <div class="social">
                                    <ul>
                                        <li class="switch"><i class="ti-plus"></i></li>
                                        <li class="on"><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wpo-team-text">
                                <h2><a href="#">Darothy Jane</a></h2>
                                <span>Business Lawyer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="wpo-team-item">
                            <div class="wpo-team-img">
                                <img src="assets/images/team/img-4.jpg" alt="">
                                <div class="social">
                                    <ul>
                                        <li class="switch"><i class="ti-plus"></i></li>
                                        <li class="on"><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li class="on"><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wpo-team-text">
                                <h2><a href="#">John Albart</a></h2>
                                <span>Family Lawyer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
