@extends('layouts.frontend')
@section('content')
    <section class="wpo-contact-section section-padding">
        <div class="container">
            <div class="wpo-contact-section-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="wpo-contact-form-area">
                            <h2>Service Request</h2>
                            <form method="post" class="contact-validation-active" id="login-form" action="#">
                                @csrf
                                <div>
                                    <input type="text" class="form-control" name="name" id="c-name"
                                           placeholder="Your Name*" required value="{{old('name')}}">
                                </div>
                                <div>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                           placeholder="Email*" required autocomplete="email" autofocus>
                                </div>
                                <div>
                                    <select name="subject" class="form-control" required>
                                        <option disabled="disabled" selected>Service</option>
                                        <option value="visit_visa">Visit Visa</option>
                                        <option value="student_visa">Student Visa</option>
                                        <option value="work_permit">Work permit</option>
                                        <option value="immigration">Immigration</option>
                                        <option value="appeal">Appeal</option>
                                        <option value="eca">ECA</option>
                                        <option value="nca">NCA</option>
                                        <option value="nid">NID</option>
                                        <option value="passport">Passport</option>
                                        <option value="police_clearance">Police clearance </option>
                                        <option value="immigration_clearance">Immigration clearance</option>
                                        <option value="unmarried_certificate">Unmarried certificate</option>
                                        <option value="Notary_Affidavit">Notary & Affidavit</option>
                                        <option value="special_marriage">Special Marriage</option>
                                    </select>
                                </div>
                                <div class="fullwidth">
                                    <textarea class="form-control" name="note" id="c-note"
                                              placeholder="Message..." required></textarea>
                                </div>
                                <div>
                                    <input type="checkbox" name="remember" id="remember">
                                    <label class="fontsize" for="remember">Remember me</label>
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn-s2">Submit</button>
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
                    <span></span>
                </div>
            </div>
        </div>
    </section>
@endsection
