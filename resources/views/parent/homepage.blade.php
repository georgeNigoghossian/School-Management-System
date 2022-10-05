@include('parent.partials.head')
@include('parent.partials.header')

<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url('/assets/img/slide/slide-3.jpg');">
                <div class="carousel-container">
                    <div class="carousel-content container">
                        <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Distinguished School</span></h2>
                        <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique repudiandae dignissimos inventore fugiat totam officia architecto voluptatem error. Ipsa ex at, in rem cumque consequatur cum deleniti possimus natus distinctio.</p>
                        <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </section>
<!-- End Hero -->



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

<div class="container parent-schedule-margins " id="schedule">
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

<section id="teachers" style="background-color: #eee;" >
<h2 class="main-title mt-3">Your son's Supervising professors</h2>
<!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($teachers as $key=>$teacher)
            @php $teacher=$teacher->toArray();  @endphp
            <div class="swiper-slide">
                <div class="imgBox">
                <img src="{{ url('public/Image/'.$teacher["image"]) }}" />
                </div>
                <div class="details">
                <h2>{{ $teacher["first_name"] }} {{ $teacher["last_name"] }}
                    <span>@php $names= implode(" , ",$course_names[$key])@endphp
                        {{ $names }}</span>
                </h2>
                </div>
            </div>
           @endforeach

        </div>
        <div class="swiper-pagination "></div>
    </div>
</section>
<section id="notes">
    <div class="container">
        <div class="row">
            <div class="col-5 table-note">
                <table class="notes">
                    <thead style="background-color: #f4f6fb;">
                        <tr>
                            <th>Notes</th>
                            <th>Date</th>
                            <th>Subject</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>note 1</td>
                            <td>1/5/2021</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                        </tr>
                        <tr>
                            <td>note 2</td>
                            <td>1/4/2021</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                        </tr>
                        <tr>
                            <td>Note 3</td>
                            <td>1/6/2021</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-7 table-note">
                <table class="notes">
                    <thead style="background-color: #f4f6fb;">
                        <tr>
                            <th>Reason Of Absencs</th>
                            <th>Date</th>
                            <th>Missed Course</th>
                            <th>Justified </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absences as $absence)                  
                        <tr>
                            <td>{{ $absence->cause }}</td>
                            <td>{{ $absence->day }}</td>
                            @if( isset($absence->course->name))
                            <td>{{ $absence->course->name }}</td>
                            @else
                            <td>All Day</td>
                            @endif
                            <td>@php if($absence->justified==1){ 
                                    $justified="yes";
                                }else{
                                    $justified="no";
                                }
                                @endphp
                                {{ $justified }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@include('parent.partials.footer')