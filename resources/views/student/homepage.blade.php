
@include('student.partials.head')
@include('student.partials.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">


        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('/assets/img/slide/slide-3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Distinguished School</span></h2>
                <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique repudiandae dignissimos inventore fugiat totam officia architecto voluptatem error. Ipsa ex at, in rem cumque consequatur cum deleniti possimus natus distinctio.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

 <!-- about section starts  -->

<section class="about-student" id="about" >
  <div class="row" >
      <div class="content"  >
        <!-- <h3 data-text=" my name is george kashmar "> my name is george kashmar   </h3> -->
      <h2 class="text-center">Student Information</h2>

        <div class=" box-container glow  ml-5 me-5 mb-4 px-4 mt-5 fs-5" >
            <div class="box">
                <p> <span> Registeration Number: </span> {{ $student->registration_number }} </p>
                <p> <span> Full Name: </span> {{ $student->first_name }} {{ $student->last_name }} </p>
                <p> <span> Gender: </span> {{ $student->gender }} </p>            
                <p> <span> Home Number: </span> {{ $student->home_phone }} </p>
                <p> <span> Phone Number: </span> {{ $student->phone }} </p>
                
            </div>
            <div class="box">
                <p> <span> Email: </span> {{ $student->email }} </p>
                <p> <span> Age: </span> {{ $student->birthdate }} </p>
                <p> <span> Class: </span> {{ $student->classroom->classroom_name }} </p>
                <p> <span> Address: </span> {{ $student->address }} </p>
              

            </div>
            

        </div>
        <h2 class="text-center">Student Parent Information</h2>
        <div class=" box-container glow  ml-5 me-5 mb-4 px-4 mt-5 fs-5" >
          <div class="box">
            <p> <span> Parent's Full Name : </span> {{ $parent[0]["full_name"] }} </p>
            <p> <span > Parent Number: </span> {{ $parent[0]["phone"] }}</p>
            <p> <span> Parent Email : </span> {{ $parent[0]["email"] }} </p>
          </div>
        </div>    
      </div>
  
        

  </div>

</section>

    <!-- ======= About Lists Section ======= -->
    <section class="about-lists">
      <div class="container">

        <div class="section-title">
            <h2>UpComing Events</h2>
          </div>

      <div class="row no-gutters">
        @foreach ($events as $key=>$event)
        <div class=" col-lg-4 col-md-6 content-item" data-aos="fade-up">
          <span class="fw-bold">{{ $key +1}}</span>
            <div class="card">
              <div class="card-inner">
                <div class="front-face ">
                  <h3>{{ $event->title }}</h3>
                </div>
                <div class="back-face datetime">
                  <div class="time"> {{ $event->start }}</div>
                 {{-- <div class="date">Friday, July 1 2022</div> --}} 
                </div>
              </div>
            </div>
        </div>
        @endforeach       
      </div>
    </section>
    
    <!-- End About Lists Section --> 

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row d-flex justify-content-center">

          <div class="col-lg-3 col-md-6 text-center " data-aos="fade-up">
            <div class="count-box rounded dash-b-1 ">
              <p class="fs-3 fw-bold ">Courses</p>
              <span data-purecounter-start="0" data-purecounter-end="{{ $classroom_courses_count }}" data-purecounter-duration="1" class="purecounter "></span>
              <button type="button" class="button-student btn fw-bold "><a href="{{ route('student.courses') }}">View More</a></button>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box rounded dash-b-2 ">
              <p class="fs-3 fw-bold ">Exams</p>
              <span data-purecounter-start="0" data-purecounter-end="{{ $exams_count }}" data-purecounter-duration="1" class="purecounter "></span>
              <button type="button" class="button-student btn fw-bold "><a href="{{ route('student.finished_exam') }}">View More</a></button>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center  " data-aos="fade-up" data-aos-delay="400">
            <div class="count-box rounded dash-b-3 ">
              <p class="fs-3 fw-bold ">HomeWorks</p>
              <span data-purecounter-start="0" data-purecounter-end="{{ $homeworks_count }}" data-purecounter-duration="1" class="purecounter "></span>
              <button type="button" class="button-student btn fw-bold "><a href="{{ route('student.finished_homeworks') }}">View More</a></button>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Counts Section -->

  


  </main>
  <!-- End #main -->
@include('student.partials.footer')