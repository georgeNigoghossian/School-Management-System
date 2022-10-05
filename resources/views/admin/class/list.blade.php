@include('admin.partials.head')
@include('admin.partials.navbar')


<section id="interface">
    @include('admin.partials.search')

    <div class="add-student d-flex justify-content-between align-items-center">
        <h3 class="i-name">All Classes</h3>
        <a href="{{ route('classroom.create') }}"><button type="button" class="btn btn-primary btn-sm std-button" style="margin-top:90px; margin-right: 50px; font-size: 16px;">
           Add Class</button></a>
    </div>

    <div class="values">
        @foreach ($classrooms as $classroom)

        <div class="value-box boxx ">
            <div class="val-box box">
                <i class="fa-solid fa-person-shelter"></i>
                <div>
                    <span>{{ $classroom->classroom_name }}</span>
                </div>
            </div>
        <div class="buttons">
            <button class="btn btn-primary mb-1 w-75 std-button"><a href="{{ route('student.register') }}" >Add Student</a></button>
            <button class="btn btn-danger mb-1 w-75 std-button"><a href="{{ route('course.add') }}" >Add Course</a></button>
        <div class="btn btn-info w-75 std-button "> <a href="{{ route('schedule.create',['id'=>$classroom->id,'day'=>'sun']) }}" class="text-white">Add Schedule</a></div>
            <a href="{{ route('classroom.delete',['id'=>$classroom->id]) }}" class="mt-2"><i class="bi bi-trash"></i></a>

        </div>
        </div>
        @endforeach
        

    </div>
</section>
@include('admin.partials.scripts')