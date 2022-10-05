@include('partials.head')
@include('partials.navbar')

<section >
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="assets/img/signin/draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method='post' action="{{route('user.login')}}">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">Sign in with</p>
              <button type="button" class="btn btn-primary btn-floating mx-1 rounded-circle">
                <i class="bi bi-facebook"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1 rounded-circle">
                <i class="bi bi-twitter"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1 rounded-circle">
                <i class="bi bi-linkedin"></i>
              </button>
            </div>
  
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Or</p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Email address</label>
              <input type="email" id="form3Example3" class="form-control form-control-lg fs-6"
                placeholder="Enter a valid email address" name="email"/>
                @error('email')
                <div class="error">{{ $message }}</div>
               @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" class="form-control form-control-lg fs-6 "
                placeholder="Enter password" name="password"/>
                @error('password')
                <div class="error">{{ $message }}</div>
               @enderror
            </div>

            
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg" 
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>

  </section>
  
@include('partials.footer')