@include('admin.partials.head')
@include('admin.partials.navbar')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <section id="interface">
        @include('admin.partials.search')

         <div class="add-student d-flex justify-content-between align-items-center">
            <h3 class="i-name">All Students</h3>
            <select class="form-select" name="classroom" id="classroom" aria-label="Default select example">
                <option selected>Filter By Class</option>
                @if(count($classrooms)>0)
                @foreach ($classrooms  as $classroom)
                <option value="{{ $classroom['id'] }}">{{ $classroom->classroom_name }}</option>    
                @endforeach
                @endif
              </select>
            <a href="{{ route('student.register') }}"><button type="button"  class="btn btn-primary btn-sm std-button" style="margin-top:90px; margin-right: 50px;" >Add Student</button></a>
        </div> 
        
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>ClassRoom</td>
                        <td>Phone</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)                        
                    <tr class='std-list'>
                        <td class="students"> <img src="{{ url('public/Image/'.$student->image) }}">
                        <div class="students-de">
                            <h5 ><a class="text-black" href="{{ url('admin/student/'.$student->id) }}">{{ $student['first_name']}} {{ $student['last_name'] }}</a></h5>
                            <p>{{ $student['email'] }}</p>
                        </div>
                        </td>
                        <td class="students-des">
                            <h5></h5>
                            <p>{{ $student->classroom->classroom_name }}</p>
                        </td>
                        <td class="role">
                            <p>{{ $student['phone']}}</p>
                        </td>

                        <td class="active">
                            <a href="{{ url('admin/student/'.$student->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ url('admin/student/update_student/'.$student->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('admin/student/delete/'.$student->id) }}"><i class="bi bi-trash"></i></a>
                         </td>
    
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

    </section>
    
    
    <script>
        
        $(document).ready(function(){
            /**Custom Code By George */
    $("#classroom").on('change', function() {
      var classroom_id= $(this).val() ;

        $.ajax({
                type:"GET",
                url:"{{ route('filter.student') }}",
                data:{'classroom_id':classroom_id},
                success:function(data){
                    $('body').html(data);
                },
            });
        });  
    });
    //$('#classroom').select2();
    </script>
    @include('admin.partials.scripts')