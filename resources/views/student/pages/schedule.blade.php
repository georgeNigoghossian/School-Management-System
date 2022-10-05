@include('student.partials.head')
@include('student.partials.header')


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

<div class="container mt-4">
    <h2 class="main-title">Weekly Schedule</h2>

    <div class="table-responsive">
        <table class="table  text-center">
            <thead>
                <tr class="bg-light">
                    <th class="text-uppercase">Time
                    </th>
                    <th class="text-uppercase p-2">Sunday</th>
                    <th class="text-uppercase p-2">Monday</th>
                    <th class="text-uppercase p-2">Tuesday</th>
                    <th class="text-uppercase p-2">Wednesday</th>
                    <th class="text-uppercase p-2">Thursday</th>

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
                    <td class="align-middle fw-bold">{{ $times[$key]['time'] }}</td>
                    <td class="p-2">
                        @if(isset($sundayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $sundayTime[$key]->course->name }}</span>
                            <div class="mt-4 fs-6"></div>
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($mondayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $mondayTime[$key]->course->name  }}</span>
                            <div class="mt-4 fs-6"></div>
                        @endif
                    </td>

                    <td class="p-2">
                        @if(isset($tuesdayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $tuesdayTime[$key]->course->name  }}</span>
                            <div class="mt-4 fs-6"></div>
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($wednesdayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $wednesdayTime[$key]->course->name  }}</span>
                            <div class="mt-4 fs-6"></div>
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($thursdayTime[$key]))
                        <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $thursdayTime[$key]->course->name  }}</span>
                        <div class="mt-4 fs-6"></div>
                        @endif
                    </td>
                  
                  
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@include('student.partials.footer')