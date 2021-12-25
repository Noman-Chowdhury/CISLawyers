@extends('layouts.frontend')
@section('content')
    <!--Contact Section-->
    <section class="wpo-contact-section section-padding">
        <div class="container">
            <div class="wpo-contact-section-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="wpo-contact-form-area">
                            <h2>Contact</h2>
                            <form class="contact-validation-active" id="contact-form-main">
                                <div>
                                    <input type="text" class="form-control" name="name" id="c-name"
                                           placeholder="Your Name*">
                                </div>
                                <div>
                                    <input type="email" class="form-control" name="email" id="c-email"
                                           placeholder="Your Email*">
                                </div>
                                <div class="fullwidth">
                                    <textarea class="form-control" name="note" id="c-note"
                                              placeholder="Message..."></textarea>
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn">Submit</button>
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
{{--                <div class="visible-text">--}}
{{--                    <span>C</span>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

@endsection

