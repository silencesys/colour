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
    // Show complementary colour
    $("#switch-colour").click(
        function(event)
        {
            // prevent <a> from refreshing
            event.preventDefault();

            // define variables
            var el          = $('#myColour');
            var main_colour = el.attr("data-main");
            var comp_colour = el.attr("data-complementary");
            var txt_comp    = "Show complementary colour";
            var txt_main    = "Show main colour";
            // I love Nunak
            // and I love Tutak <3
            if(el.val() == main_colour)
            {
                el.val(comp_colour);
                $(this).text(txt_main);
                $('.complementaryColour').css('background', comp_colour);
            }
            else
            {
                el.val(main_colour);
                $(this).text(txt_comp);
                $('.complementaryColour').css('background', 'none');
            }
        }
    );
});