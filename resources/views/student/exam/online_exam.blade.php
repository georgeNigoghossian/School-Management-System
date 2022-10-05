@include('student.partials.head')
@include('student.partials.header') 



@if($exam->exam_type=="traditional")
<header class="header">
    <div class="stick">{{ $exam->name }}</div>
    <div class="timer">
        <div class="time_left_txt">Time Left</div>
        <div class="timer_sec"></div>
    </div>
    <div class="time_line"></div>
</header>

<section  class="quiz">

    <div id="main-quize" ><!-- open main div -->
        <form id="form1" method="post" action="{{ route('student.submit_exam') }}">
            @csrf
            @foreach($questions as $key=>$question)
            <h3><span>{{ $key+1 }}.</span>{{ $question->question }}</h3>
            <textarea name="answers[]" id="" cols="120" rows="2" placeholder="Write Your Answer:"></textarea>
            <input type="hidden" name="question_id[]" value="{{ $question->id }}" />
            @endforeach
            <input type="hidden" name="exam_id" value="{{ $exam->id }}" />
            @php
                $user=Session::get('user');
                $student=\App\Models\Student::where('email',$user->email)->first();
            @endphp
            <input type="hidden" name="student_id" value="{{ $student->id }}" />
            
            <button type="submit" value="Submit" class="d-block">Save</button>

        </form>

    
    </div>
</section>

<script>
    // counting days to new year
    const countDownDateTime =  new Date(2022, 8, 7, 15, 0, 0).getTime();
    const hoursValue = document.querySelector("#hours");
    const minutesValue = document.querySelector("#minutes");
    const secondsValue = document.querySelector("#seconds");
    // run this function every 1000 ms or 1 second
    let x = setInterval(function () {
    const dateTimeNow = new Date().getTime();
    let difference =  countDownDateTime - dateTimeNow;
    // calculating time and assigning values
    hoursValue.innerHTML = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    minutesValue.innerHTML = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    secondsValue.innerHTML = Math.floor((difference % (1000 * 60)) / 1000);
    if (difference < 0) {
    clearInterval(x);
    }
    }, 1000);



    const timeCount = document.querySelector(".timer .timer_sec");
    const time_line = document.querySelector(".header .time_line");
    const timeText = document.querySelector(".timer .time_left_txt");

    function startTimer(time){
        timeCount.textContent = time; 
        counter = setInterval(timer, 60000);
        function timer(){
            time--; //decrement the time value
            timeCount.textContent = time; //changing the value of timeCount with time value
            if(time <= 0){ //if timer is less than 0
                clearInterval(counter); //clear counter
                timeText.textContent = "Time Off"; //change the time text to time off
                
            }
        }
    }
    function startTimerLine(time){
        counterLine = setInterval(timer, ((52.4) * {{ $exam->exam_duration }}));
        function timer(){
            time += 1; //upgrading time value with 1
            time_line.style.width = time + "px"; //increasing width of time_line with px by time value
            if(time > 1138){ //if time value is greater than 549
                clearInterval(counterLine); //clear counterLine
            }
        }
    }
    startTimerLine(0); //calling startTimerLine function
    startTimer({{ $exam->exam_duration }}); //calling startTimer function
</script>

@else


<header class="header">
    <div class="stick">{{ $exam->name }}</div>
    <div class="timer">
        <div class="time_left_txt">Time Left</div>
        <div class="timer_sec"></div>
    </div>
    <div class="time_line"></div>
</header>

<section  class="quiz">

    <div id="main-quize" ><!-- open main div -->
        <form id="checkAll" method="post" action="{{ route('student.submit_exam') }}">
            @csrf
            @foreach($questions as $key=>$question)
            <div class="div{{ $key }}">
            <h3><span>{{ $key+1 }}.</span>{{ $question->question }}</h3>
            @if(isset( $answers[$key]->answer1 ))
                <label for="var_string"><input type="checkbox" name="correct_answer[]" value="A"  />{{ $answers[$key]->answer1 }}</label>
            @endif
            @if(isset( $answers[$key]->answer2 ))
                <label for="var_join"><input type="checkbox" name="correct_answer[]" value="B"  />{{ $answers[$key]->answer2 }}</label>
            @endif
            @if(isset( $answers[$key]->answer3 ))
                <label for="var_info"><input type="checkbox" name="correct_answer[]" value="C"  />{{ $answers[$key]->answer3 }}</label>
            @endif
            @if(isset( $answers[$key]->answer4 ))
                <label for="var_condition"><input type="checkbox" name="correct_answer[]" value="D" />{{ $answers[$key]->answer4 }}</label>
            @endif

            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script>
            $('.div{{ $key }}').change(function(){
          
                $('.div{{ $key }} input[type="checkbox"]').on('change', function() {
                    $('.div{{ $key }} input[type="checkbox"]').not(this).prop('checked', false);
                });
            });
            </script>
            @endforeach

            <input type="hidden" name="exam_id" value="{{ $exam->id }}" />
            @php
                $user=Session::get('user');
                $student=\App\Models\Student::where('email',$user->email)->first();
            @endphp
            <input type="hidden" name="student_id" value="{{ $student->id }}" />

            <button type="submit" value="Submit">Submit</button>
        </form>
            
  
    </div>

    

</section>

<script>
    // counting days to new year
    const countDownDateTime =  new Date(2022, 8, 7, 15, 0, 0).getTime();
    const hoursValue = document.querySelector("#hours");
    const minutesValue = document.querySelector("#minutes");
    const secondsValue = document.querySelector("#seconds");
    // run this function every 1000 ms or 1 second
    let x = setInterval(function () {
    const dateTimeNow = new Date().getTime();
    let difference =  countDownDateTime - dateTimeNow;
    // calculating time and assigning values
    hoursValue.innerHTML = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    minutesValue.innerHTML = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    secondsValue.innerHTML = Math.floor((difference % (1000 * 60)) / 1000);
    if (difference < 0) {
    clearInterval(x);
    }
    }, 1000);



    const timeCount = document.querySelector(".timer .timer_sec");
    const time_line = document.querySelector(".header .time_line");
    const timeText = document.querySelector(".timer .time_left_txt");

    function startTimer(time){
        timeCount.textContent = time; 
        counter = setInterval(timer, 60000);
        function timer(){
            time--; //decrement the time value
            timeCount.textContent = time; //changing the value of timeCount with time value
            if(time <= 0){ //if timer is less than 0
                clearInterval(counter); //clear counter
                timeText.textContent = "Time Off"; //change the time text to time off
                
            }
        }
    }
    function startTimerLine(time){
        counterLine = setInterval(timer, ((52.4) * {{ $exam->exam_duration }}));
        function timer(){
            time += 1; //upgrading time value with 1
            time_line.style.width = time + "px"; //increasing width of time_line with px by time value
            if(time > 1138){ //if time value is greater than 549
                clearInterval(counterLine); //clear counterLine
            }
        }
    }
    startTimerLine(0); //calling startTimerLine function
    startTimer({{ $exam->exam_duration }}); //calling startTimer function
</script>


@endif

@include('student.partials.footer')
