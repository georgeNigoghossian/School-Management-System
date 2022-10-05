@include('admin.partials.head')
@include('admin.partials.navbar')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'You have reached maximum number of students for this class .',

}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {    
    	window.location.href = "{{route('student.list')}}" ;
    }  

});
</script>
@include('admin.partials.scripts')