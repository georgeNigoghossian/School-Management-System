@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')

    <div class="add-student d-flex justify-content-between align-items-center">
        <div>
        <h1 class="i-name">SEARCH RESULTS</h1>
        </div>
    </div>
    
    <div class="board ml-35 pl-30 searchResult">
        

        @php $count=0; @endphp
        @if(isset($studentResults) &&  !$studentResults->isEmpty())
            <h4>Students</h4>
        <ul>
            
            @foreach ($studentResults as $result)
            <a href="{{ route('student.details',['id'=>$result->id]) }}"><li>{{ $result->first_name}} {{ $result->last_name}}</li></a>
            @endforeach
            @php $count++; @endphp
        </ul>
        @endif
        @if(isset($teacherResults) &&  !$teacherResults->isEmpty())
            <h4>Teachers</h4>
        <ul>
            
            @foreach ($teacherResults as $result)
            <a href="{{ route('teacher.details',['id'=>$result->id]) }}"><li>{{ $result->first_name}} {{ $result->last_name}}</li></a>
            @endforeach
            @php $count++; @endphp
        </ul>
        @endif
        @if($count==0)
            <h3 class="mt-1 text-align-center">No Results Found</h3>
        @endif  
    </div>
</section>
@include('admin.partials.scripts')