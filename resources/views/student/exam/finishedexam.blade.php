@include('student.partials.head')
@include('student.partials.header')



  <section class="mb-5">
    <h2 class="main-title">Finished Exam</h2>
  <div class="row d-flex justify-content-center">
    @foreach ($marks as $mark)
    <div class=" col-lg-4 col-md-6">
        <div class="book-finished-homework">
            <div class="cover  d-flex flex-column  ">
                <h1 class=""> {{  $mark->exam->name }}</h1>
                <div class="mt-5">  {{$mark->created_at}}</div>
            </div>
            <div class="page"></div>
            <div class="page"></div>
            <div class="page"></div>
            <div class="page"></div>
            <div class="page"></div>
            <div class="last-page">
                <h2 class="mt-3 fw-bold text-black">{{  $mark->exam->name }}</h2>
                <div class="text-center mark mt-5">
                    <h5 class="fw-bold text-dark ">Mark</h5>
                    <p class="border-top border-2 border-dark pt-2 fs-3">{{  $mark->mark }}</p>
                </div>
            </div>
            <div class="back-cover">
        
            </div>
        
          </div>
    </div>
    @endforeach
  </div>

  </section>
@include('student.partials.footer')