@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
  @include('admin.partials.search')

  <form method="post"  action="{{ route('course.store') }}" class="form-question shadow-lg rounded mb-3" enctype="multipart/form-data">
    @csrf
    <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">Add Course</h3>
    <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
          <label class="label-question form-label" for="form6Example1"><i class="fa-solid fa-book-open me-2"></i> Course Name</label>
            <input type="text" id="form6Example1" class="form-control shadow" name="name"/>
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-outline mb-4">
        <label class="label-question form-label" for="form6Example7"><i class="fa-solid fa-file-alt me-2"></i> Upload File</label>
        <input type="file" id="form6Example4" class="form-control shadow" name="file"/>
          @error('file')
          <div class="error">{{ $message }}</div>
          @enderror 
      </div>

      <div >
        <label>Select Class</label>
        <select id="multi_option" multiple name="{{-- native-select --}}classes[]" placeholder="Select Class" data-silent-initial-value-set="false" class='add-course-select'>
          @foreach($classrooms as $classroom)
            <option value="{{ $classroom->id }}">{{ $classroom->classroom_name }}</option>
          @endforeach
           
        </select>
          @error('classes')
          <div class="error">{{ $message }}</div>
          @enderror
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4 std-button" style="font-size: 16px;">Add Course</button>
    </form>
</section>

@include('admin.partials.scripts')
<script type="text/javascript">
  VirtualSelect.init({ 
    ele: '#multi_option' 
  });
</script>