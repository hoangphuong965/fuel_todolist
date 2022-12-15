$(document).ready(function() {
    // Checkbox synchronization
    $('#todo_list input[type=checkbox]').change(function(e) {
        var $this = $(this);
        $.post(
            uriBase + 'project/change_task_status',
            {
                'task_id': $this.data('task_id'),
                'new_status': $this.is(':checked') ? 1 : 0
            }
        );
    });
});