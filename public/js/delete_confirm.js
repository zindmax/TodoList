$('.show_confirm').on('click', function (event) {
    let form = this.closest("form");
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Delete',
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire('Deleted!', '', 'success');
        }
    });
});
