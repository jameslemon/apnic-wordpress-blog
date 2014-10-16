<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area col-md-3" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
        <script>
            try{
                $('#secondary > .widget > h3').wrapInner('<span></span>');
                $('#secondary > .widget #social-media-icons').parents('.widget:first').addClass('social-media-icons-widget');
            }catch(e){}

            /* Toggle on options for mailing list */
    (function(){
        try{
            var $options = $('#get-updates-options');
            $options.hide();
            var $button = $('.widget_wysija input.wysija-submit:first');
            $('<span id="get-updates-options-control">Show options</span>').insertBefore($button);
            var $control = window.$get_updates_control = $('#get-updates-options-control');
            $control.click(function(e){
                e.preventDefault();
                var $options = $('#get-updates-options');
                if($options.is(':visible')){
                    $options.hide();
                    window.$get_updates_control.text('Show options');
                }
                else{
                    $options.show();
                    window.$get_updates_control.text('Hide options');
                }
            });
        }
        catch(e){
            console.log('Problem adding show/hide options to get updates widget:');
            console.log(e.message);}
    }).call(this);
           
            /*
                function makeWidgetToggle(handle,parentSelector){
                    if( window[handle] === 'undefined' ){ return false; }
                    var $el = window[handle] = $(parentSelector);
                    if( $el.length === 0 ){ return false; }
                    $el.addClass('widget_with_toggle widget_with_toggle_hidden');
                    var $child = $('ul',$el);
                    if( $child.length === 0){ $child = $('div', $el) }
                    if( $child.length === 0){ return false; }

                    
                }
            */ 
            
            /* Toggle on widget for tag cloud */
            try{
            var $tag_cloud_widget = window.$tag_cloud_widget = $('.widget_tag_cloud');
            if($tag_cloud_widget.length > 0){
                $tag_cloud_widget.addClass('widget_tag_cloud_dynamic widget_tag_cloud_hidden');
                $('div',$tag_cloud_widget).hide();
              
                $('h3',$tag_cloud_widget).click(function(e){
                    e.preventDefault();
                    var $items = $('div',$tag_cloud_widget);
            
                  if($items.first().is(':visible')){
                      $items.hide();
                      $tag_cloud_widget.addClass('widget_tag_cloud_hidden').removeClass('widget_tag_cloud_visible');
                  }
                  else{
                      $items.show();
                      $tag_cloud_widget.removeClass('widget_tag_cloud_hidden').addClass('widget_tag_cloud_visible');
                  }
                });
            }}catch(e){console.log('Problem extending tag cloud widget toggle:');console.log(e.message);}
            /* Toggle on widget for archives */
            try{
            var $archive_widget = window.$archive_widget = $('.widget_archive');
            if($archive_widget.length > 0){
                $archive_widget.addClass('widget_archive_dynamic widget_archive_hidden');
                $('ul',$archive_widget).hide();
              
                $('h3',$archive_widget).click(function(e){
                    e.preventDefault();
                    var $items = $('ul',$archive_widget);
            
                  if($items.first().is(':visible')){
                      $items.hide();
                      $archive_widget.addClass('widget_archive_hidden').removeClass('widget_archive_visible');
                  }
                  else{
                      $items.show();
                      $archive_widget.removeClass('widget_archive_hidden').addClass('widget_archive_visible');
                  }
                });
            }}catch(e){console.log('Problem extending archive widget toggle:');console.log(e.message);}
            
            /* Toggle on widget for categories */
            try{
            var $categories_widget = window.$categories_widget = $('.widget_categories');
            if($categories_widget.length > 0){
                $categories_widget.addClass('widget_categories_dynamic widget_categories_visible');
                //$('ul',$categories_widget).hide();
              
                $('h3',$categories_widget).click(function(e){
                    e.preventDefault();
                    var $items = $('ul',$categories_widget);
            
                  if($items.first().is(':visible')){
                      $items.hide();
                      $categories_widget.addClass('widget_categories_hidden').removeClass('widget_categories_visible');
                  }
                  else{
                      $items.show();
                      $categories_widget.addClass('widget_categories_visible').removeClass('widget_categories_hidden');
                  }
                });
            }}catch(e){console.log('Problem extending categories widget toggle:');console.log(e.message);}


        </script>
