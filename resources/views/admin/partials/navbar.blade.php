
<section id="menu">
    <div class="logo">
        <i class="fa fa-solid fa-landmark"></i>
        <a href="#">Distinguished School</a>
    </div>
    <div class="items">
        <li><i class="fa fa-solid fa-chalkboard"></i><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><i class="fa fa-solid fa-user-tie"></i><a href="{{ route('teacher.list') }}">Teachers</a></li>
        <li><i class="fa fa-solid fa-user-graduate"></i><a href="{{ route('student.list') }}">students</a></li>
        <li><i class="fa fa-solid fa-book-open"></i><a href="{{ route('course.list') }}">all courses</a></li>
        <li><i class="fa fa-solid fa-person-shelter"></i><a href="{{ route('classroom.list') }}">all classes</a></li>
        <li><i class="fa fa-credit-card"></i><a href="{{ route('student.payment') }}">Student Payments</a></li>
        <li><i class="fa-solid fa-school-circle-xmark"></i><a href="{{ route('absences.list') }}">Absences</a></li>
        <li><i class="far fa-clock"></i><a href="{{ route('schedule.list') }}">Weekly Schedule</a></li>
        <li><i class="fa fa-calendar"></i><a href="{{ route('events') }}">Events</a></li>

    </div>
    
</section>