@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')


    <form class="form-question shadow-lg rounded mb-5 pb-4">
        <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">All Clasrooms </h3>
       
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Class Number</td>
                        <td><span class="ms-5"></span> </td>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($classrooms as $classroom)
                    <tr>
                        <td class="students-des">
                            <h5>{{ $classroom->classroom_name  }}</h5>
                        </td>
                        <td class="role">
                            <button type="button" class="btn btn-primary px-3 py-1 std-button" style="font-size: 16px;">
                                <a href="{{ route('schedule.details',$classroom->id) }}" class="text-white">Weekly schedule</a></button>
                        </td>
                    </tr>                   
                    @endforeach
                </tbody>
            </table>
        </div>
        </form>
    
</section>
@include('admin.partials.scripts')