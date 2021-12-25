@php
    $setting = \App\Models\AdminSetting::first();
@endphp
<footer class="wpo-site-footer">
  <div class="wpo-upper-footer">
    <div class="container">
      <div class="row">
        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
          <div class="widget about-widget">
            <div class="logo widget-title">
              <img src="{{(asset('/images'.$setting->logo ??''))}}"
                alt="logo">
            </div>
            <p>Dhaka, Bangladesh</p>
          </div>
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
          <div class="widget link-widget">
            <div class="widget-title">
              <h3>Our Services</h3>
            </div>
            <ul>
              <li><a href="#">Personal Injury</a></li>
              <li><a href="#">Real Estate Law</a></li>
              <li><a href="#">Criminal Law</a></li>
              <li><a href="#">Education Law</a></li>
              <li><a href="#">Business Law</a></li>
            </ul>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="widget tag-widget">
            <div class="widget-title">
              <h3>Browse by Tag</h3>
            </div>
            <ul>
              <li><a href="#">Lawyer</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Injury</a></li>
              <li><a href="#">Real Estate</a></li>
              <li><a href="#">Medical</a></li>
              <li><a href="#">Criminal</a></li>
              <li><a href="#">Politics</a></li>
              <li><a href="#">Law</a></li>
            </ul>
          </div>
        </div>
        <div class="col col-lg-2 col-md-6 col-sm-12 col-12">
          <div class="widget social-widget">
            <div class="widget-title">
              <h3>Social Media</h3>
            </div>
            <ul>
              <li><a href="#" target="_blank"><i class="ti-facebook"></i>
                  Facebook</a></li>
              <li><a href="#" target="_blank"><i class="ti-twitter-alt"></i>
                  Twitter</a></li>
              <li><a href="#" target="_blank"><i class="ti-linkedin"></i>
                  LinkedIn</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wpo-lower-footer">
    <div class="container">
      <div class="row">
        <div class="col col-xs-12">
          <p class="copyright">Copyright &copy; 2021 <a href="{{ url('/') }}"
              target="_blank">CIS Lawyers</a>. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
