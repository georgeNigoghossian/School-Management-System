@include('admin.partials.head')
@include('admin.partials.navbar')

@php
function searchForTime($id, $array) {
    
  
    foreach ($array as $key => $val) {
        if ($val['day'] === $id) {
            
            return $key;
        }
    }
    return null;
}


@endphp

<section id="interface">
    @include('admin.partials.search')

    <form class="form-question shadow-lg rounded mb-5 pb-4">
        <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;"><span style="letter-spacing: 1.5px;">Weekly Schedule</span> </h3>
       
        <div id="row1" class="row pb-3">
            <div class="col-lg-12">
                <div class="card shadow-sm ">
                  <div class="container">
                      <div class="table-responsive">
                          <table class="table table-bordered text-center">
                              <thead>
                                  <tr class="bg-light-gray">
                                      <th class="text-uppercase">Time</th>
                                      <th class="text-uppercase">Sunday</th>
                                      <th class="text-uppercase">Monday</th>
                                      <th class="text-uppercase">Tuesday</th>
                                      <th class="text-uppercase">Wednesday</th>
                                      <th class="text-uppercase">Thursday</th>
                                  </tr>
                              </thead>
                           
                              <tbody>
                               
                               
                                @foreach($schedules as $key=>$schedule)
                                   
                                @php 
                              
                                    $sundayIndex[$key]=searchForTime('Sunday', $schedule);
                                    
                                    if(isset($sundayIndex[$key]))
                                    $sundayTime[$key]=$schedule[$sundayIndex[$key]];

                                    
                                    $mondayIndex[$key]=searchForTime('Monday', $schedule);
                                    
                                    if(isset($mondayIndex[$key]))
                                    $mondayTime[$key]=$schedule[$mondayIndex[$key]];
                                    
                                    $tuesdayIndex[$key]=searchForTime('Tuesday', $schedule);
                                    if(isset($tuesdayIndex[$key]))
                                    $tuesdayTime[$key]=$schedule[$tuesdayIndex[$key]];
                                    
                                    $wednesdayIndex[$key]=searchForTime('Wednesday', $schedule);
                                    if(isset($wednesdayIndex[$key]))
                                    $wednesdayTime[$key]=$schedule[$wednesdayIndex[$key]];
                                    
                                    $thursdayIndex[$key]=searchForTime('Thursday', $schedule);
                                    if(isset($thursdayIndex[$key]))
                                    $thursdayTime[$key]=$schedule[$thursdayIndex[$key]];
                                    
                              
                                
                                @endphp
                                  <tr>
                                   
                                      <td class="align-middle">{{ $times[$key]['time'] }}</td>
                                      <td class="kk">
                                       
                                        @if(isset($sundayTime[$key]))
                                        
                                          <span class="kk1 py-2 px-3 rounded-3 text-white fs-6 text-nowrap" style="background-color: rgb(2, 19, 46);">{{ $sundayTime[$key]->course->name }}</span>
                                        @endif
                                      </td>
                                      <td>
                                        @if(isset($mondayTime[$key]))
                                          <span class=" py-2 px-3 rounded-3 mb-3 text-white fs-6 text-nowrap" style="background-color: rgb(18, 61, 3);">{{ $mondayTime[$key]->course->name  }}</span>
                                          @endif
                                      </td>
      
                                      <td>
                                        @if(isset($tuesdayTime[$key]))
                                          <span class="py-2 px-3 rounded-3 mb-3 text-white fs-6 text-nowrap" style="background-color:rgb(173, 176, 5) ;">{{ $tuesdayTime[$key]->course->name  }}</span>
                                          @endif
                                      </td>
                                      <td>
                                        @if(isset($wednesdayTime[$key]))
                                          <span class=" py-2 px-3 rounded-3 mb-3 text-white fs-6 text-nowrap" style="background-color: rgb(2, 19, 46);">{{ $wednesdayTime[$key]->course->name  }}</span>
                                      </td>
                                      @endif
                                      <td>
                                     
                                        @if(isset($thursdayTime[$key]))
                                          <span class=" py-2 px-3 rounded-3 mb-3 text-white fs-6 text-nowrap" style="background-color: rgb(190, 11, 11);">{{ $thursdayTime[$key]->course->name  }}</span>                                          
                                        @endif
                                      </td>
                                  
                                  </tr>
                               
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div> 
               </div>
            </div>
        </form>
    
</section>
@include('admin.partials.scripts')