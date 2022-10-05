@include('admin.partials.head')
@include('admin.partials.navbar')



<section id="interface">
  @include('admin.partials.search')
    

    <form name="register" class="form-question shadow-lg rounded mb-5" method="post" action="{{route('student.store')}}" enctype="multipart/form-data">
      @csrf

      
      <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">Add Student</h3>
      <nav class='student-navbar'>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-student" aria-selected="true">Student Information</button>
          <button class="nav-link" id="nav-parent-tab" data-bs-toggle="tab" data-bs-target="#nav-parent" type="button" role="tab" aria-controls="nav-parent" aria-selected="false">Parent Inforamtion</button>
          <button class="nav-link" id="nav-classroom-tab" data-bs-toggle="tab" data-bs-target="#nav-classroom" type="button" role="tab" aria-controls="nav-classroom" aria-selected="false">Classroom</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab" tabindex="0">
          <div class="col form-outline mb-4">
            <label class="label-question form-label" for="form6Example6"><i class="fa fa-solid fa-phone me-2"></i>Registration Number</label>
            <input type="number" id="form6Example6" class="form-control shadow" name="registration_number"/>
            @error('registration_number')
            <div class="error">{{ $message }}</div>
           @enderror
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
              <label class="label-question form-label" for="form6Example1"><i class=" fa-solid fa-user me-2"></i> First name</label>
                <input type="text" id="form6Example1" class="form-control shadow" name="first_name"/>
                @error('first_name')
                  <div class="error">{{ $message }}</div>
                 @enderror
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
               <label class="label-question form-label" for="form6Example2"><i class="fa fa-solid fa-user me-2"></i> Last name</label>
                <input type="text" id="form6Example2" class="form-control shadow" name="last_name"/>
                @error('last_name')
                  <div class="error">{{ $message }}</div>
                 @enderror
              </div>
            </div>
          </div>
        
          
          <div class="row mb-4">
            <div class="col form-outline mb-4">
              <label class="label-question form-label" for="form6Example5"><i class="fa fa-solid fa-envelope me-2" ></i>Email</label>
               <input type="email" id="form6Example5" class="form-control shadow" name="email"/>
               @error('email')
                  <div class="error">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col form-outline mb-4">
              <label class="label-question form-label" for="form6Example5"><i class="fa fa-solid fa-lock me-2"></i>Password</label>
               <input type="password" id="form6Example5" class="form-control shadow" name="password"/>
               @error('password')
                  <div class="error">{{ $message }}</div>
                 @enderror
             </div>
          </div>
          <div class="row mb-4">
      
           <div class="col form-outline mb-4">
            <label class="label-question form-label" for="form6Example6"><i class="fa fa-solid fa-mobile me-2"></i></i>Phone</label>
            <input type="number" id="form6Example6" class="form-control shadow" name="phone"/>
            @error('phone')
                  <div class="error">{{ $message }}</div>
                 @enderror
          </div>
          <div class="col form-outline mb-4">
            <label class="label-question form-label" for="form6Example6"><i class="fa fa-solid fa-phone me-2"></i>Home Phone</label>
            <input type="number" id="form6Example6" class="form-control shadow" name="home_phone"/>
            @error('home_phone')
                  <div class="error">{{ $message }}</div>
                 @enderror
          </div>
          </div>
   
          <div class="form-outline mb-4">
            <label class="label-question form-label" for="form6Example4"><i class="fa fa-solid fa-map me-2"></i>Address</label> 
            <input type="text" id="form6Example4" class="form-control shadow" name="address"/>
            @error('address')
                  <div class="error">{{ $message }}</div>
                 @enderror
          </div>
       
          <div class="form-outline mb-4">
           <label class="label-question form-label" for="form6Example7"><i class="fa fa-solid fa-image me-2"></i> Choose Image</label>
           <input type="file" id="form6Example4" class="form-control shadow" name="image"/>
           @error('image')
                  <div class="error">{{ $message }}</div>
                 @enderror
          </div>
  
          <div class="row mb-4 d-flex align-items-center ">
          
            <div class="col form-outline ">
             <label class="label-question form-label" for="form6Example6"><i class="fa fa-solid fa-calendar me-2"></i>Birth Date</label>
             <input type="date" id="form6Example6" class="form-control shadow" name="birthdate"/>
             @error('birthdate')
                  <div class="error">{{ $message }}</div>
                 @enderror
           </div>
           <div class="col form-outline mb-4 mt-5 d-block">
            <div class="form-check form-check-inline" style="display: inline-flex;" >
              <label style="margin-right: 30px;" class="label-question form-check-label" for="inlineRadio1">male</label>
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
         
            </div>
            <div class="form-check form-check-inline  " style="display: inline-flex;">
              <label style="margin-right: 30px;" class="label-question form-check-label " for="inlineRadio2">female</label>
              <input class="form-check-input " type="radio" name="gender" id="inlineRadio2" value="female">
              
            </div>
            @error('gender')
            <div class="error">{{ $message }}</div>
           @enderror
           </div>
        
          </div>
        </div>
        <div class="tab-pane fade" id="nav-parent" role="tabpanel" aria-labelledby="nav-parent-tab" tabindex="0">
           
        
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
              <label class="label-question form-label" for="form6Example1"><i class="fa fa-solid fa-user me-2"></i>Parent's Full Name</label>
                <input type="text" id="form6Example1" class="form-control shadow" name="parent_full_name"/>
                @error('parent_full_name')
                <div class="error">{{ $message }}</div>
               @enderror
              </div>
            </div>
          
            <div class="col">
              <div class="col form-outline mb-4">
                <label class="label-question form-label" for="form6Example6"><i class="fa fa-solid fa-mobile me-2"></i></i>Parent Phone</label>
                <input type="number" id="form6Example6" class="form-control shadow" name="parent_phone"/>
                @error('parent_phone')
                <div class="error">{{ $message }}</div>
               @enderror
              </div>
            </div>
          </div>
  
          <div class="row mb-4">
            <div class="col">
              <div class="col form-outline mb-4">
                <label class="label-question form-label" for="form6Example5"><i class="fa fa-solid fa-envelope me-2"></i>Parent Email</label>
                 <input type="email" id="form6Example5" class="form-control shadow" name="parent_email"/>
                 @error('parent_email')
                 <div class="error">{{ $message }}</div>
                @enderror
                </div>
            </div>     
                        
            <div class="col">
              <div class="col form-outline mb-4">
                <label class="label-question form-label" for="form6Example5"><i class="fa fa-solid fa-lock me-2"></i>Parent's Password</label>
                <input type="password" id="form6Example5" class="form-control shadow" name="parent_password"/>
                @error('parent_password')
                <div class="error">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-classroom" role="tabpanel" aria-labelledby="nav-classroom-tab" tabindex="0">
          <select placeholder = "Choose Classroom" class="form-select" aria-label="Default select example" name="classroom_id">
           
            @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->id }}">{{ $classroom->classroom_name}}</option>            
            @endforeach
           
          </select>
          @error('classroom_id')
          <div class="error">{{ $message }}</div>
         @enderror

               <!-- Submit button -->
        
        <button type="submit" class="btn btn-primary btn-block mb-4 mt-4 std-button ">Save</button>
        </div>
       
      </div>

  
      </form>
</section>
@include('admin.partials.scripts')


