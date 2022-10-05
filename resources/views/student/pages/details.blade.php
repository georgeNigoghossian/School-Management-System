@include('student.partials.head')
@include('student.partials.header')

<section class="about-student" id="about">
    <div class="row">
        <div class="image">
              <img class="tilt" src="{{ asset('assets/img/profile.svg') }}" alt="">
        </div>
  
          <div class="content">
              <h3 data-text=" my name is george kashmar "> my name is george kashmar   </h3>
  
  
              <div class=" box-container glow  me-5 mb-4 px-4 mt-5">
                  <div class="box">
                      <p> <span> Age: </span> 21 </p>
                      <p> <span> Gender: </span> male </p>
                      <p> <span> Email: </span> info@john.com </p>
                      <p> <span> Home Number: </span> +123-456-7890 </p>
                      <p> <span> Parent's Full Name : </span> info@john.com </p>
                      <p> <span > Parent Number: </span> +123-456-7890 </p>
                  </div>
                  <div class="box">
                      <p> <span> Class: </span> 1 </p>
                      <p> <span> Address: </span> Damascus </p>
                      <p> <span> Registeration Number: </span> 2 </p>
                      <p> <span> phone Number: </span> +123-456-7890 </p>
                      <p> <span> Parent Email : </span> info@john.com </p>
                  </div>
              </div>
              <!-- Submit button -->
              <!-- <button type="submit" class="download btn btn-primary mt-3 " style="font-size: 16px;">Download Cv</button> -->
                <div class="d-flex justify-content-center">
                  <a href="#" class="btn-student "><span>submit</span></a>
                </div>
            </div>
  
    </div>
  
  </section>
  @include('student.partials.footer');