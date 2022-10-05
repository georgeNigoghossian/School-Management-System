@include('teacher.partials.head')
@include('teacher.partials.header')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Sum of all marks is not correct',

}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {    
    	window.location.href = "{{route('exam.create')}}" ;
    }  

});
</script>
@include('teacher.partials.footer')