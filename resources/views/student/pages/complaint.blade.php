@include('student.partials.head')
@include('student.partials.header')

<section class="mt-5 mb-5">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="complaint-photo col-md-9 col-lg-6 col-xl-5" >
          <img src="{{ asset('assets/img/contuct.svg') }}" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="post" action="{{ route('student.submitComplaint') }}">
            @csrf
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">To Send Complaints</p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4" >
              <label class="form-label" for="form3Example3">Full Name</label>
              <input type="text" id="form3Example3" class="form-control form-control-lg fs-6 "
                placeholder="Enter Full Name" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" name="full_name"/>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Message</label>
              <textarea class=" form-control form-control-lg fs-6 " name="notes" id="" cols="56" rows="3" placeholder="Enter Complaint" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;"></textarea>
            </div>
  
            @php 
            $user=Session::get('user');
            $student = \App\Models\Student::where(['email' => $user->email])->first();
            @endphp
            <input type="hidden" name="student_id" value="{{ $student->id }}"/>
            <div class="d-flex justify-content-center">
              <button style="border:unset;" type="submit"><a href="#" class="btn-student "><span>Send</span></a></button>
            </div>
  
          </form>
        </div>
      </div>
    </div>

  </section>
    <!-- End Sign In  -->

   <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="/assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fa-solid fa-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fa-solid fa-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

          </div>
        </div>

      </div>
    </section>

@include('student.partials.footer')