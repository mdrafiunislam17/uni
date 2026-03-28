
        <!-- Header-Top-Section Start -->
        {{-- <div class="header-top-section">
            <div class="container-fluid">
                <div class="header-top-wrapper">
                    <div class="header-left">
                        <ul class="list">
                            <li class="style-2">
                                <span>Help Line</span>
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+093783575222">+09 378 357 5222</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                69 Street, 5th AvenueLA, United States
                            </li>
                             <li>
                                <i class="fa-solid fa-envelope"></i>
                                <a href="mailto:info@example.com">info@example.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-right">
                        <div class="flag-wrap">
                            <div class="flag">
                               <i class="fa-solid fa-globe"></i>
                            </div>
                            <div class="nice-select" tabindex="0">
                                <span class="current">
                                    English
                                </span>
                                <ul class="list">
                                    <li data-value="1" class="option selected focus">
                                        English
                                    </li>
                                    <li data-value="1" class="option">
                                        Bangla
                                    </li>
                                    <li data-value="1" class="option">
                                        Hindi
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="social-item">
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Offcanvas Area Start -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="{{ route('frontend') }}">
                                    <img src="{{ asset("uploads/" . $settings["SETTING_SITE_LOGO"]) }}" alt="logo-img">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text d-none d-xl-block">
                            Nullam dignissim, ante scelerisque the  is euismod fermentum odio sem semper the is erat, a feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                        </p>
                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact d-xl-block">
                            <h4 class="d-xl-block">Contact Info</h4>
                            <ul class="d-xl-block">
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">{{ $settings["CONTACT_ADDRESS"] }}</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:{{ $settings["CONTACT_EMAIL"] }}"><span class="mailto:{{ $settings["CONTACT_EMAIL"] }}">{{ $settings["CONTACT_EMAIL"] }}</span></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Mon - Fri, 9:00 am to 6:00 pm</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:{{ $settings["CONTACT_PHONE"] }}">{{ $settings["CONTACT_PHONE"] }}</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="social-icon d-flex align-items-center">
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
        <div class="offcanvas__overlay"></div>

        <!-- Header Section Start -->
         <header id="header-sticky" class="header-1">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo">
                                <a href="{{ route('frontend') }}" class="header-logo-2">
                                    <img src="{{ asset("uploads/" . $settings["SETTING_SITE_LOGO"]) }}" alt="logo-img">
                                </a>
                            </div>
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="has-dropdown active menu-thumb">
                                                <a href="{{ route('frontend') }}">
                                                    Home
                                                </a>

                                            </li>

                                            <li>
                                                <a href="{{ route('frontend.about') }}">About Us</a>
                                            </li>
                                            {{-- <li class="has-dropdown">
                                                <a href="news-details.html">
                                                    Pages
                                                </a>
                                                <ul class="submenu">
                                                    <li class="has-dropdown">
                                                        <a href="service-details.html">
                                                            Service
                                                            <i class="fas fa-angle-right"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="service.html">Service</a></li>
                                                            <li><a href="service-details.html">Service Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-dropdown">
                                                        <a href="project-details.html">
                                                            Country List
                                                            <i class="fas fa-angle-right"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="country-list.html">Country List</a></li>
                                                            <li><a href="country-details.html">Country Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="pricing.html">Our Pricing</a></li>
                                                    <li><a href="appointment.html">Appointment</a></li>
                                                    <li><a href="404.html">404 Page</a></li>
                                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="country-details.html">
                                                    VISA
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="country-list.html">Visa List</a></li>
                                                    <li><a href="country-details.html">Visa Details</a></li>
                                                </ul>
                                            </li>
                                           <li>
                                                <a href="news-details.html">
                                                    Blog
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="news-grid.html">Blog Grid</a></li>
                                                    <li><a href="news.html">Blog Standard</a></li>
                                                    <li><a href="news-details.html">Blog Details</a></li>
                                                </ul>
                                            </li> --}}

                                               <li>
                                                <a href="#">
                                                    Courses
                                                </a>
                                                <ul class="submenu">
                                                    @foreach ($coursesCategory as $course)
                                                        <li><a href="{{ route('frontend.courses.category', $course->name) }}">{{ $course->name }}</a></li>
                                                    @endforeach
                                                    {{-- <li><a href="news-grid.html">Blog Grid</a></li> --}}

                                                </ul>
                                            </li>

                                             <li>
                                                <a href="{{ route('frontend.our-team') }}">Our Team</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('frontend.apply-now') }}">
                                                Apply now

                                            </a>

                                            </li>




                                            <li>
                                                <a href="{{ route('frontend.contact') }}">Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="header-right d-flex align-items-center mt-0">
                            <div class="header-call-item">
                                <a href="#" class="main-header__search search-toggler">
                                <i class="fa-regular fa-magnifying-glass"></i>
                            </a>
                                <a href="contact.html" class="theme-btn">
                                    Apply now
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <div class="header__hamburger my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

         <!-- Search Area Start -->
        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <div class="search-popup__content">
                <form role="search" method="get" class="search-popup__form" action="#">
                    <input type="text" id="search" name="search" placeholder="Search Here...">
                    <button type="submit" aria-label="search submit" class="search-btn">
                        <span><i class="fa-regular fa-magnifying-glass"></i></span>
                    </button>
                </form>
            </div>
        </div>
