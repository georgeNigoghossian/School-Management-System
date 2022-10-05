@include('student.partials.head')
@include('student.partials.header')

<div class="courses" id="courses">
    <h2 class="main-title">All Courses</h2>
    <div class="container">
      @foreach($courses as $course)
      <div class="box passion">
        <div class="img-holder"><img src="/assets/img/courses/gallery-1.png" alt="" /></div>
        <h2>{{ $course->name }}</h2>
        <a href="{{ url('public/File/'.$course->file) }}" download >Download</a>
      </div>
     @endforeach
    </div>
  </div>
  
@include('student.partials.footer')