
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">DistinguishedSchool@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://twitter.com/" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
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

      @php
        $user=Session::get('user');
        
        $student=DB::table('students')->where('email',$user->email)->first();

        $homeworks=DB::table('active_homeworks')->where('student_id',$student->id)->where('seen',0)->where('active',0)->get();
        $homework_id_arr=[];
        foreach($homeworks as $homework){
          array_push($homework_id_arr,$homework->homework_id);
        }

        $homeworks_done= DB::table('marks')->where('student_id',$student->id)->whereIn('homework_id',$homework_id_arr)->count();                                
       
        View::share('homeworks_done', $homeworks_done);

        $homeworks_pending=DB::table('active_homeworks')->where('student_id',$student->id)->where('active',1)->count();
        View::share('homeworks_pending', $homeworks_pending);

        $exams=DB::table('active_exams')->where('student_id',$student->id)->where('seen',0)->where('active',0)->get();
        $exam_id_arr=[];
        foreach($exams as $exam){
          array_push($exam_id_arr,$exam->exam_id);
        }
        $exams_done= DB::table('marks')->where('student_id',$student->id)->whereIn('exam_id',$exam_id_arr)->count();
        View::share('exams_done', $exams_done);

        $exams_pending=DB::table('active_exams')->where('student_id',$student->id)
        ->where('active',1)->count();
        View::share('exams_pending', $exams_pending);
  
        $replies_count = DB::table('student__notes_replies')->where('student_id',$student->id)->where('seen',0)->count();
        View::share('replies_count', $replies_count);
      @endphp

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/student') }}">Home</a></li>
          {{-- <li><a class="nav-link scrollto" href="{{ route('student.ProfileDetails') }}">Profile</a></li> --}}
          <li><a class="nav-link scrollto" href="{{ route('student.schedule') }}">Weekly Schedule</a></li>
          <li class="dropdown"><a href="{{ route('student.courses') }}"><span>Courses</span> </a>

          </li>
          <li class="dropdown notification"><a href="#">Exams 
            @if($exams_done>0 ||  $exams_pending>0)
            <span>{{ $exams_done  + $exams_pending}}</span>
            @endif<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('student.finished_exam') }}">Exams Done
                @if($exams_done>0)
                <span>{{ $exams_done  }}</span>
                @endif
              </a></li>
              <li><a href="{{ route('student.new_exam') }}">New Exams
                @if($exams_pending>0)
                <span>{{ $exams_pending  }}</span>
                @endif
              </a></li>
            </ul>
          </li>
          <li class="dropdown notification"><a href="#">HomeWorks
            @if($homeworks_done>0 ||  $homeworks_pending>0)
            <span>{{ $homeworks_done  + $homeworks_pending}}</span>
            @endif
            <i class="bi bi-chevron-down"></i></a> <ul>
              <li><a href="{{ route('student.finished_homeworks') }}">HomeWorks Dones
                @if($homeworks_done>0)
                <span>{{ $homeworks_done  }}</span>
                @endif</a></li>
              <li><a href="{{ route('student.new_homeworks') }}">New Homeworks
                @if($homeworks_pending>0)
                <span>{{ $homeworks_pending  }}</span>
                @endif</a></li>

            </ul>
          </li>
          <li><a class=' btn-noti' href="{{ route('student.replies') }}" title=" messages"><i class="fa-solid fa-bell " aria-hidden="true"></i>
            @if($replies_count>0)
            <span>{{ $replies_count }}</span>
            @endif
          </a></li>
          <li><a class="nav-link scrollto" href="{{ route('user.logout') }}">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->