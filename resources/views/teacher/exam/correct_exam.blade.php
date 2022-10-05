@include('teacher.partials.head')
@include('teacher.partials.header')

<div class="row roww mt-5">
    
    <div class="col-md-4 cool ">
        <div class="sidebar__single">
            <h3 class="sidebar__title">Courses</h3>
            <ul class="sidebar__cat-list">
                @foreach($courses as $course)
                <li><a href="{{ route('exam.correct-exam',['course_id'=>$course->id]) }}"><i class="fa-solid fa-angles-right"></i><span>{{ $course->name }}</span></a></li>
                @endforeach
            </ul>
        </div> 
    </div>
    <div class="col-md-8 table-homework">
        <table class=" table table-strip  w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Exam Name</th>
                    <th scope="col">Date </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $key=>$exam)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $exam->name }}</td>
                    <td>{{ $exam->exam_date }}</td>
                    <td><a href="{{ route('exam.finished-exam',['exam_id'=>$exam->id]) }}" class="nn"><i class="fa-solid fa-eye ms-3 "></i></a></td>
                </tr>
                @endforeach   
                
            </tbody>
        </table>
    </div>

</div>


@include('teacher.partials.footer')