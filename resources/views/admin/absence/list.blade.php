@include('admin.partials.head')
@include('admin.partials.navbar')


    <section id="interface">
        @include('admin.partials.search')

         <div class="add-student d-flex  align-items-center">
            <h3 class="i-name">Students Absences</h3>
            <select class="form-select" name="classroom" id="classroom" aria-label="Default select example">
                <option selected>Filter By Class</option>
                @if(count($classrooms)>0)
                @foreach ($classrooms  as $classroom)
                <option value="{{ $classroom['id'] }}">{{ $classroom->classroom_name }}</option>    
                @endforeach
                @endif
              </select>
           
        </div> 
        
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>ClassRoom</td>
                        <td>Absences</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)                        
                    <tr class='std-list'>
                        <td class="students"> <img src="{{ url('public/Image/'.$student->image) }}">
                        <div class="students-de">
                            <h5>{{ $student['first_name']}} {{ $student['last_name'] }}</h5>
                            <p>{{ $student['email'] }}</p>
                        </div>
                        </td>
                        <td class="students-des">
                            <h5></h5>
                            <p>{{ $student->classroom->classroom_name }}</p>
                        </td>
                        <td class="role">
                            
                            @if(isset($student->absences[0]))
                            <p>{{ count($student->absences->toArray())}}</p>
                            @else
                            <p>0</p>
                            @endif
                        </td>

                        <td class="active">
                            <a href="{{ route('absences.create',['id'=>$student->id]) }}"><i class="fa-solid fa-plus"></i></a>
                            <a href="{{ route('absences.show',$student->id) }}"><i class="fa-solid fa-eye"></i></a>
                          
                         </td>
    
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    </script>
    @include('admin.partials.scripts')