(function(){
        jQuery(document).ready(function($){
/* Add static link to old news archives */
$('#secondary .widget_archive:first ul:first').append('<li><a href="//www.apnic.net/publications/news/news-archives">News archives</a></li>');

/* Twitter hover thingo */
$('#secondary #reallysimpletwitterwidget-3 ul li').on("mouseover",function(){
    $('#secondary #reallysimpletwitterwidget-3 ul').addClass('unfocused');
});
$('#secondary #reallysimpletwitterwidget-3 ul li').on("mouseout",function(){
    $('#secondary #reallysimpletwitterwidget-3 ul').removeClass('unfocused');
});

/* Hover over images triggers title text to look hovered */
$('.thumbnail-link-co-hover').on("mouseover",function(){
    var $me = $(this);
    var $partner = $($me.attr('data-target'));
    $partner.addClass('hovered');
});
$('.thumbnail-link-co-hover').on("mouseout",function(){
    var $me = $(this);
    var $partner = $($me.attr('data-target'));
    $partner.removeClass('hovered');
});
});

    /* Ellipsis (aka the little '...' on the end of long text) */
    if( ( jQuery !== undefined ) && ( typeof jQuery().ellipsis === "function" ) ){

        // When the page is ready...
        jQuery(document).ready(function($){
            $('.ellipsis').each(function(){
                var $me = $(this);

                // Store the original text for later
                $me.attr('data-text-orig',$me.text());

                // Get the number of rows/lines
                var rows =  $me.attr('data-ellipsis-rows');
                if (rows === undefined) { rows = 1; }

                // Go ellipsis go!
                $me.ellipsis({row:rows}); 
            });
            // When the window is (finished being) resized...
            $(window).bind("debouncedresize", function() {

                $('.ellipsis').each(function(){
                    var $me = $(this);

                    // Restore orig text
                    $me.text($me.attr('data-text-orig'));

                    // Get the number of rows/lines
                    var rows =  $me.attr('data-ellipsis-rows');
                    if (rows === undefined) { rows = 1; }
                
                    // Go ellipsis go!
                    $me.ellipsis({row:rows}); 
                });
            });
        });
    }
}).call(this);
