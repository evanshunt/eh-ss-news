
jQuery.noConflict();

(function($, context) {

    $(document).ready(function() {
        initSelectChange();
    });

    function initSelectChange() {
        $('select#publishYear').on('change', function() {
            var form = $(this).parents('form:first');
            form.submit();
        });
    }

}(jQuery, window));