@include('admin.partials.head')
@include('admin.partials.navbar')


<section id="interface">
    @include('admin.partials.search')

    <div class="add-student d-flex justify-content-between align-items-center">
        <h3 class="i-name">Student Notes</h3>
    </div>
    
    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Student Name</td>
                    <td>Note</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                <tr>
                    <td class="students"> 
                    <div class="students-de">
                        <h5>{{ $note->student->first_name }} {{ $note->student->last_name }}</h5>
                        <p>{{ $note['created_at'] }}</p>
                    </div>
                    </td>
                    <td class="students-des">
                        <h5>
                            {{ $note['notes'] }}
                         </h5>
                    </td>
                    <td class="active">
                       {{-- <a href="#"><i class="fa-solid fa-reply me-2" title="replay"></i></a> --}}
                       <a href="{{ url('admin/student_notes/delete/'.$note->id) }}"><i class="fa-solid fa-trash-can" title="delete"></i></a>
                       <a href="" class="reply-class" data-bs-toggle="modal" data-bs-target="#replyModal" data-student-id="{{ $note['student_id'] }}"><i class="fa-solid fa-reply" title="delete"></i></a>
                    </td>
                    
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</section>
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="{{ url('admin/student_notes/reply') }}" method="post">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="replyModalLabel">Reply To Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <textarea rows="4" cols="55" name="reply"></textarea>
            <input id="student_id" name="student_id" type="hidden" value=""/>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary std-button" data-bs-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-primary std-button">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var id=$('.reply-class').attr('data-student-id');  
        $("#student_id").val(id);
    </script>
@include('admin.partials.scripts')