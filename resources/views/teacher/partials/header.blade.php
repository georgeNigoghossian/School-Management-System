
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
      
      $teacher=App\Models\Teacher::where('email',$user->email)->first();
      $course_id = DB::table('teacher_course')
        ->select('course_id')
        ->join('courses', 'courses.id', '=', 'teacher_course.course_id')
        ->where('teacher_course.teacher_id', $teacher->id)
        ->get();

      $exam_arr=[];
      $course_id=$course_id->toArray();
      
      foreach($course_id as $id){
      
          $course=App\Models\Course::where('id',$id->course_id)->first();
          //dump($course);
          if(!empty($course->exam->toArray())){
            array_push($exam_arr,$course->exam[0]->id);
          }
      }
      //dd($exam_arr);
      
      $teacher_exams_count=DB::table('student_answers')->whereIn('exam_id',$exam_arr)->where('seen_by_teacher',0)->groupBy('exam_id')->count();
      $teacher_exams_count=0;
      View::share('teacher_exams_count', $teacher_exams_count);

      $homework_arr=[];
      
      foreach($course_id as $id){
      
      $homework=App\Models\Homework::where('course_id',$id->course_id)->first();
        if(isset($homework)){
        array_push($homework_arr,$homework->id);
        }
      }
      $teacher_homeworks_count=DB::table('active_homeworks')->whereIn('homework_id',$homework_arr)->where('seen_by_teacher',0)->where('active',0)->count();
      //dd($teacher_homeworks_count);
      $teacher_homeworks_count=0;
      View::share('teacher_homeworks_count', $teacher_homeworks_count);
    @endphp


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('/teacher') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('teacher.schedule') }}">Weekly Schedule</a></li>

          <li class="dropdown notification"><a href="#">Exams
            @if($teacher_exams_count>0)
            <span>{{ $teacher_exams_count }}</span>
            @endif
             <i class="bi bi-chevron-down"></i></a>
            <ul>
         
              <li><a href="{{ route('exam.correct-exam') }}">Exams Done
                @if($teacher_exams_count>0)
                <span>{{ $teacher_exams_count }}</span>
                @endif
              </a></li>  
              
              <li><a href="{{ route('exam.create') }}">New Exams</a></li>
            </ul>
          </li>
          <li class="dropdown notification"><a href="#">HomeWorks 
            @if($teacher_homeworks_count>0)
            <span>{{ $teacher_homeworks_count }}</span>
            @endif
            <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('homework.correct-homework') }}">HomeWorks Done
                @if($teacher_homeworks_count>0)
                <span>{{ $teacher_homeworks_count }}</span>
                @endif
              </a></li>
              <li><a href="{{ route('homework.create') }}">New Homeworks</a></li>

            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Export Marks</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li ><a  href="{{ route('export-hw-marks') }}">Homework Marks</a></li>
              <li><a  href="{{ route('export-exam-marks') }}">Exam Marks</a></li>

            </ul>
          </li>

          <li><a class="nav-link scrollto" href="{{ route('user.logout') }}">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->