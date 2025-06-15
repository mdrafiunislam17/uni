<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>

    @include('frontend.includes.top-header')
     @stack('styles')
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="home page-template-default page page-id-1213 tutor-lms elementor-default elementor-kit-7 elementor-page elementor-page-1213">
<script type="text/javascript">
    var plwao_tag = document.getElementsByTagName("html")[0];
    var plwao_class = plwao_tag.getAttribute("class");
    var new_classes = plwao_class.replace("plwao-hide", "");

    plwao_tag.setAttribute("class", new_classes);
</script>
<style type='text/css'>
    .plwao-loader-wrap {
        background-color: #ffffff;
    }

    .plwao-loader-wrap .plwao-custom-cnt,
    .plwao-loader-wrap .plwao-custom-cnt p {
        color: #333333;
    }
    .fade-in {
  animation: fadeIn 0.5s ease-in-out;
}
</style>

{{-- <div class="plwao-loader-wrap">
    <div class="plwao-loader-inr">
        <div class="plwao-custom-cnt">
            <p><img class="alignnone size-full wp-image-2111" src="{{ asset('wp-content/uploads/2024/07/cropped-FM-Education-Fav-1-32x32.png') }}" alt="" width="252" height="80" /></p>
        </div>

    </div>
</div> --}}

<script type="text/javascript" src="wp-content/plugins/preloader-for-website/assets/js/plwao-public.js?ver=1.3" id="plwao-public-script-js"></script>

<div class="wrapper-page">
    <!--page-->

    @include('frontend.includes.header')




    <div id="page-content">
        <!--page content-->




        <!-- Dynamic Body Content -->
        @yield('body')

        <!-- Footer and Header -->
        @include('frontend.includes.footer')
    </div>
    <!--end page content-->

</div>
<!-- End page -->



<div id="gva-overlay"></div>
<div id="gva-quickview" class="clearfix"></div>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="blur-svg">
    <defs>
        <filter id="blur-filter">
            <feGaussianBlur stdDeviation="3"></feGaussianBlur>
        </filter>
    </defs>
</svg>
<div class="modal fade modal-ajax-user-form" id="form-ajax-login-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header-form">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ajax-user-form">
                    <h2 class="title">Signin</h2>
                    <div class="form-ajax-login-popup-content">
                        <form id="ajax-login-form" method="post" class="ajax-form-content">
                            <div class="form-status"></div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" placeholder="Username" name="username" autocomplete='off' class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" placeholder="******" name="password" autocomplete='off' class="form-control">
                            </div>
                            <div class="form-group form-action">
                                <input class="btn-theme btn-fw" type="submit" value="Login" name="submit">
                            </div>
                            <div class="lost-password">
                                <a class="lost-popup" data-toggle="modal" data-target="#form-ajax-lost-password-popup">Lost your password?</a>
                            </div>
                        </form>
                    </div>
                    <div class="user-registration">
                        Don&#039;t have an account <a class="registration-popup" href="">
                            Register                  </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-ajax-user-form" id="form-ajax-lost-password-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header-form">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ajax-user-form">
                    <h2 class="title">Reset Password</h2>
                    <div class="form-ajax-login-popup-content">
                        <form id="lost-password-form" class="ajax-form-content" method="post">
                            <div class="form-status"></div>
                            <input type="hidden" id="zilom_user_lost_password_nonce" name="zilom_user_lost_password_nonce" value="e0662cada1" /><input type="hidden" name="_wp_http_referer" value="/" />
                            <div class="form-group">
                                <label for="forget_pwd_user_login">Username or E-mail:</label>
                                <input type="text" name="user_login" class="control-form input-fw" id="forget_pwd_user_login" placeholder="Username" value="" size="20" />
                            </div>
                            <div class="form-group form-action">
                                <input type="submit" name="wp-submit" class="btn-theme btn-fw" value="Get New Password" />
                            </div>
                        </form>
                    </div>

                    <div class="user-registration">
                        Don&#039;t have an account <a class="registration-popup" data-toggle="modal" data-target="#form-ajax-registration-popup">
                            Register                     </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    const lazyloadRunObserver = () => {
        const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
        const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    let lazyloadBackground = entry.target;
                    if (lazyloadBackground) {
                        lazyloadBackground.classList.add('e-lazyloaded');
                    }
                    lazyloadBackgroundObserver.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '200px 0px 200px 0px'
        });
        lazyloadBackgrounds.forEach((lazyloadBackground) => {
            lazyloadBackgroundObserver.observe(lazyloadBackground);
        });
    };
    const events = [
        'DOMContentLoaded',
        'elementor/lazyload/observe',
    ];
    events.forEach((event) => {
        document.addEventListener(event, lazyloadRunObserver);
    });
</script>

<link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" property="stylesheet" media="all" type="text/css">

<script>
    _tpt.R.fonts.domFonts = {
        "Kumbh+Sans": {
            "normal": [400, 700],
            "italic": []
        },
        "reey": {
            "normal": [400],
            "italic": []
        }
    };
</script>
<script>
    SR7.E.php.warnings = {
        "getArrSliders": "get_sliders",
        "getAlias": "get_alias",
        "getTitle": "get_title"
    };
</script>
<link rel='stylesheet' id='owl-carousel-css-css' href='wp-content/plugins/zilom-themer/elementor/assets/libs/owl-carousel/assets/owl.carousel.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-161-css' href='wp-content/uploads/elementor/css/post-161.css?ver=1725475162' type='text/css' media='all' />
<link rel='stylesheet' id='e-animations-css' href='wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.23.1' type='text/css' media='all' />
<script type="text/javascript" src="wp-includes/js/dist/hooks.min.js?ver=2810c76e705dd1a53b18" id="wp-hooks-js"></script>
<script type="text/javascript" src="wp-includes/js/dist/i18n.min.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
<script type="text/javascript" id="wp-i18n-js-after">
    /* <![CDATA[ */
    wp.i18n.setLocaleData({
        'text direction\u0004ltr': ['ltr']
    });
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.9.7" id="swv-js"></script>
<script type="text/javascript" id="contact-form-7-js-extra">
    /* <![CDATA[ */
    var wpcf7 = {
        "api": {
            "root": "https:wp-json\/",
            "namespace": "contact-form-7\/v1"
        }
    };
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.9.7" id="contact-form-7-js"></script>
<script type="text/javascript" id="tutor-script-js-extra">
    /* <![CDATA[ */
    var _tutorobject = {
        "ajaxurl": "https:wp-admin\/admin-ajax.php",
        "home_url": "https:\/\/fmeducation.co.uk",
        "site_title": "FM Education Hub",
        "base_path": "\/",
        "tutor_url": "https:wp-content\/plugins\/tutor\/",
        "tutor_pro_url": null,
        "nonce_key": "_tutor_nonce",
        "_tutor_nonce": "3677cb58a6",
        "loading_icon_url": "https:wp-admin\/images\/wpspin_light.gif",
        "placeholder_img_src": "https:wp-content\/plugins\/tutor\/assets\/images\/placeholder.svg",
        "enable_lesson_classic_editor": "",
        "tutor_frontend_dashboard_url": "https:dashboard-2\/",
        "wp_date_format": "MMMM d, yyyy",
        "is_admin": "",
        "is_admin_bar_showing": "",
        "addons_data": [{
            "name": "Course Bundle",
            "description": "Group multiple courses to sell together.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/course-bundle\/thumbnail.svg"
        }, {
            "name": "Social Login",
            "description": "Let users register & login through social network like Facebook, Google, etc.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/social-login\/thumbnail.svg"
        }, {
            "name": "Content Drip",
            "description": "Unlock lessons by schedule or when the student meets specific condition.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/content-drip\/thumbnail.png"
        }, {
            "name": "Tutor Multi Instructors",
            "description": "Start a course with multiple instructors by Tutor Multi Instructors",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-multi-instructors\/thumbnail.png"
        }, {
            "name": "Tutor Assignments",
            "description": "Tutor assignments is a great way to assign tasks to students.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-assignments\/thumbnail.png"
        }, {
            "name": "Tutor Course Preview",
            "description": "Unlock some lessons for students before enrollment.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-course-preview\/thumbnail.png"
        }, {
            "name": "Tutor Course Attachments",
            "description": "Add unlimited attachments\/ private files to any Tutor course",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-course-attachments\/thumbnail.png"
        }, {
            "name": "Tutor Google Meet Integration",
            "description": "Connect Tutor LMS with Google Meet to host live online classes. Students can attend live classes right from the lesson page.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/google-meet\/thumbnail.png"
        }, {
            "name": "Tutor Report",
            "description": "Check your course performance through Tutor Report stats.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-report\/thumbnail.png"
        }, {
            "name": "Email",
            "description": "Send email on various tutor events",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-email\/thumbnail.png"
        }, {
            "name": "Calendar",
            "description": "Allow students to see everything in a calendar view in the front dashboard.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/calendar\/thumbnail.png"
        }, {
            "name": "Notifications",
            "description": "Get On Site and Push Notifications on specified tutor events.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-notifications\/thumbnail.png"
        }, {
            "name": "Google Classroom Integration",
            "description": "Helps connect Google Classrooms with Tutor LMS courses, allowing you to use features like Classroom streams and files directly from the Tutor LMS course.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/google-classroom\/thumbnail.png"
        }, {
            "name": "Tutor Zoom Integration",
            "description": "Connect Tutor LMS with Zoom to host live online classes. Students can attend live classes right from the lesson page.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-zoom\/thumbnail.png"
        }, {
            "name": "Quiz Export\/Import",
            "description": "Save time by exporting\/importing quiz data with easy options.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/quiz-import-export\/thumbnail.png"
        }, {
            "name": "Enrollment",
            "description": "Take advanced control on enrollment. Enroll the student manually.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/enrollments\/thumbnail.png"
        }, {
            "name": "Tutor Certificate",
            "description": "Students will be able to download a certificate after course completion.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-certificate\/thumbnail.png"
        }, {
            "name": "Gradebook",
            "description": "Shows student progress from assignment and quiz",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/gradebook\/thumbnail.png"
        }, {
            "name": "Tutor Prerequisites",
            "description": "Specific course you must complete before you can enroll new course by Tutor Prerequisites",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-prerequisites\/thumbnail.png"
        }, {
            "name": "BuddyPress",
            "description": "Discuss about course and share your knowledge with your friends through BuddyPress",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/buddypress\/thumbnail.png"
        }, {
            "name": "WooCommerce Subscriptions",
            "description": "Capture Residual Revenue with Recurring Payments.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/wc-subscriptions\/thumbnail.png"
        }, {
            "name": "Paid Memberships Pro",
            "description": "Maximize revenue by selling membership access to all of your courses.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/pmpro\/thumbnail.png"
        }, {
            "name": "Restrict Content Pro",
            "description": "Unlock Course depending on Restrict Content Pro Plugin Permission.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/restrict-content-pro\/thumbnail.png"
        }, {
            "name": "Weglot",
            "description": "Translate & manage multilingual courses for global reach with full edit control.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-weglot\/thumbnail.png"
        }, {
            "name": "WPML Multilingual CMS",
            "description": "Create multilingual courses, lessons, dashboard and more for a global audience.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-wpml\/thumbnail.png"
        }],
        "current_user": [],
        "content_change_event": "tutor_content_changed_event",
        "is_tutor_course_edit": "",
        "assignment_max_file_allowed": "0",
        "current_page": "",
        "quiz_answer_display_time": "2000",
        "is_ssl": "1",
        "course_list_page_url": "https:wp-admin\/admin.php?page=tutor",
        "course_post_type": "courses"
    };
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/tutor/assets/js/tutor.min.js?ver=2.7.3" id="tutor-script-js"></script>
<script type="text/javascript" id="quicktags-js-extra">
    /* <![CDATA[ */
    var quicktagsL10n = {
        "closeAllOpenTags": "Close all open tags",
        "closeTags": "close tags",
        "enterURL": "Enter the URL",
        "enterImageURL": "Enter the URL of the image",
        "enterImageDescription": "Enter a description of the image",
        "textdirection": "text direction",
        "toggleTextdirection": "Toggle Editor Text Direction",
        "dfw": "Distraction-free writing mode",
        "strong": "Bold",
        "strongClose": "Close bold tag",
        "em": "Italic",
        "emClose": "Close italic tag",
        "link": "Insert link",
        "blockquote": "Blockquote",
        "blockquoteClose": "Close blockquote tag",
        "del": "Deleted text (strikethrough)",
        "delClose": "Close deleted text tag",
        "ins": "Inserted text",
        "insClose": "Close inserted text tag",
        "image": "Insert image",
        "ul": "Bulleted list",
        "ulClose": "Close bulleted list tag",
        "ol": "Numbered list",
        "olClose": "Close numbered list tag",
        "li": "List item",
        "liClose": "Close list item tag",
        "code": "Code",
        "codeClose": "Close code tag",
        "more": "Insert Read More tag"
    };
    /* ]]> */
</script>
<script type="text/javascript" src="wp-includes/js/quicktags.min.js?ver=6.6.2" id="quicktags-js"></script>
<script type="text/javascript" src="wp-includes/js/jquery/ui/core.min.js?ver=1.13.3" id="jquery-ui-core-js"></script>
<script type="text/javascript" src="wp-includes/js/jquery/ui/mouse.min.js?ver=1.13.3" id="jquery-ui-mouse-js"></script>
<script type="text/javascript" src="wp-includes/js/jquery/ui/sortable.min.js?ver=1.13.3" id="jquery-ui-sortable-js"></script>
<script type="text/javascript" src="wp-includes/js/jquery/jquery.ui.touch-punch.js?ver=0.2.2" id="jquery-touch-punch-js"></script>
<script type="text/javascript" src="wp-content/plugins/tutor/assets/packages/SocialShare/SocialShare.min.js?ver=2.7.3" id="tutor-social-share-js"></script>
<script type="text/javascript" id="tutor-frontend-js-extra">
    /* <![CDATA[ */
    var _tutorobject = {
        "ajaxurl": "https:wp-admin\/admin-ajax.php",
        "home_url": "https:\/\/fmeducation.co.uk",
        "site_title": "FM Education Hub",
        "base_path": "\/",
        "tutor_url": "https:wp-content\/plugins\/tutor\/",
        "tutor_pro_url": null,
        "nonce_key": "_tutor_nonce",
        "_tutor_nonce": "3677cb58a6",
        "loading_icon_url": "https:wp-admin\/images\/wpspin_light.gif",
        "placeholder_img_src": "https:wp-content\/plugins\/tutor\/assets\/images\/placeholder.svg",
        "enable_lesson_classic_editor": "",
        "tutor_frontend_dashboard_url": "https:dashboard-2\/",
        "wp_date_format": "MMMM d, yyyy",
        "is_admin": "",
        "is_admin_bar_showing": "",
        "addons_data": [{
            "name": "Course Bundle",
            "description": "Group multiple courses to sell together.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/course-bundle\/thumbnail.svg"
        }, {
            "name": "Social Login",
            "description": "Let users register & login through social network like Facebook, Google, etc.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/social-login\/thumbnail.svg"
        }, {
            "name": "Content Drip",
            "description": "Unlock lessons by schedule or when the student meets specific condition.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/content-drip\/thumbnail.png"
        }, {
            "name": "Tutor Multi Instructors",
            "description": "Start a course with multiple instructors by Tutor Multi Instructors",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-multi-instructors\/thumbnail.png"
        }, {
            "name": "Tutor Assignments",
            "description": "Tutor assignments is a great way to assign tasks to students.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-assignments\/thumbnail.png"
        }, {
            "name": "Tutor Course Preview",
            "description": "Unlock some lessons for students before enrollment.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-course-preview\/thumbnail.png"
        }, {
            "name": "Tutor Course Attachments",
            "description": "Add unlimited attachments\/ private files to any Tutor course",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-course-attachments\/thumbnail.png"
        }, {
            "name": "Tutor Google Meet Integration",
            "description": "Connect Tutor LMS with Google Meet to host live online classes. Students can attend live classes right from the lesson page.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/google-meet\/thumbnail.png"
        }, {
            "name": "Tutor Report",
            "description": "Check your course performance through Tutor Report stats.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-report\/thumbnail.png"
        }, {
            "name": "Email",
            "description": "Send email on various tutor events",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-email\/thumbnail.png"
        }, {
            "name": "Calendar",
            "description": "Allow students to see everything in a calendar view in the front dashboard.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/calendar\/thumbnail.png"
        }, {
            "name": "Notifications",
            "description": "Get On Site and Push Notifications on specified tutor events.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-notifications\/thumbnail.png"
        }, {
            "name": "Google Classroom Integration",
            "description": "Helps connect Google Classrooms with Tutor LMS courses, allowing you to use features like Classroom streams and files directly from the Tutor LMS course.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/google-classroom\/thumbnail.png"
        }, {
            "name": "Tutor Zoom Integration",
            "description": "Connect Tutor LMS with Zoom to host live online classes. Students can attend live classes right from the lesson page.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-zoom\/thumbnail.png"
        }, {
            "name": "Quiz Export\/Import",
            "description": "Save time by exporting\/importing quiz data with easy options.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/quiz-import-export\/thumbnail.png"
        }, {
            "name": "Enrollment",
            "description": "Take advanced control on enrollment. Enroll the student manually.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/enrollments\/thumbnail.png"
        }, {
            "name": "Tutor Certificate",
            "description": "Students will be able to download a certificate after course completion.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-certificate\/thumbnail.png"
        }, {
            "name": "Gradebook",
            "description": "Shows student progress from assignment and quiz",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/gradebook\/thumbnail.png"
        }, {
            "name": "Tutor Prerequisites",
            "description": "Specific course you must complete before you can enroll new course by Tutor Prerequisites",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-prerequisites\/thumbnail.png"
        }, {
            "name": "BuddyPress",
            "description": "Discuss about course and share your knowledge with your friends through BuddyPress",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/buddypress\/thumbnail.png"
        }, {
            "name": "WooCommerce Subscriptions",
            "description": "Capture Residual Revenue with Recurring Payments.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/wc-subscriptions\/thumbnail.png"
        }, {
            "name": "Paid Memberships Pro",
            "description": "Maximize revenue by selling membership access to all of your courses.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/pmpro\/thumbnail.png"
        }, {
            "name": "Restrict Content Pro",
            "description": "Unlock Course depending on Restrict Content Pro Plugin Permission.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/restrict-content-pro\/thumbnail.png"
        }, {
            "name": "Weglot",
            "description": "Translate & manage multilingual courses for global reach with full edit control.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-weglot\/thumbnail.png"
        }, {
            "name": "WPML Multilingual CMS",
            "description": "Create multilingual courses, lessons, dashboard and more for a global audience.",
            "url": "https:wp-content\/plugins\/tutor\/assets\/addons\/tutor-wpml\/thumbnail.png"
        }],
        "current_user": [],
        "content_change_event": "tutor_content_changed_event",
        "is_tutor_course_edit": "",
        "assignment_max_file_allowed": "0",
        "current_page": "",
        "quiz_answer_display_time": "2000",
        "is_ssl": "1",
        "course_list_page_url": "https:wp-admin\/admin.php?page=tutor",
        "course_post_type": "courses"
    };
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/tutor/assets/js/tutor-front.min.js?ver=2.7.3" id="tutor-frontend-js"></script>
<script type="text/javascript" src="wp-includes/js/jquery/ui/datepicker.min.js?ver=1.13.3" id="jquery-ui-datepicker-js"></script>
<script type="text/javascript" id="jquery-ui-datepicker-js-after">
    /* <![CDATA[ */
    jQuery(function(jQuery) {
        jQuery.datepicker.setDefaults({
            "closeText": "Close",
            "currentText": "Today",
            "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            "monthNamesShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            "nextText": "Next",
            "prevText": "Previous",
            "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
            "dateFormat": "MM d, yy",
            "firstDay": 1,
            "isRTL": false
        });
    });
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/zilom-themer/assets/js/main.js" id="gavias-themer-js"></script>
<script type="text/javascript" src="wp-content/plugins/zilom-themer/elementor/assets/libs/owl-carousel/owl.carousel.js?ver=1.0.0" id="jquery.owl.carousel-js"></script>
<script type="text/javascript" src="wp-content/plugins/zilom-themer/elementor/assets/main.js?ver=1.0.0" id="gavias.elements-js"></script>
<script type="text/javascript" src="wp-content/plugins/zilom-themer/elementor/assets/libs/typed.min.js?ver=1.0.0" id="typed-js"></script>
<script type="text/javascript" src="wp-content/plugins/zilom-themer/elementor/assets/libs/count-to.js?ver=1.0.0" id="jquery.count_to-js"></script>
<script type="text/javascript" src="wp-content/plugins/zilom-themer/elementor/assets/libs/jquery.appear.js?ver=1.0.0" id="jquery.appear-js"></script>
<script type="text/javascript" src="wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min.js?ver=3.7.2" id="elementor-pro-webpack-runtime-js"></script>
<script type="text/javascript" src="wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.23.1" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.23.1" id="elementor-frontend-modules-js"></script>
<script type="text/javascript" id="elementor-pro-frontend-js-before">
    /* <![CDATA[ */
    var ElementorProFrontendConfig = {
        "ajaxurl": "https:wp-admin\/admin-ajax.php",
        "nonce": "353534e454",
        "urls": {
            "assets": "https:wp-content\/plugins\/elementor-pro\/assets\/",
            "rest": "https:wp-json\/"
        },
        "shareButtonsNetworks": {
            "facebook": {
                "title": "Facebook",
                "has_counter": true
            },
            "twitter": {
                "title": "Twitter"
            },
            "linkedin": {
                "title": "LinkedIn",
                "has_counter": true
            },
            "pinterest": {
                "title": "Pinterest",
                "has_counter": true
            },
            "reddit": {
                "title": "Reddit",
                "has_counter": true
            },
            "vk": {
                "title": "VK",
                "has_counter": true
            },
            "odnoklassniki": {
                "title": "OK",
                "has_counter": true
            },
            "tumblr": {
                "title": "Tumblr"
            },
            "digg": {
                "title": "Digg"
            },
            "skype": {
                "title": "Skype"
            },
            "stumbleupon": {
                "title": "StumbleUpon",
                "has_counter": true
            },
            "mix": {
                "title": "Mix"
            },
            "telegram": {
                "title": "Telegram"
            },
            "pocket": {
                "title": "Pocket",
                "has_counter": true
            },
            "xing": {
                "title": "XING",
                "has_counter": true
            },
            "whatsapp": {
                "title": "WhatsApp"
            },
            "email": {
                "title": "Email"
            },
            "print": {
                "title": "Print"
            }
        },
        "facebook_sdk": {
            "lang": "en_US",
            "app_id": ""
        },
        "lottie": {
            "defaultAnimationUrl": "https:wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"
        }
    };
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/elementor-pro/assets/js/frontend.min.js?ver=3.7.2" id="elementor-pro-frontend-js"></script>
<script type="text/javascript" src="wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2" id="elementor-waypoints-js"></script>
<script type="text/javascript" id="elementor-frontend-js-before">
    /* <![CDATA[ */
    var elementorFrontendConfig = {
        "environmentMode": {
            "edit": false,
            "wpPreview": false,
            "isScriptDebug": false
        },
        "i18n": {
            "shareOnFacebook": "Share on Facebook",
            "shareOnTwitter": "Share on Twitter",
            "pinIt": "Pin it",
            "download": "Download",
            "downloadImage": "Download image",
            "fullscreen": "Fullscreen",
            "zoom": "Zoom",
            "share": "Share",
            "playVideo": "Play Video",
            "previous": "Previous",
            "next": "Next",
            "close": "Close",
            "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
            "a11yCarouselPrevSlideMessage": "Previous slide",
            "a11yCarouselNextSlideMessage": "Next slide",
            "a11yCarouselFirstSlideMessage": "This is the first slide",
            "a11yCarouselLastSlideMessage": "This is the last slide",
            "a11yCarouselPaginationBulletMessage": "Go to slide"
        },
        "is_rtl": false,
        "breakpoints": {
            "xs": 0,
            "sm": 480,
            "md": 768,
            "lg": 1025,
            "xl": 1440,
            "xxl": 1600
        },
        "responsive": {
            "breakpoints": {
                "mobile": {
                    "label": "Mobile Portrait",
                    "value": 767,
                    "default_value": 767,
                    "direction": "max",
                    "is_enabled": true
                },
                "mobile_extra": {
                    "label": "Mobile Landscape",
                    "value": 880,
                    "default_value": 880,
                    "direction": "max",
                    "is_enabled": false
                },
                "tablet": {
                    "label": "Tablet Portrait",
                    "value": 1024,
                    "default_value": 1024,
                    "direction": "max",
                    "is_enabled": true
                },
                "tablet_extra": {
                    "label": "Tablet Landscape",
                    "value": 1200,
                    "default_value": 1200,
                    "direction": "max",
                    "is_enabled": false
                },
                "laptop": {
                    "label": "Laptop",
                    "value": 1366,
                    "default_value": 1366,
                    "direction": "max",
                    "is_enabled": false
                },
                "widescreen": {
                    "label": "Widescreen",
                    "value": 2400,
                    "default_value": 2400,
                    "direction": "min",
                    "is_enabled": false
                }
            }
        },
        "version": "3.23.1",
        "is_static": false,
        "experimentalFeatures": {
            "e_nested_atomic_repeaters": true,
            "e_onboarding": true,
            "theme_builder_v2": true,
            "home_screen": true,
            "landing-pages": true,
            "e_lazyload": true,
            "page-transitions": true,
            "notes": true,
            "form-submissions": true,
            "e_scroll_snap": true
        },
        "urls": {
            "assets": "https:wp-content\/plugins\/elementor\/assets\/",
            "ajaxurl": "https:wp-admin\/admin-ajax.php"
        },
        "nonces": {
            "floatingButtonsClickTracking": "3a39ac493b"
        },
        "swiperClass": "swiper-container",
        "settings": {
            "page": [],
            "editorPreferences": []
        },
        "kit": {
            "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
            "global_image_lightbox": "yes",
            "lightbox_enable_counter": "yes",
            "lightbox_enable_fullscreen": "yes",
            "lightbox_enable_zoom": "yes",
            "lightbox_enable_share": "yes",
            "lightbox_title_src": "title",
            "lightbox_description_src": "description"
        },
        "post": {
            "id": 1213,
            "title": "FM%20Education%20Hub%20%E2%80%93%20Educational%20Consultant",
            "excerpt": "",
            "featuredImage": false
        }
    };
    /* ]]> */
</script>
<script type="text/javascript" src="wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.23.1" id="elementor-frontend-js"></script>
<script type="text/javascript" src="wp-content/plugins/elementor-pro/assets/js/preloaded-elements-handlers.min.js?ver=3.7.2" id="pro-preloaded-elements-handlers-js"></script>
<link rel="stylesheet" type="text/css" href="wp-content/plugins/zilom-themer/assets/icons/flaticon.css">
<script>
    SR7.JSON['SR7_1_1'] = {
        "settings": {
            "migrated": "sr6",
            "uSize": [false, true, false, true, true],
            "title": "Slider I",
            "alias": "slider-1",
            "type": "standard",
            "fonts": {
                "'Kumbh+Sans'": {
                    "name": "'Kumbh Sans'",
                    "normal": {
                        "400": true,
                        "700": true
                    },
                    "subset": {
                        "latin": true
                    }
                },
                "reey": {
                    "name": "reey",
                    "normal": {
                        "400": true
                    },
                    "subset": {
                        "latin": true
                    }
                }
            },
            "lazyLoad": "smart",
            "vPort": ["-200px", "-200px", "-200px", "-200px", "-200px"],
            "size": {
                "fullWidth": false,
                "fullHeightOffset": ",",
                "contentFH": true,
                "width": [1170, 1170, 1024, 778, 480],
                "height": [800, 800, 700, 480, 350],
                "cachedHeight": [800, 800, 700, 480, 350],
                "maxWidth": "100%",
                "p": {
                    "t": [0, 0, 0, 0, 0],
                    "b": [0, 0, 0, 0, 0],
                    "l": [0, 0, 0, 0, 0],
                    "r": [0, 0, 0, 0, 0]
                },
                "m": {
                    "t": [0, 0, 0, 0, 0],
                    "b": [0, 0, 0, 0, 0],
                    "l": [0, 0, 0, 0, 0],
                    "r": [0, 0, 0, 0, 0]
                }
            },
            "default": {
                "len": "9000"
            },
            "carousel": {
                "type": "h",
                "align": "center",
                "maxV": 3,
                "justify": false,
                "scale": false,
                "minS": 50,
                "vScale": false,
                "oScale": false,
                "space": "0",
                "rotation": false,
                "maxR": "0",
                "varR": false,
                "opacity": true,
                "maxO": 100,
                "varO": false,
                "spin": "off",
                "spinA": 0,
                "snap": true,
                "infinity": false,
                "skewX": 0,
                "skewY": 0,
                "ease": "power3.inOut",
                "dur": "800",
                "overshoot": false,
                "stretch": false,
                "showAllLayers": false,
                "jMWidth": false,
                "bR": "0",
                "bRU": "px",
                "pNV": "50px",
                "pT": "0",
                "pB": "0"
            },
            "pLoader": {
                "color": "#FFFFFF",
                "type": "0"
            },
            "slideshow": {
                "sOH": true,
                "initDelay": "0"
            },
            "general": {
                "perspectiveType": "local",
                "lazyLoad": "smart",
                "slideshow": {
                    "globalViewPort": true,
                    "globalViewDist": "-200px"
                }
            },
            "shdw": "0",
            "bg": {
                "color": {
                    "orig": "transparent",
                    "type": "solid",
                    "string": "transparent"
                }
            },
            "mod": {
                "use": true,
                "d3d": 27.5,
                "t": "mouse"
            },
            "nav": {
                "m": {
                    "use": false
                },
                "p": {
                    "w": "0",
                    "h": "0"
                },
                "arrows": {
                    "set": true,
                    "def": {
                        "back-color": {
                            "title": "Background",
                            "type": "color",
                            "data": "rgba(201,201,201,0.75)"
                        },
                        "back-size": {
                            "title": "Size",
                            "type": "custom",
                            "data": "40"
                        },
                        "arrow-color": {
                            "title": "Arrow-Color",
                            "type": "color",
                            "data": "#ffffff"
                        },
                        "arrow-size": {
                            "title": "Arrow-Size",
                            "type": "custom",
                            "data": "15"
                        },
                        "back-hover": {
                            "title": "Hover-Background",
                            "type": "color",
                            "data": "#000000"
                        },
                        "border-rgba": {
                            "title": "Border",
                            "type": "color",
                            "data": "#ffffff"
                        },
                        "left-arrow": {
                            "title": "Left-Arrow",
                            "type": "icon",
                            "data": "\\e824"
                        },
                        "right-arrow": {
                            "title": "Right-Arrow",
                            "type": "icon",
                            "data": "\\e825"
                        }
                    },
                    "cst": {
                        "arrow-color": "#ffffff",
                        "arrow-color-def": true,
                        "arrow-size": "20",
                        "arrow-size-def": true,
                        "back-color": "rgba(0, 0, 0, 0.38)",
                        "back-color-def": true,
                        "back-size": "50",
                        "back-size-def": true,
                        "back-hover": "#0c0c0c",
                        "back-hover-def": true,
                        "border-rgba": "rgba(255, 255, 255, 0)",
                        "border-rgba-def": true,
                        "left-arrow": "\\e824",
                        "left-arrow-def": true,
                        "right-arrow": "\\e825",
                        "right-arrow-def": true
                    },
                    "key": "persephone",
                    "t": "1008",
                    "m": "hslide",
                    "css": ".persephone.sr7-arrows {\n\tcursor:pointer;\n\tbackground:##back-color##;\n\twidth:##back-size##px;\n\theight:##back-size##px;\n\tposition:absolute;\n\tdisplay:block;\n\tz-index:1000;\n    border:1px solid ##border-rgba##;\n}\n.persephone.sr7-arrows.sr7-touchhover {\n\tbackground:##back-hover##;\n}\n.persephone.sr7-arrows:before {\n\tfont-family: 'revicons';\n\tfont-size:##arrow-size##px;\n\tcolor: ##arrow-color##;\n\tdisplay:block;\n\tline-height: ##back-size##px;\n\ttext-align: center;\n}\n.persephone.sr7-arrows.sr7-leftarrow:before {\n\tcontent: '##left-arrow##';\n}\n.persephone.sr7-arrows.sr7-rightarrow:before {\n\tcontent: '##right-arrow##\n';\n}\n\n",
                    "html": "",
                    "on": true,
                    "s": 1000,
                    "dIn": ["#a", 1000, "#a", "#a", "#a"],
                    "dOut": ["#a", 200, "#a", "#a", "1200"],
                    "show": [true, true, true, true, true],
                    "l": {
                        "a": "slider",
                        "anim": "fade",
                        "x": ["#a", "0px", "#a", "#a", "#a"],
                        "y": ["#a", "0px", "#a", "#a", "#a"],
                        "v": ["#a", "center", "#a", "#a", "#a"],
                        "h": ["#a", "left", "#a", "#a", "#a"]
                    },
                    "r": {
                        "a": "slider",
                        "anim": "fade",
                        "x": ["#a", "0px", "#a", "#a", "#a"],
                        "y": ["#a", "0px", "#a", "#a", "#a"],
                        "v": ["#a", "center", "#a", "#a", "#a"],
                        "h": ["#a", "right", "#a", "#a", "#a"]
                    }
                },
                "bullets": {
                    "set": true,
                    "def": {
                        "size": {
                            "title": "Size",
                            "type": "custom",
                            "data": "15"
                        },
                        "color": {
                            "title": "Color",
                            "type": "color",
                            "data": "rgba(255,255,255,0)"
                        },
                        "color-hover": {
                            "title": "Color Hover",
                            "type": "color",
                            "data": "rgba(255,255,255,1)"
                        },
                        "color-inner": {
                            "title": "Color Inner",
                            "type": "color",
                            "data": "rgba(255,255,255,0.3)"
                        }
                    },
                    "cst": {
                        "size": "15",
                        "size-def": false,
                        "color": "rgba(255,255,255,0)",
                        "color-def": false,
                        "color-hover": "rgba(255,255,255,1)",
                        "color-hover-def": false,
                        "color-inner": "rgba(255,255,255,0.3)",
                        "color-inner-def": false
                    },
                    "key": "uranus",
                    "t": "3013",
                    "css": ".uranus .sr7-bullet{\n  border-radius: 50%;\n  box-shadow: 0 0 0 2px ##color##;\n  -webkit-transition: box-shadow 0.3s ease;\n  transition: box-shadow 0.3s ease;\n  background:transparent;\n  width:##size##px;\n  height:##size##px;\n}\n.uranus .sr7-bullet.selected,\n.uranus .sr7-bullet.sr7-touchhover {\n  box-shadow: 0 0 0 2px ##color-hover##;\n  border:none;\n  border-radius: 50%;\n  background:transparent;\n}\n\n.uranus .sr7-bullet-inner {\n  -webkit-transition: background-color 0.3s ease, -webkit-transform 0.3s ease;\n  transition: background-color 0.3s ease, transform 0.3s ease;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  outline: none;\n  border-radius: 50%;\n  background-color: ##color##;\n  background-color: ##color-inner##;\n  text-indent: -999em;\n  cursor: pointer;\n  position: absolute;\n}\n\n.uranus .sr7-bullet.selected .sr7-bullet-inner,\n.uranus .sr7-bullet.sr7-touchhover .sr7-bullet-inner{\n transform: scale(0.4);\n -webkit-transform: scale(0.4);\n background-color:##color-hover##;\n}",
                    "html": "<span class=\"sr7-bullet-inner\"><\/span>",
                    "on": true,
                    "d": ["#a", "horizontal", "#a", "#a", "#a"],
                    "s": 1000,
                    "dIn": ["#a", 1000, "#a", "#a", "#a"],
                    "dOut": ["#a", 200, "#a", "#a", "1200"],
                    "show": [true, true, true, true, true],
                    "g": 6,
                    "a": "slider",
                    "anim": "fade",
                    "x": ["#a", "0", "#a", "#a", "#a"],
                    "y": ["#a", "20", "#a", "#a", "#a"],
                    "v": ["#a", "bottom", "#a", "#a", "#a"],
                    "h": ["#a", "center", "#a", "#a", "#a"]
                }
            },
            "pbar": {
                "set": true,
                "a": "slider",
                "t": "horizontal",
                "s": "5",
                "r": 10,
                "v": "top",
                "h": "left",
                "x": 0,
                "y": 0,
                "c": "rgba(0,0,0,0.15)",
                "bg": "transparent",
                "base": "slide",
                "g": false,
                "gs": 0,
                "gc": "rgba(255,255,255,0.5)",
                "rev": "reset",
                "vis": [true, true, true, true, true]
            },
            "thumb": "https:wp-content\/uploads\/2024\/07\/FM-Education-6.jpg",
            "aU": [],
            "imgs": [{
                "lib_id": 2030,
                "lib": "medialibrary",
                "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-6.jpg"
            }, {
                "lib_id": 2031,
                "lib": "medialibrary",
                "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-5.jpg"
            }],
            "version": "6.7.15"
        },
        "slides": {
            "1": {
                "id": 1,
                "slide": {
                    "addOns": [],
                    "id": 1,
                    "version": "6.7.15",
                    "actions": [{
                        "a": "link",
                        "evt": "click",
                        "http": "keep",
                        "target": "_blank",
                        "flw": "nofollow",
                        "ltype": "a",
                        "link": "https:apply-now",
                        "src": [3]
                    }],
                    "title": "Slide",
                    "parentId": null,
                    "language": "default",
                    "order": 1,
                    "thumb": {
                        "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-6-100x50.jpg",
                        "srcId": "",
                        "admin": "",
                        "adminId": "",
                        "dimension": "slider",
                        "default": {
                            "image": {
                                "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-6.jpg",
                                "repeat": "",
                                "size": "cover",
                                "pos": {
                                    "x": "50%",
                                    "y": "50%"
                                }
                            }
                        }
                    },
                    "description": "",
                    "attr": {
                        "class": "",
                        "data": "",
                        "id": "",
                        "a": "",
                        "aO": "ml",
                        "t": "",
                        "tO": "",
                        "deepLink": "",
                        "attr": ""
                    },
                    "publish": {
                        "from": "",
                        "to": "",
                        "state": ""
                    },
                    "slideshow": {
                        "stop": false,
                        "len": "default",
                        "hal": 0,
                        "hom": false,
                        "hfn": false
                    },
                    "loop": {
                        "u": false,
                        "r": -1,
                        "s": 0,
                        "e": 99999
                    }
                },
                "layers": {
                    "0": {
                        "fluid": {
                            "tx": true,
                            "tr": true,
                            "sp": true
                        },
                        "id": 0,
                        "alias": "Desc",
                        "content": {
                            "text": "We are experienced in consulting students for more than 10 years,\neither in admission placement or assisting with your course work"
                        },
                        "size": {
                            "w": ["auto", "auto", "auto", "auto", "auto"],
                            "h": ["auto", "auto", "auto", "auto", "auto"],
                            "minW": ["none", "none", "none", "none", "none"],
                            "minH": ["none", "none", "none", "none", "none"]
                        },
                        "pos": {
                            "x": ["15px", "15px", "13px", "15px", "10px"],
                            "y": ["118px", "118px", "103px", "54px", "44px"],
                            "v": ["middle", "middle", "middle", "middle", "middle"],
                            "pos": "absolute",
                            "float": ["none", "none", "none", "none", "none"],
                            "clear": ["none", "none", "none", "none", "none"]
                        },
                        "zIndex": 12,
                        "order": 12,
                        "display": ["block", "block", "block", "block", "block"],
                        "vA": "top",
                        "bg": {
                            "color": {
                                "orig": "transparent",
                                "type": "solid",
                                "string": "transparent"
                            }
                        },
                        "attr": {
                            "aO": "ml",
                            "tO": "ml"
                        },
                        "tl": {
                            "in": {
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 0,
                                        "f": 0,
                                        "e": "power4.inOut",
                                        "pE": "d",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 0,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }, {
                                        "t": 670,
                                        "d": 1200,
                                        "f": 1200,
                                        "e": "power4.inOut",
                                        "pE": "d",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 1,
                                        "fx": "cright",
                                        "fxc": "#ffffff",
                                        "fxe": "power4.inOut",
                                        "fxs": 1200,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            },
                            "out": {
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 300,
                                        "f": 300,
                                        "e": "power3.inOut",
                                        "pE": "n",
                                        "x": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "y": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "o": 0,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            }
                        },
                        "p": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "m": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "color": ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"],
                        "font": {
                            "family": "'Kumbh Sans'",
                            "size": ["22px", "22px", "19px", "18px", "13px"],
                            "weight": [400, 400, 400, 400, 400],
                            "ls": [0, 0, 0, 0, 0]
                        },
                        "lh": ["34px", "34px", "29px", "26px", "20px"],
                        "type": "text",
                        "toggle": {
                            "text": ""
                        }
                    },
                    "2": {
                        "fluid": {
                            "tx": true,
                            "tr": true,
                            "sp": true
                        },
                        "id": 2,
                        "alias": "Sub-title",
                        "content": {
                            "text": "We are ready to help you"
                        },
                        "size": {
                            "w": ["auto", "auto", "auto", "auto", "auto"],
                            "h": ["auto", "auto", "auto", "auto", "auto"],
                            "minW": ["none", "none", "none", "none", "none"],
                            "minH": ["none", "none", "none", "none", "none"]
                        },
                        "pos": {
                            "x": ["123px", "123px", "107px", "165px", "101px"],
                            "y": ["204px", "204px", "178px", "90px", "72px"],
                            "pos": "absolute",
                            "float": ["none", "none", "none", "none", "none"],
                            "clear": ["none", "none", "none", "none", "none"]
                        },
                        "zIndex": 14,
                        "order": 14,
                        "display": ["block", "block", "block", "block", "block"],
                        "vA": "top",
                        "bg": {
                            "color": {
                                "orig": "transparent",
                                "type": "solid",
                                "string": "transparent"
                            }
                        },
                        "attr": {
                            "aO": "ml",
                            "tO": "ml"
                        },
                        "tl": {
                            "in": {
                                "chars": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 0,
                                        "f": 0,
                                        "e": "power3.inOut",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 0,
                                        "rX": "90deg",
                                        "dir": "start",
                                        "delay": 5,
                                        "xRe": 1,
                                        "yRe": 1,
                                        "off": 0
                                    }, {
                                        "t": 970,
                                        "d": 1750,
                                        "f": 1750,
                                        "e": "power4.inOut",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 1,
                                        "rX": 0,
                                        "dir": "start",
                                        "delay": 10,
                                        "xRe": 1,
                                        "yRe": 1,
                                        "off": 0
                                    }]
                                },
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 0,
                                        "f": 0,
                                        "e": "power3.inOut",
                                        "pE": "d",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 1,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }, {
                                        "t": 970,
                                        "d": 3650,
                                        "f": 3650,
                                        "e": "power3.inOut",
                                        "pE": "d",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 1,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            },
                            "out": {
                                "chars": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 300,
                                        "f": 300,
                                        "e": "power3.inOut",
                                        "x": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "y": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "o": 1,
                                        "dir": "start",
                                        "delay": 5,
                                        "xRe": 1,
                                        "yRe": 1,
                                        "off": 0
                                    }]
                                },
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 300,
                                        "f": 300,
                                        "e": "power3.inOut",
                                        "pE": "n",
                                        "x": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "y": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "o": 0,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            }
                        },
                        "p": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "m": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "color": ["#4d5fe3", "#4d5fe3", "#4d5fe3", "#4d5fe3", "#4d5fe3"],
                        "font": {
                            "family": "reey",
                            "size": ["40px", "40px", "35px", "22px", "18px"],
                            "weight": [400, 400, 400, 400, 400],
                            "ls": [0, 0, 0, 0, 0]
                        },
                        "lh": ["#a", 25, "21", "15", "9"],
                        "type": "text",
                        "toggle": {
                            "text": ""
                        }
                    },
                    "3": {
                        "listen": ["click"],
                        "fluid": {
                            "tx": true,
                            "tr": true,
                            "sp": true
                        },
                        "id": 3,
                        "alias": "Button",
                        "subtype": "button",
                        "content": {
                            "text": "Apply Now",
                            "trans": "uppercase"
                        },
                        "size": {
                            "w": ["auto", "auto", "auto", "auto", "auto"],
                            "h": ["auto", "auto", "auto", "auto", "auto"],
                            "minW": ["none", "none", "none", "none", "none"],
                            "minH": ["0px", "0px", "none", "none", "none"]
                        },
                        "pos": {
                            "x": ["15px", "15px", "15px", "15px", "10px"],
                            "y": ["220px", "220px", "154px", "127px", "103px"],
                            "v": ["middle", "middle", "middle", "middle", "middle"],
                            "pos": "absolute",
                            "float": ["none", "none", "none", "none", "none"],
                            "clear": ["none", "none", "none", "none", "none"]
                        },
                        "zIndex": 11,
                        "order": 11,
                        "display": ["block", "block", "block", "block", "block"],
                        "vA": "top",
                        "bg": {
                            "color": {
                                "type": "solid",
                                "orig": "#243b97",
                                "string": "rgba(36, 59, 151, 1)"
                            }
                        },
                        "attr": {
                            "aO": "ml",
                            "class": "btn-rev-slider",
                            "tO": "ml",
                            "iClass": "sr7-btn"
                        },
                        "tl": {
                            "in": {
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 0,
                                        "f": 0,
                                        "e": "power3.out",
                                        "pE": "d",
                                        "x": ["175%", "175%", "175%", "175%", "175%"],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 1,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }, {
                                        "t": 1240,
                                        "d": 1000,
                                        "f": 1000,
                                        "e": "power3.out",
                                        "pE": "d",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "o": 1,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                },
                                "mask": {
                                    "all": [{
                                        "t": 0,
                                        "d": 0,
                                        "f": 0,
                                        "e": "power3.out",
                                        "x": ["-100%", "-100%", "-100%", "-100%", "-100%"],
                                        "y": [0, 0, 0, 0, 0],
                                        "oflow": "hidden",
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }, {
                                        "t": 1240,
                                        "d": 1000,
                                        "f": 1000,
                                        "e": "power3.out",
                                        "x": [0, 0, 0, 0, 0],
                                        "y": [0, 0, 0, 0, 0],
                                        "oflow": "hidden",
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            },
                            "out": {
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 300,
                                        "f": 300,
                                        "e": "power3.inOut",
                                        "pE": "n",
                                        "x": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "y": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "o": 0,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                },
                                "mask": {
                                    "all": [{
                                        "t": 0,
                                        "d": 300,
                                        "f": 300,
                                        "e": "power3.inOut",
                                        "oflow": "visible",
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            }
                        },
                        "p": {
                            "t": [0, 0, 0, 5, 5],
                            "b": [0, 0, 0, 3, 3],
                            "l": [45, 45, 39, 20, 18],
                            "r": [45, 45, 39, 20, 18]
                        },
                        "m": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "hov": {
                            "u": true,
                            "m": false,
                            "deco": "none",
                            "zIndex": "auto",
                            "color": {
                                "c": "#ffffff",
                                "bg": {
                                    "type": "solid",
                                    "orig": "#4d5fe3",
                                    "string": "rgba(77, 95, 227, 1)"
                                },
                                "gAnim": "fading"
                            },
                            "border": {
                                "c": "transparent",
                                "s": "none",
                                "w": {
                                    "t": [0, 0, 0, 0, 0],
                                    "r": [0, 0, 0, 0, 0],
                                    "b": [0, 0, 0, 0, 0],
                                    "l": [0, 0, 0, 0, 0]
                                }
                            },
                            "radius": {
                                "t": "10px",
                                "r": "10px",
                                "b": "10px",
                                "l": "10px"
                            },
                            "frame": {
                                "o": 1,
                                "oX": "50%",
                                "oY": "50%",
                                "oZ": "50%",
                                "x": "inherit",
                                "y": "inherit",
                                "z": "inherit",
                                "rZ": "inherit",
                                "rX": "inherit",
                                "rY": "inherit",
                                "sX": "inherit",
                                "sY": "inherit",
                                "skX": 0,
                                "skY": 0,
                                "d": 300,
                                "e": "power1.out"
                            },
                            "filter": {
                                "g": 0,
                                "r": "120%",
                                "b": 0
                            },
                            "svg": {
                                "c": "#ffffff",
                                "stroke": {
                                    "c": "transparent",
                                    "d": 0,
                                    "o": 0,
                                    "w": 0
                                }
                            }
                        },
                        "radius": {
                            "t": "10px",
                            "r": "10px",
                            "b": "10px",
                            "l": "10px"
                        },
                        "color": ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"],
                        "font": {
                            "family": "'Kumbh Sans'",
                            "size": ["14px", "14px", "14px", "12px", "10px"],
                            "weight": ["700", "700", "700", "700", "700"],
                            "ls": ["2px", "2px", "1px", "2px", "2px"]
                        },
                        "lh": ["58px", "58px", "50px", "40px", "32px"],
                        "tag": "a",
                        "target": "_blank",
                        "href": "https:apply-now",
                        "rel": "nofollow noopener",
                        "type": "text",
                        "toggle": {
                            "text": ""
                        }
                    },
                    "12": {
                        "fluid": {
                            "tx": true,
                            "tr": true,
                            "sp": true
                        },
                        "id": 12,
                        "alias": "Title",
                        "content": {
                            "text": "Education and \nConsulting"
                        },
                        "size": {
                            "w": ["#a", "auto", "auto", "auto", "auto"],
                            "h": ["#a", "auto", "auto", "auto", "auto"],
                            "minW": ["none", "none", "none", "none", "none"],
                            "minH": ["none", "none", "none", "none", "none"]
                        },
                        "pos": {
                            "x": ["42px", "42px", "15px", "15px", "10px"],
                            "y": ["-54px", "-54px", "-36px", "-63px", "-38px"],
                            "v": ["middle", "middle", "middle", "middle", "middle"],
                            "pos": "absolute",
                            "float": ["none", "none", "none", "none", "none"],
                            "clear": ["none", "none", "none", "none", "none"]
                        },
                        "zIndex": 13,
                        "order": 13,
                        "display": ["block", "block", "block", "block", "block"],
                        "vA": "top",
                        "bg": {
                            "color": {
                                "orig": "transparent",
                                "type": "solid",
                                "string": "transparent"
                            }
                        },
                        "attr": {
                            "aO": "ml",
                            "tO": "ml"
                        },
                        "tl": {
                            "in": {
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 0,
                                        "f": 0,
                                        "e": "power4.inOut",
                                        "pE": "d",
                                        "x": ["0px", "0px", "0px", "0px", "0px"],
                                        "y": ["0px", "0px", "0px", "0px", "0px"],
                                        "o": 0,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }, {
                                        "t": 250,
                                        "d": 1200,
                                        "f": 1200,
                                        "e": "power4.inOut",
                                        "pE": "d",
                                        "x": ["0px", "0px", "0px", "0px", "0px"],
                                        "y": ["0px", "0px", "0px", "0px", "0px"],
                                        "o": 1,
                                        "fx": "cright",
                                        "fxc": "#ffffff",
                                        "fxe": "power4.inOut",
                                        "fxs": 1200,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            },
                            "out": {
                                "content": {
                                    "pers": "600px",
                                    "orig": {
                                        "x": "50%",
                                        "y": "50%",
                                        "z": "0"
                                    },
                                    "all": [{
                                        "t": 0,
                                        "d": 300,
                                        "f": 300,
                                        "e": "power3.inOut",
                                        "pE": "n",
                                        "x": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "y": ["inherit", "inherit", "inherit", "inherit", "inherit"],
                                        "o": 0,
                                        "xRe": 0,
                                        "yRe": 0,
                                        "off": 0
                                    }]
                                }
                            }
                        },
                        "p": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "m": {
                            "t": [0, 0, 0, 0, 0],
                            "b": [0, 0, 0, 0, 0],
                            "l": [0, 0, 0, 0, 0],
                            "r": [0, 0, 0, 0, 0]
                        },
                        "color": ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"],
                        "font": {
                            "family": "'Kumbh Sans'",
                            "size": ["101", "101", "82px", "70px", "46px"],
                            "weight": ["700", "700", 400, "700", "700"],
                            "ls": [0, 0, 0, 0, 0]
                        },
                        "lh": ["93", "93", "90px", "70px", "48px"],
                        "type": "text",
                        "toggle": {
                            "text": ""
                        }
                    },
                    "13": {
                        "rTo": "slide",
                        "id": 13,
                        "alias": "Slide BG Layer",
                        "subtype": "slidebg",
                        "size": {
                            "cMode": "cover"
                        },
                        "pos": {
                            "h": ["center", "center", "center", "center", "center"],
                            "v": ["center", "center", "center", "center", "center"],
                            "pos": "absolute"
                        },
                        "zIndex": 0,
                        "order": 0,
                        "display": ["block", "block", "block", "block", "block"],
                        "bg": {
                            "image": {
                                "ratio": 1.7777777777777777,
                                "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-6.jpg",
                                "lib": "medialibrary",
                                "lib_id": 2030,
                                "lib_size": "",
                                "fromStream": false,
                                "streamType": "gallery",
                                "pos": {
                                    "x": "50%",
                                    "y": "50%"
                                },
                                "repeat": "",
                                "size": "cover",
                                "sizeVal": "100%",
                                "seo": false
                            }
                        },
                        "tl": {
                            "in": {
                                "bg": {
                                    "ms": 1000,
                                    "rnd": true,
                                    "rndmain": "basic"
                                }
                            }
                        },
                        "mod": {
                            "s": {
                                "u": true,
                                "x": 0,
                                "y": "45",
                                "s": 0,
                                "e": "power3.out",
                                "ut": false,
                                "rX": 0,
                                "rY": 0,
                                "rZ": 0,
                                "sc": 1
                            },
                            "mask": false
                        },
                        "type": "shape"
                    }
                }
            },
            "2": {
                "id": 2,
                "slide": {
                    "addOns": [],
                    "id": 2,
                    "version": "6.7.15",
                    "actions": [{
                        "a": "link",
                        "evt": "click",
                        "http": "keep",
                        "target": "_blank",
                        "flw": "nofollow",
                        "ltype": "a",
                        "link": "https:apply-now\/",
                        "src": [3]
                    }],
                    "title": "Slide",
                    "parentId": null,
                    "language": "default",
                    "order": 2,
                    "thumb": {
                        "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-5-100x50.jpg",
                        "srcId": "",
                        "admin": "",
                        "adminId": "",
                        "dimension": "slider",
                        "default": {
                            "image": {
                                "src": "https:wp-content\/uploads\/2024\/07\/FM-Education-5.jpg",
                                "repeat": "",
                                "size": "cover",
                                "pos": {
                                    "x": "50%",
                                    "y": "0%"
                                }
                            }
                        }
                    },
                    "description": "",
                    "attr": {
                        "class": "",
                        "data": "",
                        "id": "",
                        "a": "",
                        "aO": "ml",
                        "t": "",
                        "tO": "",
                        "deepLink": "",
                        "attr": ""
                    },
                    "publish": {
                        "from": "",
                        "to": "",
                        "state": ""
                    },
                    "slideshow": {
                        "stop": false,
                        "len": "default",
                        "hal": 0,
                        "hom": false,
                        "hfn": false
                    },
                    "loop": {
                        "u": false,
                        "r": -1,
                        "s": 0,
                        "e": 99999
                    }
                },
                "layers": []
            },
            "5": {
                "id": "5",
                "slide": {
                    "addOns": [],
                    "id": 5,
                    "version": "6.7.15",
                    "title": "Global Layers",
                    "parentId": null,
                    "language": "default",
                    "oflow": false,
                    "global": true,
                    "respVP": true,
                    "pos": "front",
                    "fullHeight": true
                },
                "layers": []
            }
        },
        "id": "1",
        "addOns": []
    };
    if (SR7.F.init) SR7.F.init(); // DOUBLE CALL NOT A PROBLEM, MANAGED IN INIT
    document.addEventListener('DOMContentLoaded', function() {
        if (SR7.F.init) SR7.F.init();
        else SR7.shouldBeInited = true;
    });
    window.addEventListener('load', function() {
        if (SR7.F.init) SR7.F.init();
        else SR7.shouldBeInited = true;
    });
    SR7.E.transtable ? ? = {};
    SR7.E.transtable = JSON.parse('{\"boxes\":{\"fade\":{\"boxfadedir1\":{\"title\":\"*zoom_out_map* Center\",\"d\":\"15\",\"in\":{\"o\":0,\"sx\":\"1.1\",\"sy\":\"1.1\",\"m\":true,\"row\":30,\"col\":30},\"out\":{\"a\":false},\"f\":\"center\"}},\"effects\":{\"boxslidehnm3d\":{\"title\":\"*view_in_ar* Slide Horiz.\",\"d\":\"50\",\"f\":\"edges\",\"in\":{\"o\":\"-0.5\",\"x\":\"(15%)\",\"sy\":\"0.8\",\"sx\":\"0.8\",\"row\":5,\"col\":5},\"out\":{\"o\":\"0.5\",\"x\":\"(-15%)\",\"sy\":\"0.8\",\"sx\":\"0.8\",\"row\":5,\"col\":5},\"d3\":{\"f\":\"cube\",\"d\":\"horizontal\",\"z\":\"450\",\"t\":\"20\",\"c\":\"#ccc\",\"e\":\"power2.inOut\",\"su\":\"true\",\"smi\":\"0\",\"sma\":\"0.5\",\"sc\":\"#9e9e9e\"}}},\"slide\":{\"boxslidev\":{\"title\":\"*north* Mask\",\"d\":\"20\",\"in\":{\"o\":0,\"m\":\"true\",\"y\":\"(100%)\",\"sy\":\"2\",\"sx\":\"2\",\"row\":5,\"col\":5},\"f\":\"center\"}},\"circle\":{\"edgetocenterbox\":{\"title\":\"*crop_free* Edge Big\",\"f\":\"edges\",\"d\":\"15\",\"speed\":\"1000\",\"in\":{\"o\":0,\"r\":\"[-10|10]\",\"sx\":\"0.1\",\"sy\":\"0.1\",\"row\":8,\"col\":8,\"x\":\"[-10|10]\",\"y\":\"[-10|10]\"}}},\"zoom\":{\"boxfade\":{\"title\":\"*shuffle* Random\",\"in\":{\"o\":0,\"sx\":1.1,\"sy\":1.1,\"m\":true,\"row\":5,\"col\":5},\"out\":{\"a\":false},\"f\":\"random\"}}},\"rows\":{\"effects\":{\"slotslide-hhh-3d\":{\"title\":\"*view_in_ar* Vary Horiz.\",\"speed\":\"2000\",\"in\":{\"x\":\"[100%,-100%]\",\"m\":true,\"row\":8},\"f\":\"edges\",\"d\":\"35\",\"d3\":{\"f\":\"cube\",\"d\":\"horizontal\",\"z\":\"450\",\"t\":\"20\",\"c\":\"#ccc\",\"e\":\"power2.inOut\",\"su\":\"true\",\"smi\":\"0\",\"sma\":\"0.5\",\"sc\":\"#9e9e9e\"}}},\"zoom\":{\"slotzoom-vertical\":{\"title\":\"*blur_on* Blur\",\"f\":\"nodelay\",\"filter\":{\"u\":true,\"b\":\"2\",\"e\":\"default\"},\"in\":{\"row\":\"6\",\"e\":\"power2.inOut\",\"m\":\"true\",\"sx\":\"1.2\",\"sy\":\"1.5\",\"o\":\"0\"}}}},\"basic\":{\"slideinout\":{\"slidevertical\":{\"title\":\"*swap_vert* Auto Direction\",\"in\":{\"o\":\"1\",\"y\":\"(100%)\"},\"out\":{\"y\":\"(-100%)\"}}},\"zoomslidein\":{\"scaledownfromright\":{\"title\":\"*east*\",\"in\":{\"o\":\"1\",\"x\":\"-100%\"},\"out\":{\"a\":false,\"sx\":\"0.85\",\"sy\":\"0.85\",\"o\":\"1\"}}},\"slideinoutfadein\":{\"fadefrombottom\":{\"title\":\"*north*\",\"in\":{\"o\":0,\"y\":\"100%\"},\"out\":{\"a\":false}}}}}');
    SR7.E.v6v7ids ? ? = {}
        SR7.E.v6v7ids = JSON.parse('{\"n\":{\"1\":1,\"2\":2},\"s\":{\"1\":5}}');
</script>
  @stack('scripts')

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
