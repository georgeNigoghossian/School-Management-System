@include('teacher.partials.head')
@include('teacher.partials.header')


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

    <div class="table-responsive weekly-schedule">
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
                 
                @foreach($arr as $key=>$a)
                    {{-- @foreach($ar as $key=>$a) --}}
                     
                @php 
              
                    $sundayIndex[$key]=searchForTime('Sunday', $a);
                    
                    if(isset($sundayIndex[$key]))
                    $sundayTime[$key]=$a[$sundayIndex[$key]];

                    
                    $mondayIndex[$key]=searchForTime('Monday', $a);
                    
                    if(isset($mondayIndex[$key]))
                    $mondayTime[$key]=$a[$mondayIndex[$key]];
                    
                    $tuesdayIndex[$key]=searchForTime('Tuesday', $a);
                    if(isset($tuesdayIndex[$key]))
                    $tuesdayTime[$key]=$a[$tuesdayIndex[$key]];
                    
                    $wednesdayIndex[$key]=searchForTime('Wednesday', $a);
                    if(isset($wednesdayIndex[$key]))
                    $wednesdayTime[$key]=$a[$wednesdayIndex[$key]];
                    
                    $thursdayIndex[$key]=searchForTime('Thursday', $a);
                    if(isset($thursdayIndex[$key]))
                    $thursdayTime[$key]=$a[$thursdayIndex[$key]];
                    
              
                
                 @endphp 
                <tr>
                    
                    <td class="align-middle fw-bold">{{ $times[$key]['time'] }}</td>
                    <td class="p-2 ">
                        @if(isset($sundayTime[$key]))
                            <span class="bg-primary  py-2 px-3  rounded-3  text-white fs-6 "> {{ $sundayTime[$key]->course->name }}</span>
                            
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($mondayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $mondayTime[$key]->course->name  }}</span>
                            
                        @endif
                    </td>

                    <td class="p-2">
                        @if(isset($tuesdayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $tuesdayTime[$key]->course->name  }}</span>
                            
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($wednesdayTime[$key]))
                            <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $wednesdayTime[$key]->course->name  }}</span>
                            
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($thursdayTime[$key]))
                        <span class="bg-primary py-2 px-3  rounded-3  text-white fs-6 ">{{ $thursdayTime[$key]->course->name  }}</span>
                        
                        @endif
                    </td>
                  
                  
                </tr>
                    {{-- @endforeach --}}
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@include('teacher.partials.footer')