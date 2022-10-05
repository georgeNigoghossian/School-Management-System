<style>
    body {
      position: relative;
      height: 100%;
    }
    .swiper {
      width: 100%;
      padding-top: 100px;
      padding-bottom: 50px;
    }
    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 380px;
      background-color: #fff;
    }
    .swiper-slide img {
      display: block;
      width: 100%;
      height: 310px;
    }
    .swiper-slide .details{
        text-align: center;
    }
    .swiper-slide .details h2{
        margin-top: 5px;
        font-size: 20px;
    }
    .swiper-slide .details h2 span{
        display: block;
        font-size: 16px;
        color: #f44336;
        margin-top: 5px;
    }
    </style>
    
    </head>
    
    <body>
    
      <!-- ======= Top Bar ======= -->
      <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">DistinguishedSchool@gmail.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
          </div>
          <div class="social-links d-none d-md-block">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
          </div>
        </div>
      </section>
    
      <!-- ======= Header ======= -->
      <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
    
          <div class="logo me-auto d-flex align-items-center">
            <i class="fa-solid fa-landmark me-3" style="color: #5c8af0; font-size: 40px;"></i>
            <h1><a href="index.html">Distinguished School</a></h1>
          </div>
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto " href="#">Home</a></li>
              <li><a class="nav-link scrollto" href="#schedule">Weekly Schedule</a></li>
              <li><a class="nav-link scrollto" href="#teachers">Teachers</a></li>
              <li><a class="nav-link scrollto" href="#notes">Absences</a></li>
              
              <li><a class="nav-link scrollto" href="{{ route('user.logout') }}">Logout</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
    
        </div>
        </header>