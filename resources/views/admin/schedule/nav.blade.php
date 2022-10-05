
    <div class="pagin p-4 ">
        <ul class="pagination justify-content-end me-5">
            <li class="page-item "><a class="page-link" href="{{ route('schedule.create',['id'=>$id,'day'=>'sun']) }}" >Su</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('schedule.create',['id'=>$id,'day'=>'mon']) }}" >Mo</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('schedule.create',['id'=>$id,'day'=>'tue']) }}" >Tu</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('schedule.create',['id'=>$id,'day'=>'wed']) }}" >We</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('schedule.create',['id'=>$id,'day'=>'thu']) }}" >Th</a></li>
          </ul>
    </div>
