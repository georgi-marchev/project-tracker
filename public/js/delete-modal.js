$(document).ready(function () {
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var url = button.data('url');
        // Update the form action with the URL from the original request
        $(this).find('#delete-form').attr('action', url);
    });
});