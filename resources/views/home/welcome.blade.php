@extends('home.layout.default')

@section('content')
<main id="main">

    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(https://uploads-ssl.webflow.com/6436c2585cb0dc081fbc8cfe/643735408ac92318b999c85a_Road-Ambulance-Services.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Ambunalce</span></h2>
                <p class="animate__animated animate__fadeInUp">We at Assignment Help Pro understand the struggles students face in school. Our goal is to support your academic success by guiding you through challenging assignments. Join up with us to overcome obstacles and improve your educational experience.</p>
                <a href="emergencybooking/step1" class="btn-get-started animate__animated animate__fadeInUp">Emergency Booking</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(https://th-i.thgim.com/public/incoming/z10gvf/article67272757.ece/alternates/LANDSCAPE_1200/15EPBS_LEAD.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown">Lorem <span>Ipsum Dolor</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="emergencybooking/step1" class="btn-get-started animate__animated animate__fadeInUp">Emergency Booking</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(https://i.pinimg.com/originals/f7/d8/d1/f7d8d12e20b35e984bd385f62023fa0e.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea <span>Dime Lara</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="emergencybooking/step1" class="btn-get-started animate__animated animate__fadeInUp">Emergency Booking</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section>
  <!-- End Hero -->

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="bi bi-clock-history"></i>
              <h3><a href="">QUICK RESPONSE</a></h3>
              <p>Our ambulances are equipped to respond swiftly to emergencies, ensuring timely arrival and prompt medical assistance.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-shield-check"></i>
              <h3><a href="">EXPERIENCE STAFF</a></h3>
              <p>Our team consists of highly trained medical professionals who prioritize patient care and safety.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-search"></i>
              <h3><a href="">COMPREHENSIVE COVERAGE</a></h3>
              <p>We provide ambulance services across the city, ensuring accessibility to emergency care whenever and wherever needed.</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Featured Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="{{asset('img/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Best Ambulances Available for You: Trusted Ambulance Services in Your City</h3>
            <p class="fst-italic">
            Emergency Ambulance Booking is a 100% Sri Lankan emergency service.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Emergency Drugs</li>
              <li><i class="bi bi-check-circle"></i> Critical Care Transport</li>
              <li><i class="bi bi-check-circle"></i> Event Medical Services</li>
              <li><i class="bi bi-check-circle"></i> Community Paramedicine Programs</li>
              <li><i class="bi bi-check-circle"></i> Disaster Response Teams</li>

            </ul>
            <p>
            At Emergency Ambulance Booking, we are committed to ensuring the health and safety of every Sri Lankan. As dedicated stewards of public well-being, we continuously monitor the evolving landscape of the coronavirus (COVID-19) pandemic. With unwavering diligence, we proactively implement stringent measures to fortify the resilience of our communities against the challenges posed by this global health crisis. Your safety is our paramount concern, and we spare no effort in safeguarding your welfare during these unprecedented times.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p><strong>Happy Clients</strong> Our contented patrons are a testament to the excellence of our ambulance services.</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p><strong>Bookings</strong> Seamless access to our ambulance services for swift assistance</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p><strong>Hours Of Support</strong> Our team is available 24/7 to provide aid whenever needed</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p><strong>Hard Workers</strong> Our diligent experts ensure swift ambulance services, working tirelessly regardless</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">
        <div class="section-title">
          <h2>Care Partners</h2>
          <p>Uncover the renowned hospitals that depend on our trusted ambulance services to guarantee swift and effective transportation for their patients, ensuring utmost care and safety throughout the journey.</p>
        </div>
        <div class="clients-slider swiper">
           <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-1.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-2.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-3.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-4.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-5.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-6.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-7.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-8.png') }}" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End Clients Section -->

     @include('home.elements.footer')
     
  </main>
  <!-- End #main -->

  @endsection