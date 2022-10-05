@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')


    <form class="form-question shadow-lg rounded mb-5 pb-4">
        <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">All Payment </h3>
       
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Date Paid</td>
                        <td>Amount Paid</td>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student_payments as $payment)
                        @if($payment->current_payments)
                    <tr>
                        <td class="students-des">
                            <h5>{{ $payment->date }}</h5>
                        </td>
                        <td class="role">
                            <p class="text-dark">{{ $payment->current_payments }} <span>$</span></p>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        </form>
    
</section>
@include('admin.partials.scripts')