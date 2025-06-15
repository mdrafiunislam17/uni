<style>
    /* Mobile-friendly styles */
    .navbar-interactive-container01 {
      width: 100%;
      background-color: white;
    }

    .navbar-interactive-navbar-interactive {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
    }

    /* Hide menu on mobile */
    .navbar-interactive-desktop-menu {
      display: none;
    }

    /* Burger menu */
    .navbar-interactive-burger-menu {
      display: block;
      cursor: pointer;
    }

    .navbar-interactive-mobile-menu {
      display: none;
      position: absolute;
      top: 60px;
      left: 0;
      width: 100%;
      background: white;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-interactive-mobile-menu.open {
      display: block;
    }

    .navbar-interactive-links1 {
      display: flex;
      flex-direction: column;
      padding: 10px;
    }

    .navbar-interactive-links1 a {
      padding: 15px;
      text-decoration: none;
      color: black;
      font-size: 18px;
    }

    @media (min-width: 768px) {
      .navbar-interactive-desktop-menu {
        display: flex;
      }
      .navbar-interactive-burger-menu {
        display: none;
      }
    }
    .mobile-country-nav {
  width: 100%;
  padding: 10px 20px;
}

.mobile-country-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.mobile-country-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #f4f4f4;
  border-radius: 12px;
  padding: 16px 20px;
  text-decoration: none;
  color: #000;
  font-size: 18px;
  font-weight: 500;
  transition: background 0.2s ease;
}

.mobile-country-item:hover {
  background: #e2e2e2;
}

.mobile-country-item img {
  width: 36px;
  height: 36px;
  object-fit: contain;
}

/* Responsive support */
@media (min-width: 768px) {

    .study-abroad-container {
    width: 100%;
    height: auto;
    display: flex
;
    overflow: hidden;
    min-height: 45vh;
    align-items: center;
    flex-direction: column;
}
}

  </style>


<div class="study-in-usa-container01">
  <div
    class="navbar-interactive-container navbar-interactive-root-class-name5">
    <header data-thq="thq-navbar" class="navbar-interactive-navbar-interactive" >
      <div data-thq="thq-navbar-nav" class="navbar-interactive-desktop-menu" >

        <nav class="navbar-interactive-links " style="padding-left:100px; padding-top:50px ">
          <div class="navbar-interactive-container1 ">
            <div data-thq="thq-dropdown" class="navbar-interactive-thq-dropdown list-item" >
              <a href="{{route('abroad.university', 'Canada')}}">
                <div data-thq="thq-dropdown-toggle" class="navbar-interactive-dropdown-toggle" style="height: 100px">
                  <span class="navbar-interactive-text" style="font-size: 40px; font-family:Times New Roman;">
                    <span>Canada</span>
                  </span>
                  <img alt="image" src="{{ asset('images/icons8-canada-48-200h.png')}}"
                    class="navbar-interactive-image" style="height: 40px; width:40px"  />
                </div>
              </a>
            </div>
          </div>
          <div class="navbar-interactive-container2">
            <div data-thq="thq-dropdown" class="navbar-interactive-thq-dropdown03 list-item"  style="padding-left: 20px">
              <a href="{{route('abroad.university', 'Australia')}}">
                <div data-thq="thq-dropdown-toggle" class="navbar-interactive-dropdown-toggle15" >
                  <span class="navbar-interactive-text13" style="font-size: 40px; font-family:Times New Roman;">
                    <span>Australia</span>
                  </span>
                  <img
                    alt="image"
                    src="{{ asset('images/australia1-200h.png')}}"
                    class="navbar-interactive-image1"  style="height: 40px; width:40px"
                  />
                </div>
              </a>
            </div>
          </div>
          <div class="navbar-interactive-container3">
            <div data-thq="thq-dropdown" class="navbar-interactive-thq-dropdown06 list-item" style="padding-left: 20px">
              <a href="{{route('abroad.university', 'United Kingdom')}}">
                <div
                  data-thq="thq-dropdown-toggle"
                  class="navbar-interactive-dropdown-toggle30"
                >
                  <span class="navbar-interactive-text26" style="font-size: 40px; font-family:Times New Roman;">
                    <span>UK</span>
                  </span>
                  <img
                    alt="image"
                    src="{{ asset('images/icons8-united-kingdom-48-200h.png')}}"
                    class="navbar-interactive-image2"  style="height: 40px; width:40px"
                  />
                </div>
              </a>
            </div>
          </div>
          <div class="navbar-interactive-container4">
            <div data-thq="thq-dropdown" class="navbar-interactive-thq-dropdown09 list-item" style="padding-left: 20px">
              <a href="{{route('abroad.university', 'United States')}}">
                <div data-thq="thq-dropdown-toggle" class="navbar-interactive-dropdown-toggle45" >
                  <span class="navbar-interactive-text39" style="font-size: 40px; font-family:Times New Roman;">
                    <span>Usa</span>
                  </span>
                  <img
                    alt="image"
                    src="{{ asset('images/icons8-usa-48-200h.png')}}"
                    class="navbar-interactive-image3"  style="height: 40px; width:40px"
                  />
                </div>
              </a>
            </div>
          </div>
          <div class="navbar-interactive-container5">
            <div data-thq="thq-dropdown" class="navbar-interactive-thq-dropdown12 list-item" style="padding-left: 20px" >
              <a href="{{route('abroad.university', 'Malaysia')}}">
                <div data-thq="thq-dropdown-toggle" class="navbar-interactive-dropdown-toggle60" >
                  <span class="navbar-interactive-text52" style="font-size: 40px; font-family:Times New Roman;">
                    <span>Malaysia</span>
                  </span>
                  <img
                    alt="image"
                    src="{{ asset('images/icons8-malaysia-48-200h.png')}}"
                    class="navbar-interactive-image4"  style="height: 40px; width:40px"
                  />
                </div>
              </a>
            </div>
          </div>
        </nav>

      </div>

      <div data-thq="thq-burger-menu" class="navbar-interactive-burger-menu">
        <svg viewBox="0 0 1024 1024" class="navbar-interactive-icon36">
          <path
            d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
          ></path>
        </svg>
      </div>
      <div data-thq="thq-mobile-menu" class="navbar-interactive-mobile-menu">
        <div class="navbar-interactive-nav">
          <div class="navbar-interactive-top">

            <div data-thq="thq-close-menu" class="navbar-interactive-close-menu">
              <svg viewBox="0 0 1024 1024" class="navbar-interactive-icon38" >
                <path  d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"
                ></path>
              </svg>
            </div>
          </div>

          <nav class="mobile-country-nav">
            <ul class="mobile-country-list">
              <li>
                <a href="{{ route('abroad.university', 'Canada') }}" class="mobile-country-item">
                  <span style="font-family:Times New Roman;">Canada</span>
                  <img src="{{ asset('images/icons8-canada-48-200h.png') }}" alt="Canada" />
                </a>
              </li>
              <li>
                <a href="{{ route('abroad.university', 'Australia') }}" class="mobile-country-item">
                  <span style="font-family:Times New Roman;">Australia</span>
                  <img src="{{ asset('images/australia1-200h.png') }}" alt="Australia" />
                </a>
              </li>
              <li>
                <a href="{{ route('abroad.university', 'United Kingdom') }}" class="mobile-country-item">
                  <span style="font-family:Times New Roman;">UK</span>
                  <img src="{{ asset('images/icons8-united-kingdom-48-200h.png') }}" alt="UK" />
                </a>
              </li>
              <li>
                <a href="{{ route('abroad.university', 'United States') }}" class="mobile-country-item">
                  <span style="font-family:Times New Roman;">Usa</span>
                  <img src="{{ asset('images/icons8-usa-48-200h.png') }}" alt="USA" />
                </a>
              </li>
              <li>
                <a href="{{ route('abroad.university', 'Malaysia') }}" class="mobile-country-item">
                  <span style="font-family:Times New Roman;">Malaysia</span>
                  <img src="{{ asset('images/icons8-malaysia-48-200h.png') }}" alt="Malaysia" />
                </a>
              </li>
            </ul>
          </nav>


        </div>

      </div>
    </header>
  </div>
</div>
