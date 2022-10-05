@include('student.partials.head')
@include('student.partials.header')

<section>
  <h2 class="main-title">New Homework</h2>
<div class="row d-flex justify-content-evenly">

 @foreach($homeworks as $key=>$homework)

  <div class=" col-lg-3 col-md-6">
    <div class="book-new-homework">
      <div class="cover-new-homework">
        <h3 class="text-white my-4">{{ $homework->title }}</h3>
          <div class="d-flex flex-column w-50 mx-auto ">
            <a href="{{ url('public/Homework/'.$homework->file) }}" class="button-student rounded py-2" download><span><i class="fa-solid fa-download me-1"></i> Download</span></a>
            <form action="{{ route('student.homework.store') }}" method="post" enctype="multipart/form-data" class="d-flex flex-column">
              @csrf
              <input type="file" id="file"  style="display:none;" name="file">
              <a href="#" class="button-student mt-3 rounded py-2"  id="{{ $key+1 }}" name="button" value="Upload" onclick="thisFileUpload(this);"><span><i class="fa-solid fa-upload me-1"></i>Upload</span> </a>
              <input type="hidden" name="homework_id" value="{{ $homework->id }}"/>
              <input type="hidden" name="student_id" value="{{ $student->id }}"/>
              <button  style="display:none;" class=" button-student mt-3 rounded py-2" type="submit" id="send{{ $key+1 }}" onclick="my()">Send</button>
            </form>
          </div>
        <span class="d-block text-white fs-5 py-4">Delivery Date: {{ $homework->homework_date }}</span>
      </div>
    </div>
  </div>
  @endforeach
  
</div>

</section>
  <script>
    function my(){
    if (document.getElementById("file").files.length == 0) {
    alert("No files selected.");
    }else{
     // alert(true);
    }
  }

    function thisFileUpload() {
        document.getElementById("file").click();
    };
    function thisFileUpload(btn) {
        document.getElementById("file").click();
        var num=btn.id;
        var upload = document.getElementById(num);
        var send = document.getElementById("send"+num);
        upload.setAttribute("style", "display:none;");
        send.setAttribute("style", "display:block");
    };
</script>
@include('student.partials.footer')