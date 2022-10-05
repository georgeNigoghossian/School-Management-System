@include('admin.partials.head')
@include('admin.partials.navbar')

    <section id="interface">
        @include('admin.partials.search')
        

        <form class="form-question shadow-lg rounded mb-3"  method="POST" action="{{route('absences.store',['id'=>$id])}}">
            @csrf
          <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">Add Absence</h3>
          <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                <label class="label-question form-label" for="form6Example1"><i class="fa-solid fa-question me-2"></i>Reason Of Absencs</label>
                <textarea name="cause" cols="98" rows="2" required></textarea>
                @error('cause')
                <div class="error">{{ $message }}</div>
               @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                 <label class="label-question form-label" for="form6Example2"><i class="fa-solid fa-calendar me-2"></i>Date</label>
                  <input type="date" id="form6Example2" class="form-control shadow" name="day" required/>
                  @error('day')
                  <div class="error">{{ $message }}</div>
                 @enderror
                </div>
              </div>
            </div>
            <label class="label-question form-label" for="form6Example2"><i class="fa-solid fa-book-open me-2"></i>The Missed Course</label>
            <select class="form-select" aria-label="Default select example" id="form6Example2" name="course_id" placeholder="Select Course">
                <option></option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name}}</option>            
                @endforeach
                @error('course_id')
                <div class="error">{{ $message }}</div>
               @enderror
              </select>

              <div class="col form-outline mb-4 mt-5 d-flex justify-content-start">
                <div class="form-check form-check-inline d-flex justify-content-start  ps-0">
                  <label class="label-question form-check-label me-5 " for="inlineRadio1">Justified</label>
                  <input class="form-check-input" type="checkbox" name="justified" id="inlineRadio1" value="1" >
                </div>
               </div>
               
                         
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 mt-3 std-button" style="font-size: 16px;">Save</button>
          </form>
    </section>
    
    @include('admin.partials.scripts')