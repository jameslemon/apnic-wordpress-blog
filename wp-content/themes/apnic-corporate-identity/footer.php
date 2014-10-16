<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<script>
try{
// Tag iframes for better proportional stying
$('iframe').each(function(){
    var $me = $(this);
    if( $me.attr('src').indexOf('flickr') != -1){
        $me.addClass('iframe-to-flickr');
    }else if( $me.attr('src').indexOf('youtube') != -1){
        $me.addClass('iframe-to-youtube');
    }
    else if( $me.attr('src').indexOf('twitter') != -1){
        $me.addClass('iframe-to-twitter');
    }
    else if( $me.attr('src').indexOf('slideshare') != -1){
        $me.addClass('iframe-to-slideshare');
    }
});
$('iframe').wrap("<div class='iframe-wrapper'></div>");
}catch(e){}
// Create nicely captioned figures from images (on demand)
try{
    $('img.figure:not(figure img)').each(function(){
        var $img = $(this);
        var width = $img.attr('data-width');
        var caption = "<figcaption class='photo'>"+$img.attr('alt')+"</figcaption>";
        var html = "<figure></figure>";
        if(width !== undefined){
            html = "<figure style='width:" + width + "'></figure>"; 
        }
        $img.wrap(html).after(caption);
        $img.attr('height','');
        $img.attr('width','');
    });
}catch(e){console.log('Problem converting images to captioned figures');console.log(e.message);}
</script>
	</div><!-- #main .wrapper -->
<div class="container">
<!-- Footer content -->

			<div class="row" id="footer">
    <div class="col-md-6" id="copyright-stamp">
        © APNIC | <a href='//www.apnic.net/apnic-info/privacy'>Privacy</a>
    </div>
    <div class="col-md-6 text-right">
        <span id="iso9001-stamp" class="apnic-sprite apnic-sprite-icons pull-right"><span>ISO 9001:2008 Certified</span></span>
    </div>
</div>


<script>
    (function(){
        var url = window.location;
        var d = new Date();
        var message = "<span class='visible-print'>Printed on " + d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + " from " + url + "</span>";
        var selector = "#copyright-stamp";
        $(selector).append(message);
    }).call(this);
</script>			
</div><!-- /.container -->

<?php wp_footer(); ?>
</body>
</html>
