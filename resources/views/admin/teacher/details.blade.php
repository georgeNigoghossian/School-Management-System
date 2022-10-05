@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
  @include('admin.partials.search')


<div class="info d-flex justify-content-around ">
<div class="photo bg-light pt-3 px-5 shadow-lg teacher-profile-photo">
  <img src="{{ url('public/Image/'.$teacher->image) }}" alt="">
  <br>
  <br>
   
  <div class="information">
      {{-- <p class="border-top text-center mt-3 pt-2 fw-bold">Teacher Id :12548</p> --}}
      <!-- <p class="border-top text-center mt-3 pt-2 fw-bold">Student Id :12548</p> -->
  </div>
</div>

  <div class="ss col-md-10 col-lg-8 " >
      <div class="card shadow-lg">
        <div class="card-header bg-transparent border-0">
          <h3 class="mb-0"><i class="fa-solid fa-clone me-2"></i>Teacher Profile</h3>
        </div>
        <span class="ms-3 fs-6" style="color: rgb(127, 118, 118);">Teacher Information</span>
        <div class="card-body pt-2 " style="overflow-x:auto;">
          <table class="table table-bordered">
            <tr>
                <th >First Name</th>
                <td > {{ $teacher['first_name'] }}  </td>
            </tr>
            <tr>
              <th >Last Name</th>
              <td > {{ $teacher['last_name'] }}   </td>
          </tr>
            <tr>
              <th >Email</th>
              <td >{{ $teacher['email'] }} </td>
            </tr>
            <tr>
              <th>Phone Number</th>
              <td >{{ $teacher['phone'] }} </td>
            </tr>
            <tr>
              <th>Gender</th>
              <td >{{ $teacher['gender'] }} </td>
            </tr>
            <tr>
              <th>Birthdate</th>
              <td >{{ $teacher['birthdate'] }} </td>
            </tr>
            <tr>
              <th>Address</th>
              <td >{{ $teacher['address'] }} </td>
            </tr>
            <tr>
              <th>Experience</th>
              <td >{{ $teacher['experience'] }} </td>
            </tr>
       
          </table>
        </div>
        <span class="ms-3 fs-6" style="color: rgb(127, 118, 118);">Courses </span>
        <div class="card-body pt-2 " style="overflow-x:auto;">
          <table class="table table-bordered">
            <tr>
                <th >Courses Name</th>
                @php $res = array_column($teacher->course->toArray(),'id'); 
                $course_names = DB::table('courses')->whereIn('id',$res)->get();
               
                @endphp
                <td > 
              @foreach ($course_names as $key=>$course)
                  @if(empty($course_names[$key+1]))
                      {{ $course->name }}  
                  @else
                      {{ $course->name }} ,
                  @endif
              @endforeach
              </td>
            </tr>
          </table>
        </div>
      </div>
  </div>
</div>
</section>
@include('admin.partials.scripts')
