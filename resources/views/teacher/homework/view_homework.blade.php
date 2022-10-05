@include('teacher.partials.head')
@include('teacher.partials.header')

<div class="homeworks-student" id="homeworks-student">
    <!-- <h2 class="main-title">homeworks-student</h2> -->
    <div class="container">
        @foreach($homework_answers as $answer)
        
        <div class="box">
            <img src="{{ url('public/Image/'.$answer->student->image) }}" alt="" />
            <h3>{{ $answer->student->first_name }} {{ $answer->student->last_name }} </h3>
                <div class="btns ">
                    <a href="{{ url('public/HomewoksDone/'.$answer->student->image) }}" class="button-student btn fw-bold text-black mt-4 me-2" download><span><i class="fa-solid fa-download me-1"></i>Download</span></a>
                    <button type="button" class="popup-modal button-student btn fw-bold text-black mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal" data-homework-id="{{ $answer->homework->id }}" data-student-id="{{ $answer->student->id }}">Add Mark</button>
                </div>
        </div>
        @endforeach
        
        <!-- Modal -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        </script>
        <script>
        $(".popup-modal").on("click", function(){
            var homework_id = $(this).attr("data-homework-id");     
            $("#homework_id").val(homework_id);  
            var student_id = $(this).attr("data-student-id");     
            $("#student_id").val(student_id);  
        });
       

        </script>
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel ">Add Mark And Notes</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="post" action="{{route('mark.store')}}">
                            @csrf
                            <label for="validationDefault01" class="form-label fw-bold">Add Mark:</label>
                            <input type="number" name="mark" class="form-control shadow " id="validationDefault01" placeholder="00" required>
                            <label for="validationDefault02" class="form-label fw-bold mt-2">Add Note:</label>
                            <textarea name="note" id="validationDefault02"cols="50" rows="2" class="form-control shadow "placeholder="Example" ></textarea>
                            <input type="hidden" name="homework_id" id="homework_id" value= "" >
                            <input type="hidden" name="student_id" id="student_id" value= "" >
                            <div class="modal-footer mt-3 pb-0">
                                <button type="button" class="btn text-white px-4" data-bs-dismiss="modal" style="background-color: #587187;">Close</button>
                                <button type="submit" class="btn text-white px-4" style="background-color: #587187;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- End homeworks-student -->
    </div>
</div>
@include('teacher.partials.footer')