@include('admin.partials.head')
@include('admin.partials.navbar')


    <section id="interface">
       @include('admin.partials.search')

        <form class="form-question shadow-lg rounded mb-3" method='post' action="{{ route('classroom.store') }}">
            @csrf
          <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">Add Class</h3>
          <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                <label class="label-question form-label" for="form6Example1"><i class="fa-solid fa-person-shelter me-2"></i> Classroom name</label>
                  <input type="text" id="form6Example1" class="form-control shadow" name='classroom_name' />
                    @error('classroom_name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                 <label class="label-question form-label" for="form6Example2"><i class="fa-solid fa-user-graduate me-2"></i> Number of Students</label>
                  <input type="number" id="form6Example2" class="form-control shadow" name='number_of_students'/>
                  @error('number_of_students')
                  <div class="error">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                 <label class="label-question form-label" for="form6Example2"><i class="fa fa-dollar me-2"></i>Installment</label>
                  <input type="number" id="form6Example2" class="form-control shadow" name='installment'/>
                  
                </div>
              </div>
            </div>
            
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 std-button" style="font-size: 16px;">Add Class</button>
          </form>
    </section>
    @include('admin.partials.scripts')