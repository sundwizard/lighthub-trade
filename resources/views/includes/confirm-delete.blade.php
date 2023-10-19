@push('js')
<script>

    $('.confirm-deleted').on("click", function (e) {
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
        if (result.value) {
            Livewire.emit('delete-confirmed')
        }
        });
        e.preventDefault();
    });
</script>
@endpush
