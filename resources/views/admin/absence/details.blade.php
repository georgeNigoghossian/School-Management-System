@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')
    

    <form class="form-question shadow-lg rounded mb-5 pb-4">
        <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">All Absences </h3>
       
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>The Reason Of Absencs</td>
                        <td>The type of absence</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reasons as $reason)
                    <tr class="text-capitalize">
                        <td class="students-des">
                            <h5>{{ $reason->day }}</h5>
                        </td>
                        <td class="students-des">
                            <h5>{{ $reason->cause }}</h5>
                        </td>
                        
                        <td class="students-des">
                            @if($reason->justified==1)
                            <h5>Justified</h5>
                            @else
                            <h5>Not Justified</h5>
                            @endif
                        </td>
                        
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </form>
    
</section>

@include('admin.partials.scripts')