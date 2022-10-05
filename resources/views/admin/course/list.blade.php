@include('admin.partials.head')
@include('admin.partials.navbar')


<section id="interface">
    @include('admin.partials.search')

    <div class="add-student d-flex justify-content-between align-items-center">
        <h3 class="i-name">All Courses</h3>
        <a href="{{ route('course.add') }}"> <button type="button" class="btn btn-primary btn-sm std-button" style="margin-top:90px; margin-right: 50px; font-size: 16px;">Add Course</button></a>
    </div>

    <div class="values">
        @foreach ($courses as $course)
            
        <div class="value-box boxx">
            <div class="val-box box">
                <i class="fa-solid fa-book-open"></i>
                <div>
                    <span>{{ $course->name }}</span>
                </div>
            </div>
        <div class="buttons">
            <a class="btn btn-primary mb-1 w-75 std-button"><div style="text-decoration: underline;font-weight:bold">Classroom</div>
                @foreach ($course->classroom as $key=>$classroom)
                    @if(empty($course->classroom[$key+1]))
                        <small>{{ $classroom->classroom_name }}</small>
                    @else
                        <small>{{ $classroom->classroom_name }} </small>,
                    @endif
                @endforeach
                </a>
            <a class="btn btn-primary w-75 std-button" href="{{ url('public/File/'.$course->file) }}" download>Download Course <i class="fa fa-file-pdf" aria-hidden="true"></i></a>
            <a href="{{ route('course.delete', ['id' => $course->id]) }}" class="btn btn-delete w-75"><i class="bi bi-trash"></i></a>
        </div>
        </div>

        @endforeach
    </div>
</section>
@include('admin.partials.scripts')