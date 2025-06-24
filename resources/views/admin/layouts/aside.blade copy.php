<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->


      <li class="nav-item">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('uploads/' . $settings['SETTING_SITE_LOGO']) }}" class="w-100" alt="uni-matchglobal Logo">
            </div>
            <div class="sidebar-brand-text mx-2 mt-1 font-weight-bold" title="uni-matchglobal">
                uni-matchglobal
            </div>
        </a>
    </li>



    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>



    <li class="nav-item {{
    request()->routeIs("sliders.index") ||
    request()->routeIs("sliders.create") ||
    request()->routeIs("sliders.show") ||
    request()->routeIs("sliders.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("sliders.index") }}">
            <i class="fas fa-fw fa-tablet"></i>
            <span>Sliders</span>
        </a>
    </li>


       <li class="nav-item {{
    request()->routeIs("courseCategorics.index") ||
    request()->routeIs("courseCategorics.create") ||
    request()->routeIs("courseCategorics.show") ||
    request()->routeIs("courseCategorics.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("courseCategorics.index") }}">
            <i class="fas fa-folder-open"></i>
            <span>Course Category</span>
        </a>
    </li>


    <li class="nav-item {{
    request()->routeIs("courses.index") ||
    request()->routeIs("courses.create") ||
    request()->routeIs("courses.show") ||
    request()->routeIs("courses.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("courses.index") }}">
            <i class="fas fa-book"></i>
            <span>Courses</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs("team.index") ||
    request()->routeIs("team.create") ||
    request()->routeIs("team.show") ||
    request()->routeIs("team.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("team.index") }}">
           <i class="fas fa-chalkboard-teacher"></i>
            <span>Team</span>
        </a>
    </li>


    <li class="nav-item {{
    request()->routeIs("testimonial.index") ||
    request()->routeIs("testimonial.create") ||
    request()->routeIs("testimonial.show") ||
    request()->routeIs("testimonial.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("testimonial.index") }}">
            <i class="fas fa-comments"></i>
            <span>Testimonial</span>
        </a>
    </li>



    <li class="nav-item {{
    request()->routeIs('visa.index') ||
    request()->routeIs('visa.create') ||
    request()->routeIs('visa.show') ||
    request()->routeIs('visa.edit')
    ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('visa.index') }}">
            <i class="fas fa-passport"></i>
            <span>Visa Type</span>
        </a>
    </li>



    <li class="nav-item {{
    request()->routeIs("applications.index") ||
    request()->routeIs("applications.create") ||
    request()->routeIs("applications.show") ||
    request()->routeIs("applications.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("applications.index") }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Application</span>
        </a>
    </li>


    <li class="nav-item {{
    request()->routeIs("faq.index") ||
    request()->routeIs("faq.create") ||
    request()->routeIs("faq.show") ||
    request()->routeIs("faq.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("faq.index") }}">
            <i class="fas fa-question-circle"></i>
            <span>FAQ</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs("contact.index") ||
    request()->routeIs("contact.create") ||
    request()->routeIs("contact.show") ||
    request()->routeIs("contact.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("contact.index") }}">
            <i class="fas fa-envelope"></i>
            <span>Contact</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs("about.index") ||
    request()->routeIs("about.create") ||
    request()->routeIs("about.show") ||
    request()->routeIs("about.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("about.index") }}">
            <i class="fas fa-info-circle"></i>
            <span>About</span>
        </a>
    </li>


        <li class="nav-item  {{
    request()->routeIs("settings.index") ||
    request()->routeIs("settings.update")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("settings.index") }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>





{{--


    <li class="nav-item ">
        <a class="nav-link" href="{{route('role.index')}}">
            <i class="fas fa-id-badge"></i>
            <span> Role</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{route('assignrole.index')}}">
            <i class="fas fa-user-check"></i>
            <span>Assign Role</span>
        </a>
    </li> --}}



</ul>
