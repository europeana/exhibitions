<?php
/**
 * File: Footer.php
 * Common footer shared across this theme and all themes that don't have this page defined
 */
    $currentExhibit = exhibit_builder_get_current_exhibit();
    $eName = ve_get_exhibit_name_from_slug($exhibit->slug);
    $pageSlug = 'credits-' . $eName;
    $creditsPage = ve_get_page_by_slug($pageSlug);
?>


<div class="row" id="bottom-navigation">
	<div class="twelve columns">

		<div class="wrap_at_320">
			<a href="<?php echo uri('contact');?>"><?php echo ve_translate('contact', 'Contact');?></a>
		</div>
		
		<?php if (exhibit_builder_get_current_exhibit()): ?>
			<div class="wrap_at_320">
				<a class="return-to" rel="<?php echo uri(); ?>"
					href="<?php echo uri('items/browse') . '/?tags=' . ve_get_exhibit_name_from_slug($exhibit->slug) . '&theme=' . $currentExhibit->theme; ?>"><?php echo ve_translate("items-browse", "Browse items");?></a>
			</div>
			
			
       		<?php if (!isset($GLOBALS['themesUrl'] ) && is_null($GLOBALS['themesUrl'] ) ): ?>
       		
       			<?php set_exhibit_sections_for_loop_by_exhibit(get_current_exhibit()); ?>
       		
		        <?php
		            // make a flag for the fist page in the section. This is what we want to link to
		            $firstpage = false;
		            while (loop_exhibit_sections() && $firstpageX == false):
	                ?>
	                <?php if (exhibit_builder_section_has_pages()): ?>
	                	<?php $firstpageX = true; ?>
	                	
	                	<?php $GLOBALS['themesUrl'] = exhibit_builder_exhibit_uri(get_current_exhibit(), get_current_exhibit_section()); ?>
	                	
	                <?php endif; ?>
	            <?php endwhile; ?>
        
	            
	        <?php endif; ?>
	            
			
	    	<?php
	    		if(exhibit_has_map(get_current_exhibit())){
        			echo ('<div class="wrap_at_320">');
        			echo (	'<a class="return-to" rel="' . uri() . '" ');
        			echo (		' href="' .  $GLOBALS['themesUrl'] . '-map">' . ve_translate("browse-story-map", "Browse items on map") . '</a>');
        			echo ('</div>');
	    		}
			?>
			
			
			<?php if ($creditsPage):?>
				<div class="wrap_at_320">
					<a  class="return-to" rel="<?php echo uri(); ?>" href="<?php echo uri('credits-' . $eName) . '?theme=' . $currentExhibit->theme;?>"><?php echo ve_translate('credits', 'Credits');?></a>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	
		<div class="wrap_at_320">
			<a href="<?php echo uri('about-exhibitions');?>"><?php echo ve_translate("about-exhibitions", "About Exhibitions");?></a>
		</div>

	<!-- Added in by Dean, this is an extra link to return to the Europeana portal-->

		<div class="wrap_at_320">
			<a href="http://www.europeana.eu" title="Click here to go to the Europeana portal" rel="me">Go to Europeana Portal</a>
		</div>

	</div>

	
	<!-- If this script tag is closed it makes the google icon bigger -->
	<!-- php messes this up, so put outside of custom_ve_helper for now -->
	<!--script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d70f66c15fff6d0"-->
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=ra-4d70f66c15fff6d0">
	</script>
            
            
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">

		// ipad fix for google docs iframe
		if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
		    var viewportmeta = document.querySelector('meta[name="viewport"]');
		    if (viewportmeta) {
		        viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
				jQuery(document).bind('orientationchange',
					function () {
						if(window.orientation == 180 || window.orientation == 0){
							document.location.reload();
						}
					}
				);
		    }
		}
			

</script>


<?php if (isset($_GET['theme'])): ?>
    <script type="text/javascript" language="javascript">

        jQuery(document).ready(function() {
    		if(typeof(setThemePaths) != "undefined"){
	            setThemePaths("<?php echo $_GET['theme']; ?>");
       		}
        });
    </script>
<?php endif; ?>

</div><!-- end container -->

</body>
