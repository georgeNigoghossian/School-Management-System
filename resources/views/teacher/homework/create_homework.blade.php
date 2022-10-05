@include('teacher.partials.head')
@include('teacher.partials.header')

<section>
    <form method="post" action="{{route('homework.store')}}" enctype="multipart/form-data">   
    @csrf
    <div  class="container h-custom">
    <div class="row d-flex justify-content-center  h-100">
        <div class="add-exam col-md-3 col-lg-4 col-xl-4  d-flex align-items-center" >
            <img src="{{ asset('assets/img/homework.svg') }}" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-9 col-lg-8 col-xl-7  d-block m-auto text-center">
        <h2 class="mb-3 text-primary fw-bold text-uppercase ">Add Homework Questions </h2>
        <div class="mt-2 ">
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2 " for="form6Example1">Homework Name: </label>
            <input  type="text" id="" class="form-control w-75 m-auto " placeholder="Homework Name:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" name="title"/>
            @error('title')
            <div class="error">{{ $message }}</div>
           @enderror
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1">Course Name: </label>
            <select placeholder="Choose Course" class="form-select w-75 m-auto" aria-label="Default select example" id="form6Example2" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" name="course_id">
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course_id')
            <div class="error">{{ $message }}</div>
           @enderror
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1" >Homework Date: </label>
            <input  type="date" id="" class="form-control w-75 m-auto " placeholder="Exam Date:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" name="homework_date"/>
            @error('homework_date')
            <div class="error">{{ $message }}</div>
           @enderror
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example7"> Choose File :</label>
            <input type="file" id="form6Example4" class="form-control  w-75 m-auto" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" name="file"/>
            @error('file')
            <div class="error">{{ $message }}</div>
           @enderror
        </div>
        <button class="btn mt-4 px-5 text-white" type="submit" id="btn-add"  style="letter-spacing: 1.5px;background-color:#587187;">Save </button>  
        </div>
    </div>
    </form>
</section>

@include('teacher.partials.footer')