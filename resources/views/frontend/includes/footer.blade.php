  <!--Footer Section Start -->
        <footer class="footer-section fix bg-cover" style="background-image: url({{ asset('assets/img/home-1/footer-bg.jpg') }});">
            <div class="container">
                <div class="footer-wrapper">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-item">
                                <h2>
                                    <a href="tel:{{ $settings["CONTACT_PHONE"] }}">{{ $settings["CONTACT_PHONE"] }}</a>
                                </h2>
                                <h2 class="text">{{ $settings["CONTACT_ADDRESS"] }}</h2>
                                <div class="footer-list-item">

                                    <a href="{{ route('frontend') }}">
                                        <img src="{{ asset("uploads/" . $settings["SETTING_SITE_LOGO"]) }}" alt="img">
                                    </a>
                                    <ul class="footer-list">
                                        <li>
                                            <a href="{{ route('frontend') }}">
                                                    Home
                                                </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.about') }}">About Us</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('frontend.our-team') }}">Our Team</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.contact') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                    <div class="social-icon">
                                        <a href="{{ $settings["SETTING_SOCIAL_FACEBOOK"] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                         <a href="{{ $settings["SETTING_SOCIAL_TWITTER"] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $settings["SETTING_SOCIAL_YOUTUBE"] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                        <a href="{{ $settings["SETTING_SOCIAL_LINKEDIN"] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--Footer-Bottom Section Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-wrapper">
                    <p>
                        Copyright© <span>uni-matchglobal</span> All Rights Reserved.
                    </p>
                    <ul class="bottom-list">
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
