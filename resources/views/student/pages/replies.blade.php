@include('student.partials.head')
@include('student.partials.header')


<section class="mt-5 mb-5"  style="height: 560px;">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center  ">
        <div class="complaint-photo col-md-9 col-lg-2 col-xl-4" >
          <img src="/assets/img/reply.svg" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-8 col-xl-6 offset-xl-1">
            <div class="board">
                <table class="table  table-striped">
                    <thead>
                        <tr class="table-light">
                            <th>Name</th>
                            <th>Reply</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($replies as $reply)
                        <tr>
                            
                            <td>
                            <div >
                                <h5> Admin</h5>
                                <p>{{ $reply->created_at }}</p>
                            </div>
                            </td>
                            <td >
                                <p>{{ $reply->reply }}</p>
                            </td>
                            <td class="active">
                                <a href="{{ route('student.contactUs') }}"><i class="fa-solid fa-reply me-2" title="replay"></i></a>
                                <a href="{{ route('student.reply.delete',['id'=>$reply->id]) }}"><i class="fa-solid fa-trash-can" title="delete"></i></a>
                            </td>
                            
                        </tr>  
                            @endforeach
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>

  </section>
  
@include('student.partials.footer')