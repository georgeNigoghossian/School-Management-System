@if(Session::has('total_mark'))
@php
    $total_mark=Session::get('total_mark');
    $exam_total_mark=Session::get('exam_total_mark');
    $exam_total_mark=intval($exam_total_mark);
   
@endphp

    <script>
        
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Your Mark is '+ "{{ json_encode($total_mark) }} / {{ json_encode($exam_total_mark) }}"  ,
        showConfirmButton: true,

        }).then((result) => {
        if (result.isConfirmed) {
                window.location.reload();
        }});
    </script>

@php
    $user=Session::get('user');
    Session::flush();
    Session::put('user',$user);
@endphp


@endif
