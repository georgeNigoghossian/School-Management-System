@include('teacher.partials.head')
@include('teacher.partials.header')



<header class="header">
    <div class="stick">Exam Answers</div>
</header>

<section class="quiz">
    <div id="main-quize" ><!-- open main div -->
        <form action="{{ route('exam.submit-exam-marks') }}" method="post">
            @csrf
            @foreach($answers as $key=>$answer)
            <h3><span>{{ $key+1 }}. </span>{{ $answer->question->question }}</h3>
            <div class="d-flex justify-content-center ">
                <p class="para">
                    {{ $answer->answer}}
                </p>
                <div class="d-flex flex-column mt-2">
                    <label for="validationDefault01" class="form-label fw-bold ms-4" >Mark:</label>
                    <input type="number" id="mark" class="form-control shadow wid" id="validationDefault01" placeholder="0" required name="mark[]">
                    <input type="hidden" value="{{ $answer->exam->id }}" name="exam_id"/>
                    <input type="hidden" value="{{ $answer->student->id }}" name="student_id"/>
                </div>
            </div>
            @endforeach
          
            
            <button type="submit" onclick="sum()">Save</button>
        </form>
    </div>

</section>

<script>
function sum(){
    var sum=0;
    for (let i = 1; i <= 3 ; i++) {
        var mark = document.getElementById("mark"+i);
        sum += parseInt(mark.value);
    }
    // console.log(sum);
    return sum;
}
</script>
@include('teacher.partials.footer')