$(document).ready(function() {
    /**
     * Checkbox
     */
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
