<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="LBS TRAINING INSTITUTE - Professional training and certification programs">
    <meta name="author" content="LBS TRAINING INSTITUTE">

    <title>LBS TRAINING INSTITUTE - Quality Education for Your Future</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    
    <style>
    :root {
      --primary-color: #0a77ba;
      --primary-dark: #086092;
      --primary-light: #e1f0fa;
      --secondary-color: #ff6b35;
      --dark-color: #2e2e2e;
      --light-color: #f8f9fa;
      --gray-color: #6c757d;
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--light-color);
      color: var(--dark-color);
      overflow-x: hidden;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      line-height: 1.6;
      transition: var(--transition);
    }
    
    /* Preloader */
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--primary-color);
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: opacity 0.5s ease;
    }
    
    .loader {
      width: 50px;
      height: 50px;
      border: 5px solid rgba(255,255,255,0.3);
      border-radius: 50%;
      border-top-color: white;
      animation: spin 1s ease-in-out infinite;
    }
    
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    
    /* Navigation */
    .navbar-custom {
      background: rgba(10, 119, 186, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 15px 0;
      transition: var(--transition);
    }
    
    .navbar-custom.scrolled {
      padding: 10px 0;
      background: rgba(8, 96, 146, 0.98) !important;
    }
    
    .navbar-brand-custom {
      font-weight: 700;
      font-size: 1.5rem;
      letter-spacing: 0.5px;
      color: white !important;
      display: flex;
      align-items: center;
    }
    
    .nav-link-custom {
      font-weight: 500;
      padding: 0.5rem 1rem !important;
      color: rgba(255,255,255,0.9) !important;
      position: relative;
      transition: var(--transition);
      margin: 0 5px;
      border-radius: 6px;
    }
    
    .nav-link-custom:hover,
    .nav-link-custom.active {
      color: white !important;
      background: rgba(255,255,255,0.1);
    }
    
    .nav-link-custom::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background-color: white;
      transition: var(--transition);
    }
    
    .nav-link-custom:hover::after,
    .nav-link-custom.active::after {
      width: 60%;
    }
    
    /* Mobile menu adjustments */
    .navbar-toggler {
      border: none;
      padding: 0.5rem;
    }
    
    .navbar-toggler:focus {
      box-shadow: none;
    }
    
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    
    /* Hero Section */
    .hero {
      position: relative;
      height: 100vh;
      min-height: 600px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
      overflow: hidden;
    }
    
    .heroText {
      position: relative;
      z-index: 2;
      padding: 0 20px;
    }
    
    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }
    
    .hero p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }
    
    .custom-underline {
      position: relative;
      display: inline-block;
    }
    
    .custom-underline::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: var(--secondary-color);
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.3s ease;
    }
    
    .custom-underline:hover::after {
      transform: scaleX(1);
      transform-origin: left;
    }
    
    .videoWrapper {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }
    
    .custom-video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      transform: translate(-50%, -50%);
      object-fit: cover;
    }
    
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 1;
    }
    
    /* Section Styling */
    .section-padding {
      padding: 80px 0;
    }
    
    .section-title {
      position: relative;
      margin-bottom: 50px;
      font-weight: 700;
      text-align: center;
    }
    
    .section-title::after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background-color: var(--primary-color);
    }
    
    /* About Section */
    .about-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    /* Image Gallery */
    .gallery-container {
      padding: 20px 0;
    }
    
    .gallery-item {
      margin-bottom: 30px;
      overflow: hidden;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: var(--transition);
    }
    
    .gallery-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    
    .gallery-item img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    
    .gallery-item:hover img {
      transform: scale(1.05);
    }
    
    /* Testimonial Slider */
    .testimonial-slider {
      background-color: var(--primary-light);
      padding: 60px 0;
      border-radius: 12px;
    }
    
    .testimonial-item {
      padding: 30px;
      text-align: center;
    }
    
    .testimonial-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid white;
      margin: 0 auto 20px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .testimonial-text {
      font-style: italic;
      margin-bottom: 20px;
    }
    
    .testimonial-author {
      font-weight: 600;
      color: var(--primary-color);
    }
    
    .testimonial-position {
      color: var(--gray-color);
      font-size: 0.9rem;
    }
    
    /* Portfolio Section */
    .portfolio-thumb {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: var(--transition);
    }
    
    .portfolio-thumb:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    
    .portfolio-image {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    
    .portfolio-thumb:hover .portfolio-image {
      transform: scale(1.05);
    }
    
    .portfolio-info {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 20px;
      background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
      color: white;
    }
    
    /* News Section */
    .news-thumb {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: var(--transition);
      margin-bottom: 30px;
    }
    
    .news-image {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    
    .news-thumb:hover .news-image {
      transform: scale(1.05);
    }
    
    .news-category {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
    }
    
    .news-text-info {
      padding: 20px;
      background-color: white;
    }
    
    .news-title-link {
      color: var(--dark-color);
      text-decoration: none;
      transition: var(--transition);
    }
    
    .news-title-link:hover {
      color: var(--primary-color);
    }
    
    /* Contact Form */
    .contact-form {
      background-color: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    }
    
    .form-control-custom {
      border-radius: 8px;
      padding: 12px 15px;
      border: 1px solid rgba(0,0,0,0.1);
      transition: var(--transition);
    }
    
    .form-control-custom:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(10, 119, 186, 0.25);
    }
    
    /* Footer */
    .footer-custom {
      background: linear-gradient(135deg, var(--dark-color), #1a1a1a);
      color: white;
      padding: 60px 0 30px;
      position: relative;
    }
    
    .footer-custom::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80') center/cover;
      opacity: 0.05;
    }
    
    .footer-logo {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }
    
    .footer-about {
      margin-bottom: 20px;
      color: rgba(255,255,255,0.8);
    }
    
    .footer-links h5 {
      font-weight: 600;
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
      color: white;
    }
    
    .footer-links h5::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 50px;
      height: 2px;
      background-color: var(--primary-color);
    }
    
    .footer-links ul {
      list-style: none;
      padding-left: 0;
    }
    
    .footer-links li {
      margin-bottom: 12px;
    }
    
    .footer-links a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      transition: var(--transition);
      display: inline-block;
    }
    
    .footer-links a:hover {
      color: white;
      padding-left: 8px;
    }
    
    .footer-contact li {
      display: flex;
      align-items: flex-start;
      margin-bottom: 15px;
    }
    
    .footer-contact i {
      margin-right: 12px;
      color: var(--primary-color);
      font-size: 1.1rem;
      margin-top: 3px;
      min-width: 20px;
    }
    
    .social-icons {
      display: flex;
      margin-top: 20px;
      flex-wrap: wrap;
    }
    
    .social-icons a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background-color: rgba(255,255,255,0.1);
      border-radius: 50%;
      margin-right: 10px;
      margin-bottom: 10px;
      color: white;
      transition: var(--transition);
    }
    
    .social-icons a:hover {
      background-color: var(--primary-color);
      transform: translateY(-5px);
    }
    
    .copyright {
      border-top: 1px solid rgba(255,255,255,0.1);
      padding-top: 20px;
      margin-top: 40px;
      text-align: center;
      color: rgba(255,255,255,0.6);
      font-size: 0.9rem;
    }
    
    .copyright a {
      color: var(--primary-light);
      text-decoration: none;
      transition: var(--transition);
    }
    
    .copyright a:hover {
      color: white;
      text-decoration: underline;
    }
    
    /* Back to Top Button */
    .back-to-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background-color: var(--primary-color);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      cursor: pointer;
      opacity: 0;
      visibility: hidden;
      transition: var(--transition);
      z-index: 99;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      border: none;
    }
    
    .back-to-top.active {
      opacity: 1;
      visibility: visible;
    }
    
    .back-to-top:hover {
      background-color: var(--primary-dark);
      transform: translateY(-5px) scale(1.1);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 1199.98px) {
      .navbar-brand-custom {
        font-size: 1.4rem;
      }
      
      .hero h1 {
        font-size: 3rem;
      }
    }
    
    @media (max-width: 991.98px) {
      .navbar-collapse {
        background: rgba(8, 96, 146, 0.98);
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      .nav-link-custom {
        margin: 5px 0;
        padding: 10px 15px !important;
      }
      
      .nav-link-custom::after {
        display: none;
      }
      
      .hero h1 {
        font-size: 2.5rem;
      }
      
      .hero p {
        font-size: 1.2rem;
      }
      
      .portfolio-image,
      .news-image,
      .gallery-item img {
        height: 200px;
      }
    }
    
    @media (max-width: 767.98px) {
      .hero {
        min-height: 500px;
      }
      
      .hero h1 {
        font-size: 2.2rem;
      }
      
      .section-padding {
        padding: 60px 0;
      }
      
      .footer-links {
        margin-bottom: 30px;
      }
      
      .contact-form {
        padding: 30px;
      }
    }
    
    @media (max-width: 575.98px) {
      .navbar-brand-custom {
        font-size: 1.3rem;
      }
      
      .hero h1 {
        font-size: 2rem;
      }
      
      .hero p {
        font-size: 1rem;
      }
      
      .back-to-top {
        width: 45px;
        height: 45px;
        font-size: 1rem;
        bottom: 20px;
        right: 20px;
      }
      
      .portfolio-image,
      .news-image,
      .gallery-item img {
        height: 180px;
      }
    }
    </style>
</head>

<body>
    
    <main>
        <!-- Hero Section -->
        <section class="hero" id="hero">
            <div class="heroText">
                <h1 class="text-white mb-4" data-aos="zoom-in" data-aos-delay="800">
                    LBS TRAINING INSTITUTE
                </h1>

                <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="1000">
                    QUALITY EDUCATION <strong class="custom-underline">FOR YOUR FUTURE</strong>
                </p>
                
                <a href="#courses" class="btn btn-primary btn-lg px-4 py-2" data-aos="fade-up" data-aos-delay="1200">
                    Explore Courses <i class="fas fa-arrow-down ms-2"></i>
                </a>
            </div>

            <div class="videoWrapper">
                <video autoplay loop muted class="custom-video" poster="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80">
                    <source src="videos/v1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <div class="overlay"></div>
        </section>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container">
                <a class="navbar-brand navbar-brand-custom" href="#hero">
                    <i class="fas fa-graduation-cap me-2"></i><img src="img/2.jpg" style="height: 50px; width: 200px;">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom active" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="#courses">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- About Section -->
        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title" data-aos="fade-up">About LBS TRAINING INSTITUTE</h2>
                    </div>

                    <div class="col-lg-6 col-12 mt-4">
                        <p data-aos="fade-up" data-aos-delay="300">
                            LBS Training Institute is owned by Ladoerr Business Solution Company Limited. The Institute's full registration has been granted number REG/NACTVET/1118. We are committed to providing quality vocational education and training to empower individuals with practical skills for the job market.
                        </p>
                        <p data-aos="fade-up" data-aos-delay="400" class="mt-3">
                            Our mission is to bridge the gap between education and employment by offering industry-relevant courses taught by experienced professionals in state-of-the-art facilities.
                        </p>
                    </div>

                    <div class="col-lg-6 col-12 mt-4">
                        <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="500">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Why Choose Us?</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0"><i class="fas fa-check-circle text-success me-2"></i> Accredited programs</li>
                                    <li class="list-group-item border-0"><i class="fas fa-check-circle text-success me-2"></i> Experienced instructors</li>
                                    <li class="list-group-item border-0"><i class="fas fa-check-circle text-success me-2"></i> Hands-on training</li>
                                    <li class="list-group-item border-0"><i class="fas fa-check-circle text-success me-2"></i> Modern facilities</li>
                                    <li class="list-group-item border-0"><i class="fas fa-check-circle text-success me-2"></i> Career support services</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Slider -->
        <section class="section-padding bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title" data-aos="fade-up">What Our Students Say</h2>
                    </div>
                </div>
                
                <div class="testimonial-slider mt-5" data-aos="fade-up">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="testimonial-item">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Student" class="testimonial-img">
                                    <p class="testimonial-text">"The practical skills I gained at LBS Training Institute helped me secure a job immediately after completing my course. The instructors are knowledgeable and supportive."</p>
                                    <h5 class="testimonial-author">Sarah Johnson</h5>
                                    <p class="testimonial-position">Computer Science Graduate</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-item">
                                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Student" class="testimonial-img">
                                    <p class="testimonial-text">"I appreciated the hands-on approach to learning. The facilities are modern, and the course content is relevant to current industry needs."</p>
                                    <h5 class="testimonial-author">Michael James</h5>
                                    <p class="testimonial-position">Electrical Engineering</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-item">
                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Student" class="testimonial-img">
                                    <p class="testimonial-text">"The business administration course transformed my career. The practical projects gave me confidence to start my own business."</p>
                                    <h5 class="testimonial-author">Amina Hassan</h5>
                                    <p class="testimonial-position">Business Owner</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-primary rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-primary rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section class="section-padding" id="courses">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title" data-aos="fade-up">Our Courses</h2>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="Computer Science">
                            <div class="card-body">
                                <h5 class="card-title">Computer Science</h5>
                                <p class="card-text">Comprehensive training in programming, web development, and IT fundamentals.</p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-clock me-2 text-primary"></i> 6 Months Program</li>
                                    <li><i class="fas fa-certificate me-2 text-primary"></i> Certificate Awarded</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="#contact" class="btn btn-primary w-100">Enquire Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1011&q=80" class="card-img-top" alt="Business Administration">
                            <div class="card-body">
                                <h5 class="card-title">Business Administration</h5>
                                <p class="card-text">Essential business skills including management, accounting, and entrepreneurship.</p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-clock me-2 text-primary"></i> 8 Months Program</li>
                                    <li><i class="fas fa-certificate me-2 text-primary"></i> Diploma Awarded</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="#contact" class="btn btn-primary w-100">Enquire Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="img/ofisi.jpg" class="card-img-top" alt="Electrical Engineering">
                            <div class="card-body">
                                <h5 class="card-title">Electrical Engineering</h5>
                                <p class="card-text">Practical training in electrical installations, maintenance, and renewable energy systems.</p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-clock me-2 text-primary"></i> 12 Months Program</li>
                                    <li><i class="fas fa-certificate me-2 text-primary"></i> Advanced Diploma</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="#contact" class="btn btn-primary w-100">Enquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4" data-aos="fade-up">
                    <a href="#contact" class="btn btn-outline-primary px-4">View All Courses</a>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="section-padding bg-light" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title" data-aos="fade-up">Our Gallery</h2>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Take a look at our campus, facilities, and student activities</p>
                    </div>
                </div>
                
                <div class="row gallery-container">
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" data-lightbox="gallery" data-title="Our Campus">
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Campus" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <a href="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" data-lightbox="gallery" data-title="Classroom Learning">
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="Classroom" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" data-lightbox="gallery" data-title="Practical Sessions">
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="Practical" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80" data-lightbox="gallery" data-title="Computer Lab">
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80" alt="Computer Lab" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <a href="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" data-lightbox="gallery" data-title="Engineering Workshop">
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" alt="Workshop" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" data-lightbox="gallery" data-title="Graduation Ceremony">
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Graduation" class="img-fluid">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="section-padding" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title" data-aos="fade-up">Contact Us</h2>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Get in touch for more information about our programs</p>
                    </div>
                </div>
                
           
                    
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-custom" id="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-custom" id="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control form-control-custom" id="subject">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-custom" id="message" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Interested In</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="course1">
                                    <label class="form-check-label" for="course1">Computer Science</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="course2">
                                    <label class="form-check-label" for="course2">Business Administration</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="course3">
                                    <label class="form-check-label" for="course3">Electrical Engineering</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 py-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="google-map">
            <iframe src="https://maps.google.com/maps?q=Dar+es+Salaam,+Tanzania&t=&z=13&ie=UTF8&iwloc=&output=embed" class="map-iframe" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="footer-logo">
                        <i class="fas fa-graduation-cap me-2"></i>LBS TRAINING INSTITUTE
                    </div>
                    <p class="footer-about">
                        LBS Training Institute is a premier vocational training center offering quality education and practical skills development for career advancement.
                    </p>
                    <div class="social-icons">
                        <a href="https://facebook.com" target="_blank" data-bs-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com" target="_blank" data-bs-toggle="tooltip" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com" target="_blank" data-bs-toggle="tooltip" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank" data-bs-toggle="tooltip" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-5 mb-md-0">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="#hero"><i class="fas fa-chevron-right me-2"></i>Home</a></li>
                            <li><a href="#about"><i class="fas fa-chevron-right me-2"></i>About Us</a></li>
                            <li><a href="#courses"><i class="fas fa-chevron-right me-2"></i>Courses</a></li>
                            <li><a href="#gallery"><i class="fas fa-chevron-right me-2"></i>Gallery</a></li>
                            <li><a href="#contact"><i class="fas fa-chevron-right me-2"></i>Contact</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 mb-5 mb-md-0">
                    <div class="footer-links">
                        <h5>Our Courses</h5>
                        <ul>
                            <li><a href="#courses"><i class="fas fa-chevron-right me-2"></i>Computer Science</a></li>
                            <li><a href="#courses"><i class="fas fa-chevron-right me-2"></i>Business Admin</a></li>
                            <li><a href="#courses"><i class="fas fa-chevron-right me-2"></i>Electrical Engineering</a></li>
                            <li><a href="#courses"><i class="fas fa-chevron-right me-2"></i>Vocational Training</a></li>
                            <li><a href="#courses"><i class="fas fa-chevron-right me-2"></i>Short Courses</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4">
                    <div class="footer-links">
                        <h5>Contact Info</h5>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>123 Education Road, Dar es Salaam, Tanzania</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>+255 768 890 4928</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>info@lbsinstitute.co.tz</span>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span>Mon-Fri: 8:00 AM - 5:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                &copy; <script>document.write(new Date().getFullYear())</script> <strong>LBS TRAINING INSTITUTE</strong>. All Rights Reserved. <br>
                <span class="d-block d-sm-inline-block mt-2 mt-sm-0">Powered by <a href="https://kenosis.co.tz" target="_blank">Kenosis Technologies</a></span>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <div class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    
    <script>
        // Preloader
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            setTimeout(() => {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.style.display = 'none';
                    document.body.classList.add('loaded');
                }, 500);
            }, 500);
        });
        
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            disable: 'mobile'
        });
        
        // Navbar scroll effect
        function updateNavbar() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
        
        window.addEventListener('scroll', updateNavbar);
        updateNavbar(); // Initialize on load
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Close mobile menu if open
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        const navbarToggler = document.querySelector('.navbar-toggler');
                        navbarToggler.click();
                    }
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Back to Top Button
        const backToTopButton = document.querySelector('.back-to-top');
        function toggleBackToTop() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        }
        
        window.addEventListener('scroll', toggleBackToTop);
        toggleBackToTop(); // Initialize on load
        
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Tooltip initialization
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, {
                trigger: 'hover focus'
            });
        });
        
        // Active link highlighting
        function setActiveLink() {
            const navLinks = document.querySelectorAll('.nav-link-custom');
            const currentHash = window.location.hash || '#hero';
            
            navLinks.forEach(link => {
                const linkHref = link.getAttribute('href');
                if (linkHref === currentHash) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }
        
        // Page load transition
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.opacity = '1';
            setActiveLink();
            
            // Initialize lightbox
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true,
                'showImageNumberLabel': true
            });
        });
        
        // Update active link on hash change
        window.addEventListener('hashchange', setActiveLink);
        
        // Form validation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) firstInvalid.focus();
                } else {
                    // Form submission success
                    alert('Thank you for your message! We will contact you soon.');
                    form.reset();
                }
            });
        });
    </script>
</body>
</html>