<header class="wp-site-header header-builder-frontend header-position-relative">

    <div class="header-mobile header_mobile_screen">

        <div class="header-mobile-content">
            <div class="header-content-inner clearfix">

                <div class="header-left">
                    <div class="logo-mobile">
                        <a href="">
                            <img src="wp-content/uploads/2020/12/FM-Education-Hub-Logo-2-1.png" alt="FM Education Hub" />
                        </a>
                    </div>
                </div>

                <div class="header-right">


                    <div class="canvas-mobile">

                        <div class="canvas-menu gva-offcanvas">
                            <a class="dropdown-toggle" data-canvas=".mobile" href="#"><i class="icon las la-bars"></i></a>
                        </div>
                        <div class="gva-offcanvas-content mobile">
                            <div class="top-canvas">
                                <a class="logo-mm" href="">
                                    <img src="wp-content/uploads/2020/12/FM-Education-Hub-Logo-2-1.png" alt="FM Education Hub" />
                                </a>
                                <a class="control-close-mm" href="#"><i class="far fa-times-circle"></i></a>
                            </div>

                            <div class=" sidebar">
                                <div id="gva-mobile-menu" class="navbar-collapse">
                                    <ul id="menu-main-menu" class="">
                                        <li id="menu-item-1433" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1213 current_page_item menu-item-1433"><a href="{{ route('frontend') }}" onClick="return true"><span class="menu-title">Home</span></a></li>

                                        <li id="menu-item-1434" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1434"><a href="about/" onClick="return true"><span class="menu-title">About</span><span class="caret"></span></a>
                                            <ul class="submenu-inner ">

                                                <li id="" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1949">
                                                    <a href="{{ route('frontend.our-team') }}" onClick="return true">
                                                        <span class="menu-title">Our Team</span>
                                                    </a>
                                                </li>

                                                <li id="menu-item-2149" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2149"><a href="{{ route('frontend.faq') }}" onClick="return true"><span class="menu-title">FAQ</span></a></li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-1435" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1435"><a href="#" onClick="return true"><span class="menu-title">Courses</span><span class="caret"></span></a>
                                            <ul class="submenu-inner ">
                                                <li id="menu-item-1944" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1944"><a href="{{ route('frontend.sfe-funded-courses') }}" onClick="return true"><span class="menu-title">SFE Funded Courses</span></a></li>
                                                <li id="menu-item-1943" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1943"><a href="{{ route('frontend.self-funded') }}" onClick="return true"><span class="menu-title">Self Funded</span></a></li>
                                                <li id="menu-item-1942" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1942"><a href="{{ route('frontend.free-courses') }}" onClick="return true"><span class="menu-title">Free Courses</span></a></li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-1432" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1432"><a href="{{ route('frontend.contact') }}" onClick="return true"><span class="menu-title">Contact</span></a></li>
                                    </ul>
                                </div>
                                <!--INGENIER: Adding Apply Now Button for Mobile Device -->
                               <div style="float: none;">
                                <form class="tutor-enrol-course-form" action="{{ route('frontend.apply-now') }}">
                                    <button type="submit" class="tutor-btn tutor-btn-primary tutor-btn-lg tutor-btn-block tutor-my-24 tutor-enroll-course-button tutor-static-loader">
                                    Apply Now
                                    </button>
                                </form>
                                </div>

                                <div class="after-offcanvas">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="header-builder-inner">
        <div class="header_default_screen">
            <div class="header-main-wrapper">
                <div data-elementor-type="wp-post" data-elementor-id="56" class="elementor elementor-56">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-5935d46 elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="5935d46" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-af39583 column-style-top" data-id="af39583" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-f13e43a elementor-widget elementor-widget-gva-logo" data-id="f13e43a" data-element_type="widget" data-widget_type="gva-logo.default">
                                        <div class="elementor-widget-container">
                                            <div class="gva-element-gva-logo gva-element">
                                                <div class="gsc-logo text-left">

                                                    <a class="site-branding-logo" href="{{ route('frontend') }}" title="Home " rel="Home ">
                                                        <img src="wp-content/uploads/2020/12/FM-Education-Hub-Logo-4.png" alt="Home " />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f9965e1 column-style-top" data-id="f9965e1" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-611a36b elementor-shape-circle elementor-widget__width-auto elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="611a36b" data-element_type="widget" data-widget_type="social-icons.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-social-icons-wrapper elementor-grid">

                                                <span class="elementor-grid-item">

                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-47f2608" href="https://www.instagram.com/fmeducationhub/" target="_blank">

                                                        <span class="elementor-screen-only">Instagram</span>

                                                        <i class="fab fa-instagram"></i> </a>

                                                    </span>

                                                    <span class="elementor-grid-item">

                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-d2e65c9" href="https://web.facebook.com/fmeducationhub/" target="_blank">

                                                            <span class="elementor-screen-only">Facebook</span>
                                                        <i class="fab fa-facebook"></i> </a>

                                                    </span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="elementor-element elementor-element-a652c2f elementor-position-left elementor-widget__width-auto elementor-mobile-position-left elementor-view-default elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="a652c2f"
                                         data-element_type="widget" data-widget_type="icon-box.default">

                                         <div class="elementor-widget-container">

                                            <div class="elementor-icon-box-wrapper">


                                                <div class="elementor-icon-box-icon">

                                                    <span class="elementor-icon elementor-animation-">

                                                        <i aria-hidden="true" class=" flaticon-calling"></i>
                                                    </span>

                                                </div>


                                                <div class="elementor-icon-box-content">


                                                    <h3 class="elementor-icon-box-title">

                                                        <span>

                                                            Call Us
                                                        </span>

                                                    </h3>


                                                    <p class="elementor-icon-box-description">

                                                        <a href="tel:+447951072254"> +447951072254</a>
                                                     </p>


                                                    </div>


                                                </div>

                                            </div>

                                        </div>

                                        <div class="elementor-element elementor-element-e411e05 elementor-position-left elementor-widget__width-auto elementor-mobile-position-left elementor-view-default elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="e411e05"
                                         data-element_type="widget" data-widget_type="icon-box.default">

                                         <div class="elementor-widget-container">

                                            <div class="elementor-icon-box-wrapper">


                                                <div class="elementor-icon-box-icon">

                                                    <span class="elementor-icon elementor-animation-">

                                                        <i aria-hidden="true" class=" flaticon-phone-call"></i>
                                                    	</span>

                                                    </div>


                                                    <div class="elementor-icon-box-content">


                                                        <h3 class="elementor-icon-box-title">

                                                            <span>

                                                                Call Us
                                                            </span>

                                                        </h3>


                                                        <p class="elementor-icon-box-description">

                                                            <a href="tel:02033452601"> 02033452601</a>
                                                        </p>


                                                    </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="elementor-element elementor-element-d5396e0 elementor-position-left elementor-widget__width-auto elementor-mobile-position-left elementor-view-default elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="d5396e0"
                                         data-element_type="widget" data-widget_type="icon-box.default">

                                         <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">


                                                <div class="elementor-icon-box-icon">

                                                    <span class="elementor-icon elementor-animation-">

                                                        <i aria-hidden="true" class=" flaticon-email"></i>
                                                    	</span>

                                                    </div>


                                                    <div class="elementor-icon-box-content">


                                                        <h3 class="elementor-icon-box-title">

                                                            <span>

                                                                Send Email
                                                            </span>

                                                        </h3>


                                                        <p class="elementor-icon-box-description">

                                                            <a href="mailto:info@fmeducation.co.uk">
                                                            info@fmeducation.co.uk

                                                        </a>
                                                     </p>


                                                    </div>


                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-a99dd1e gv-sticky-menu elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="a99dd1e" data-element_type="section"
                             data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-537e75fb column-style-top" data-id="537e75fb" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-611e29ac elementor-widget elementor-widget-gva-navigation-menu" data-id="611e29ac" data-element_type="widget" data-widget_type="gva-navigation-menu.default">
                                        <div class="elementor-widget-container">
                                            <div class="gva-element-gva-navigation-menu gva-element">
                                                <div class="gva-navigation-menu  menu-align-center">
                                                    <div class="menu-main-menu-container">
                                                        <ul id="menu-6sz9" class="gva-nav-menu gva-main-menu">
                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1213 current_page_item menu-item-1433"><a href="{{ route('frontend') }}" onClick="return true"><span class="menu-title">Home</span></a></li>
                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1434"><a href="about/" onClick="return true"><span class="menu-title">About</span><span class="caret"></span></a>
                                                                <ul class="submenu-inner ">
                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1949"><a href="{{ route('frontend.our-team') }}" onClick="return true"><span class="menu-title">Our Team</span></a></li>
                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2149"><a href="{{ route('frontend.faq') }}" onClick="return true"><span class="menu-title">FAQ</span></a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1435"><a href="#" onClick="return true"><span class="menu-title">Courses</span><span class="caret"></span></a>
                                                                <ul class="submenu-inner ">
                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1944"><a href="{{ route('frontend.sfe-funded-courses') }}" onClick="return true"><span class="menu-title">SFE Funded Courses</span></a></li>
                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1943"><a href="{{ route('frontend.self-funded') }}" onClick="return true"><span class="menu-title">Self Funded</span></a></li>
                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1942"><a href="{{ route('frontend.free-courses') }}" onClick="return true"><span class="menu-title">Free Courses</span></a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1432"><a href="{{ route('frontend.contact') }}" onClick="return true"><span class="menu-title">Contact</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2016fbff column-style-top" data-id="2016fbff" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-82953ba elementor-align-center elementor-widget elementor-widget-button" data-id="82953ba" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container">
                                          <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ route('frontend.apply-now') }}">
                                                <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text">APPLY NOW</span>
                                                </span>
                                            </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</header>
