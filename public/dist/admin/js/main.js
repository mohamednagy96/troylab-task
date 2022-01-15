/**
 * delete modal
 */
 $('.delete-modal-btn').on("click", function() {
    $('#delete-modal').modal('show');
    $('#delete-modal-form').attr('action', $(this).data('url'));
});

$('.select2').select2({
    theme: 'bootstrap4'
})


$('.editor').summernote()
