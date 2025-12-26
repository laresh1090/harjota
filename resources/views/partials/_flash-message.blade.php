{{-- check-for-message --}}
@if (session()->has('success'))
{{-- add-sweet-alert --}}
<script>
    Swal.fire({
        icon: 'success',
        title: 'Hurray',
        text: '{{ session('success') }}',  
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        })
</script>

@endif