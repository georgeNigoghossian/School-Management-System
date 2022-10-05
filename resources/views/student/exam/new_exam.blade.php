
@include('student.partials.head')
@include('student.partials.header')


@include('student.exam.popup')


  <section>
    <h2 class="main-title">New Exam</h2>
  <div class="row d-flex justify-content-evenly">
    @foreach ($exams as $exam)
    <div class=" col-lg-3 col-md-6">
      <div class="book-new-homework">
        <div class="cover-new-homework">
          <h6 class="text-white fs-5 fw-bolder py-2 text-decoration-underline text-capitalize">   {{  $exam->name }}</h6>
          <h3 class="text-white fw-bold my-3 text-capitalize">  {{  $exam->course->name }}</h3>
            <div class="d-flex flex-column w-50 mx-auto ">
              <a href="{{ route('student.make_exam',$exam->id) }}" class="button-student rounded py-2" ><span class="fw-bold"> Start Exam</span></a>
            </div>
          <span class="d-block text-white fw-bold fs-4 py-4"> Date:   {{  $exam->exam_date }} <br>
          <span class="fs-6" style="color: #ccc ;">Time: {{ $exam->exam_time }}</span>  <br>
          <span class="fs-6 text-capitalize" style="color: #ccc ;">Duration: {{ $exam->exam_duration }} (Min.)</span> 
        </span>
        </div>
      </div>
    </div>
    @endforeach
    
    
    
  </div>

  </section>

@include('student.partials.footer')