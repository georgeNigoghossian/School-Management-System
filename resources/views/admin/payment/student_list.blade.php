@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')

    <div class="add-student d-flex justify-content-between align-items-center">
        <h3 class="i-name">All Payments</h3>
        <!-- <button type="button" class="btn btn-primary btn-sm " style="margin-top:90px; margin-right: 50px;">Add Student</button> -->
    </div>
    
    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Total Payments</td>
                    <td>Amount Payed</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td class="students"> <img src="{{ url('public/Image/'.$payment->student->image) }}">
                    <div class="students-de">
                        <h5>{{ $payment->student->first_name }} {{ $payment->student->last_name }} </h5>
                        <p>{{ $payment->student->email }}</p>
                    </div>
                    </td>
                    <td class="students-des">
                        <h5> {{ $payment->total_payments }}</h5>
                    </td>
                    <td class="role">
                        <h5>{{ $payment->sum }}</h5>
                    </td>
                    <td class="active">
                       <a href="{{ route('student_payment.show',['id'=>$payment->student->id]) }}"><i class="fa-solid fa-eye"></i></a>
                       <a href="{{ route('student_payment.create',['id'=>$payment->student->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    
                </tr>
                @endforeach
              
                
            </tbody>
        </table>
    </div>
</section>
@include('admin.partials.scripts')