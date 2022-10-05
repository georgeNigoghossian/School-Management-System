@include('teacher.partials.head')
@include('teacher.partials.header')

<div class="homeworks-student" id="homeworks-student">
    <!-- <h2 class="main-title">homeworks-student</h2> -->
    <div class="container">
        @foreach($exam_answers as $answer)
        <div class="box">
            <img src="{{ url('public/Image/'.$answer->student->image) }}" alt="" />
            <h3>{{ $answer->student->first_name }} {{ $answer->student->last_name }} </h3>
                <div class="btns ">
                    <a href="{{ route('exam.view-finished-exam',['exam_id'=>$answer->exam_id,'student_id'=>$answer->student_id]) }}" class="button-student btn fw-bold text-black mt-4 me-2 px-4" ><span>View</span></a>
                </div>
        </div>
        @endforeach
    
    </div>

</div>

@include('teacher.partials.footer')