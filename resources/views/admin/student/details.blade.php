@include('admin.partials.head')
@include('admin.partials.navbar')
<section id="interface">
  @include('admin.partials.search')


<div class="info d-flex justify-content-around ">
<div class="photo bg-light pt-3 px-5 shadow-lg">
  <img src="{{ url('public/Image/'.$student->image) }}"  alt="">
  <div class="information">
      <p class="border-top text-center mt-3 pt-2 fw-bold">Registration Number {{ $student['registration_number'] }}</p>
      <!-- <p class="border-top text-center mt-3 pt-2 fw-bold">Student Id :12548</p> -->
  </div>
</div>

  <div class="ss col-md-10 col-lg-8 " >
      <div class="card shadow-lg">
        <div class="card-header bg-transparent border-0">
          <h3 class="mb-0"><i class="fa-solid fa-clone me-2"></i>Student Profile</h3>
        </div>
        <span class="ms-3 fs-6" style="color: rgb(127, 118, 118);">Student Information</span>
        <div class="card-body pt-2 " style="overflow-x:auto;">
          <table class="table table-bordered">
            <tr>
                <th >First Name</th>
                <td > {{ $student['first_name'] }}  </td>
            </tr>
            <tr>
              <th >Last Name</th>
              <td > {{ $student['last_name'] }}  </td>
          </tr>
            <tr>
              <th >Email</th>
              <td >{{ $student['email'] }}</td>
            </tr>
            <tr>
              <th>Phone-Number</th>
              <td >{{ $student['phone'] }}</td>
            </tr>
            <tr>
                <th>Home-Phone</th>
                <td >{{ $student['home_phone'] }}</td>
              </tr>
            <tr>
              <th>Gender</th>
              <td >{{ $student['gender'] }}</td>
            </tr>
            <tr>
              <th>Birthdate</th>
              <td >{{ $student['birthdate'] }}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td >{{ $student['address'] }}</td>
            </tr>
       
          </table>
        </div>
        <span class="ms-3 fs-6" style="color: rgb(127, 118, 118);">Parent Information</span>
        <div class="card-body pt-2 " style="overflow-x:auto;">
          <table class="table table-bordered">
            <tr>
                <th >Parent Name</th>
                <td > {{ $student->getParent[0]->full_name }}  </td>
            </tr>
            <tr>
              <th >Email</th>
              <td >{{ $student->getParent[0]->email }}</td>
            </tr>
            <tr>
                <th>Parent Phone</th>
                <td >{{ $student->getParent[0]->phone }}</td>
              </tr>
          </table>
        </div>
        <span class="ms-3 fs-6" style="color: rgb(127, 118, 118);">Class information</span>
        <div class="card-body pt-2 " style="overflow-x:auto;">
          <table class="table table-bordered">
            <tr>
                <th >Class Name</th>
                <td > {{ $student->classroom->classroom_name }}  </td>
            </tr>
          </table>
        </div>
      </div>
  </div>
</div>

</section>

@include('admin.partials.scripts')
