@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')

    <div class="add-student d-flex justify-content-between align-items-center">
        <h3 class="i-name">All Teachers</h3>
        
        <a href="{{ route('teacher.register') }}"> <button type="button" class="btn btn-primary btn-sm std-button" style="margin-top:90px; margin-right: 50px;">Add Teacher</button></a>
    </div> 
   
   

    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Class</td>
                    <td>Phone</td>
                    <td>Subject</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)

                <tr class='std-list'>
                    <td class="students"> <img src="{{ url('public/Image/'.$teacher->image) }}">
                    <div class="students-de">
                        <h5><a href="{{ url('admin/teacher/'.$teacher->id)  }}" class="text-black">{{ $teacher['first_name'] }} {{ $teacher['last_name'] }}</a></h5>
                        <p>{{ $teacher['email'] }}</p>
                    </div>
                    </td>
                    <td class="students-des">
                        <h5>
                            @foreach ($teacher->classroom as $classroom)
                                <p>{{ $classroom->classroom_name }}</p> 
                            @endforeach
                        </h5>
                    </td>
                    <td class="role">
                        <p>{{ $teacher->phone }}</p>
                    </td>
                    <td class="subject">
                        <?php 
                            foreach($teacher->course as $key=>$course){                        
                                    echo '<p>'. $course->name .'</p>';
                                }    
                        ?>
                       
                    </td>

                     <td class="active">
                        <a href="{{ url('admin/teacher/'.$teacher->id) }}"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('teacher.update_form',['id'=>$teacher->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('teacher.delete',['id'=>$teacher->id]) }}"><i class="bi bi-trash"></i></a>
                     </td>



                </tr>
                    
                @endforeach
               
                
            </tbody>
        </table>
    </div>
</section>
@include('admin.partials.scripts')
