@extends('home.layout.default')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Services</li>
            </ol>
            <h2>Services</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-pen"></i></div>
                        <h4><a href="">Assignment Writing</a></h4>
                        <p>Our team of experts assists you in crafting well-researched and high-quality assignments
                            across various academic levels and subjects.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Research Assistance</a></h4>
                        <p>Get comprehensive support in your research endeavors, including literature review, data
                            analysis, and report writing.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-journal-bookmark-fill"></i></div>
                        <h4><a href="">Proofreading & Editing</a></h4>
                        <p>Our professionals meticulously review and edit your content to enhance its clarity,
                            coherence, and overall quality.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-search"></i></div>
                        <h4><a href="">Plagiarism Check</a></h4>
                        <p>We guarantee 100% plagiarism-free content, using advanced tools to ensure originality.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="">Unlimited Revisions</a></h4>
                        <p>Your satisfaction is our priority. We offer unlimited revisions to make sure your work aligns
                            perfectly with your expectations.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-clock-history"></i></div>
                        <h4><a href="">Timely Delivery</a></h4>
                        <p>We are committed to delivering your assignments promptly, backed by our on-time delivery
                            guarantee.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

   
    @include('home.elements.footer')
</main>



  @endsection