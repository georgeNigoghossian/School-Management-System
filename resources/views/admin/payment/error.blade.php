@include('admin.partials.head')
@include('admin.partials.navbar')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Your Amount Paid Is Exceeding The Total Class Assignment.',

}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {    
    	window.location.href = "{{route('student.payment')}}" ;
    }  

});
</script>
@include('admin.partials.scripts')