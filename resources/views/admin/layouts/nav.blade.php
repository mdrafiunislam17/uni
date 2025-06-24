<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Right Side -->
    <ul class="navbar-nav ml-auto">

        <!-- External Link -->
        <li class="nav-item">
            <a class="nav-link" target="_blank" href="{{ route('home') }}">
                <i class="fas fa-globe"></i>&nbsp;uni-matchglobal.co.uk&nbsp;<i class="fas fa-external-link-alt"></i>
            </a>
        </li>

        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ auth()->user()["name"] }}
                </span>
            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </div>

            <!-- Hidden Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

</nav>
