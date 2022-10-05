@include('teacher.partials.head')
@include('teacher.partials.header')

<div class="work-steps" id="work-steps">
    <div class="container">
      <img src="/assets/img/teacher-course.svg" alt="" class="image" />
      <div class="info">
        
        @foreach($courses as $key=>$course)
         
        <div class="box">
          <img src="/assets/img/course1.png" alt="" />
          <div class="text">
            <h3 class="fw-bold">{{ $course }}</h3>
            <ul>
                @foreach($classrooms[$key] as $classroom)
                
                <li><i class="fa-solid fa-check"></i>{{ $classroom->classroom_name }}</li>
                @endforeach
            </ul>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>


@include('teacher.partials.footer')
