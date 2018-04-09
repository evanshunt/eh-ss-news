
jQuery.noConflict();

(function($, context) {

    $(document).ready(function() {
        initSelectChange();
    });

    function initSelectChange() {
        $('select#publishYear').on('change', function() {
            $(this).parent().submit();
        });
    }

}(jQuery, window));