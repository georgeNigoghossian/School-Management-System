@include('admin.partials.head')
@include('admin.partials.navbar')

@php 
//$query = DB::table('classrooms')->where('id',$id)->first();
$classroom = App\Models\Classroom::where('id',$id)->first();
$courses = $classroom->course;

@endphp

<section id="interface">
    @include('admin.partials.search')
    

    <div class="form-question shadow-lg rounded">
        <form id="form" class=" pb-3" method="post" action={{ route('schedule.store') }}>
            @csrf
            <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;"><span style="letter-spacing: 1.5px;">Wednesday</span></h3>
    
         <!-- Add button -->
         <button onclick="myFunction()" type="button" class="btn btn-dark mb-4" style="font-size: 16px;">Add More<i class="fa-solid fa-circle-plus ms-2"></i></button>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4 ms-2 std-button" style="font-size: 16px;">Submit</button>    
        

        @if(isset($schedule))
        @foreach($schedule as $s)
        <div id="row`+count+`" class="row mb-4">
            <div class="col-md-5">
                <div class="form-outline">
                    <label class="label-question form-label" for="form6Example1"><i class="fa-solid fa-clock-four me-2"></i>  Course Time</label>
                    <input type="time" id="form6Example1" class="form-control shadow" name="time[]" required value="{{ $s->time }}"/>
                    
                </div>
            </div>
        <div class="col-md-5">
            <div class="form-outline">
                <label class="label-question form-label" for="form6Example2"><i class="fa-solid fa-book-open me-2"></i> Course Type</label>
                <select class="form-select" aria-label="Default select example" id="form6Example2" name="course_id[]" required/>
                    <option selected value="{{ $s->course_id }}" class="py-2">{{ $s->course->name }}</option>
                    @foreach($courses as $course)
                        @if($s->course_id!=$course->id)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endif
                    @endforeach
                </select>
                
            </div>
        </div>
        
        </div> 
        @endforeach
        @endif
    </form>
               
                
    </div>

        @include('admin.schedule.nav')
        
</section>


<script>
    var count = 1;
    function myFunction() {
      count += 1;
      html = `
    <div id="row`+count+`" class="row mb-4">\
            <div class="col-md-5">\
                <div class="form-outline">\
                    <label class="label-question form-label" for="form6Example1"><i class="fa-solid fa-clock-four me-2"></i>  Course Time</label>\
                    <input type="time" id="form6Example1" class="form-control shadow" name="time[]" required/>\
                    
                </div>\
            </div>\
        <div class="col-md-5">\
            <div class="form-outline">\
                <label class="label-question form-label" for="form6Example2"><i class="fa-solid fa-book-open me-2"></i> Course Type</label>\
                <select class="form-select" aria-label="Default select example" id="form6Example2" name="course_id[]" required/>\
                    <option selected value="" class="py-2">Choose Course</option>\
                    @foreach($courses as $course)\
                    <option value="{{ $course->id }}">{{ $course->name }}</option>\
                    @endforeach\
                </select>\
                
            </div>\
        </div>\
        <div class="col-md-1" style="margin-top: 35px;">\
            <button onclick="remove(this)" id="`+count+`" type="button" class="btn btn-dark py-1" >Remove</button>\
        </div>\
        <input type="hidden" name="day" value="Wednesday" />\
        <input type="hidden" name="classroom_id" value="{{ $id }}" />\
    </div>` 

        var form = document.getElementById('form')
        form.insertAdjacentHTML('beforeend',html);
    }
    function remove(button){
        let number= button.id;
        let row = document.getElementById('row'+number)
        row.remove();
    }
</script>
@include('admin.partials.scripts')