jQuery(document).ready(function($) {
    $("#randomColor").hover(
        function()
        {
            $('.fa-refresh').addClass('fa-spin');
        },
        function()
        {
            $('.fa-refresh').removeClass('fa-spin');
        }
    );
});