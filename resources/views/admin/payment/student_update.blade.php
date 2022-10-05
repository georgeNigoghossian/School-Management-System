@include('admin.partials.head')
@include('admin.partials.navbar')

<section id="interface">
    @include('admin.partials.search')

    <form name="register" class="form-question shadow-lg rounded mb-1" method="post" action="{{route('student_payment.update',["id" => $id])}}">
        @csrf
  
        <h3 class="i-name text-center mb-4  text-white pb-4 shadow-lg" style="background:#141E30;">Add Payments</h3>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
              <label class="label-question form-label" for="form6Example1"><i class="fa fa-credit-card me-2"></i>Payment Amount</label>
                <input type="number" id="form6Example1" class="form-control shadow" name="amount" required/>
                
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
               <label class="label-question form-label" for="form6Example2"><i class="fa-solid fa-calendar me-2"></i>Payment Date</label>
                <input type="date" id="form6Example2" class="form-control shadow" name="date" required/>
              </div>
            </div>
          </div>


          <button type="submit" class="btn btn-primary btn-block mb-4 std-button">Save</button>
    </form>

</section>
@include('admin.partials.scripts')