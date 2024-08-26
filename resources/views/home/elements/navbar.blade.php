<!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">ambulance@outlook.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+94 00 000 000</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">Ambulance</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

   <nav id="navbar" class="navbar">
    <ul>
        <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
        <li><a class="{{ Request::routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
        <li><a class="{{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
        <li><a class="{{ Request::routeIs('ambulance','ambulanceDetails') ? 'active' : '' }}" href="{{ route('ambulance') }}">Ambulance</a></li>
        <li><a class="{{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
        @guest
            <li><a href="{{ route('login') }}" type="submit" class="btn">Sign in</a></li>
        @else
            <li><a class="{{ Request::routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Dashboard</a></li>
        @endguest
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->