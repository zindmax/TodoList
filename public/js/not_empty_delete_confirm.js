$('.show_confirm_not_empty').on('click', function (event) {
    let form = this.closest("form");
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "This category is not empty",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Delete anyway',
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire('Deleted!', '', 'success');
        }
    });
});
