jQuery(document).ready(function($) {

    $("#btn-about").click(function(event) {
        event.preventDefault();
        if($("#c-about").is(":visible"))
        {
            $("#c-about").slideUp({duration: 500});
            $("#c-tips").slideToggle({duration: 500});
        }
        else
        {
            $("#c-about").slideToggle({duration: 500});
            $("#c-authors").slideUp({duration: 500});
            $("#c-tips").slideUp({duration: 500});
        }
    });

    $("#btn-authors").click(function(event) {
        event.preventDefault();
        if($("#c-authors").is(":visible"))
        {
            $("#c-authors").slideUp({duration: 500});
            $("#c-tips").slideToggle({duration: 500});
        }
        else
        {
            $("#c-authors").slideToggle({duration: 500});
            $("#c-about").slideUp({duration: 500});
            $("#c-tips").slideUp({duration: 500});
        }
    });

});