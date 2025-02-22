<?php

$_SESSION['themes_uri'] = str_replace("themes-map", "themes", uri());

?>




	<!--[if lte IE 8]>
	<style type="text/css">
	
		body{
			/* disable responsive behaviour (limit size to stop layout breaking) */
			min-width:	768px;
		}	
		
	</style>
	<![endif]-->
	
	<!--[if lte IE 7]>
	<style type="text/css">
		.theme-item-wrapper{
			display:	inline-block;
		}
		
		.theme-item-wrapper{
			display:	inline;
		}
		
		.six{
			max-width:45%;
		}
	</style>
	<![endif]-->
	
	

<script type="text/javascript">

	jQuery(document).ready(function(){
		var elRef  = document.getElementById("elRefStyle");
		var imgUrl = "";
		if(elRef.currentStyle) {		// IE / Opera
			imgUrl = elRef.currentStyle.backgroundImage;
		}
		else {							// Firefox needs the full css code to work
			imgUrl = getComputedStyle(elRef,'').getPropertyValue('background-image');
		}
		imgUrl = imgUrl.replace(/\"/g, '').replace(/url\(/g, '').replace(/\)/g, '');
		jQuery(".new_overlay img").attr("src", imgUrl);
	});
	
</script>

<!-- reference element for dynamic style application -->
<div id="elRefStyle" class="theme-img-overlay" style="display:none;"></div>

<div class="text-full" style="width:100%;">
    <div class="primary" style="width:100%;">
        <div class="exhibit-text exhibit-theme-wrapper">

            <h1 class="styled-text"><?php echo ve_translate('themes', 'Themes');?></h1>
            
            <?php echo exhibit_builder_page_text(); ?>

            <style>
            	.new_overlay{
            		position:	absolute;
              		max-width:	100%;
            	}
            	
            </style>
            
            <?php
         /**
         * Get the current exhibit and find the first section.
         * The first section would be the 'theme' page.
         */
            if (!$exhibit) {
                if (!($exhibit = exhibit_builder_get_current_exhibit())) {
                    return;
                }
            }
          
            
            $key = 0;
            $errors = array();
            // Check the number of sections -1 (the theme section where we are)
            $nrSections = sizeof($exhibit->Sections) - 1;
            
            
            // initialise pairs of title / image / link
            
            $themeTitle1	= '';
            $themeTitle2	= '';
            
            $themeImage1	= '';
            $themeImage2	= '';
            
            $themeLink1		= '';
            $themeLink2		= '';
            
            $rowCount		= 0;
            $themeHTML		= '';
            

            // new stuff
            $themesCollapsed= '';
            $themesCollapsed .=	'<div class="row">';
            $themesCollapsed .= 	'<div class="twelve columns">';
            $themesCollapsed .= 		'<ul class="block-grid two-up">';
            
            
            // Cycle through all the Exhibit sections and list them as Themes.
            foreach ($exhibit->Sections as $key => $exhibitSection) {
            	
            	$rowCount = $rowCount +1;

            	// skip the first one because this is the exhibit section (themes) we are currently on
            	if ($exhibitSection->hasPages() && ($exhibitSection->order > 1)) {
            		
            		$themesCollapsed .=					'<li class="item-li"';
            		
            		
            		if($key%2==0 && $rowCount == count($exhibit->Sections)){		// odd number of themes fixed here
            			$themesCollapsed .=					'style="width:100%;"';
            		}
            		
            		$themesCollapsed .=					'>';
					$themesCollapsed .=						'<div class="theme-center-outer">';
					$themesCollapsed .=							'<div class="theme-center-middle">';
					$themesCollapsed .=								'<div class="theme-center-inner">';
            		$themesCollapsed .=									'<a href="'.$themeLink.'">';
            		$themesCollapsed .=     								ve_get_theme_thumbnail($exhibitSection->slug, $exhibitSection->title ,$errors); // force some space
            		$themesCollapsed .=										'<div class="new_overlay" style="z-index:2; top:0px;">';
            		$themesCollapsed .=											'<img src=""/>';
            		$themesCollapsed .=										'</div>';
            		$themesCollapsed .=									'</a>';
					$themesCollapsed .=								'</div>';
					$themesCollapsed .=							'</div>';
					$themesCollapsed .=						'</div>';
					$themesCollapsed .=						'<a href="'.$themeLink.'">';
					$themesCollapsed .=							'<h5>'. html_escape($exhibitSection->title, $errors) .'</h5>';
					$themesCollapsed .=						'</a>';
            		$themesCollapsed .=					'</li>';
            		
            		if($key%2==1){	
            			
            			error_log("key " . $key . " modulus 2 is 1, close ul-div.12-div.row, open new div.row-div.12-ul");
            			
            			$themesCollapsed .=			'</ul>';
            			$themesCollapsed .=		'</div>';
            			$themesCollapsed .=	'</div>';
            			$themesCollapsed .=	'<div class="row">';
            			$themesCollapsed .=		'<div class="twelve columns">';
            			$themesCollapsed .= 		'<ul class="block-grid two-up">';
            		}
            		
            		error_log("\n nrSections = " . $nrSections . " nrSections & 1 = " . ($nrSections & 1) );
            		// Even nr sections
            		
        			$colClass = '';
        	
        			if($key%2==1){
        				$themeTitle2	= html_escape($exhibitSection->title, $errors);
        				$themeImage2	= ve_get_theme_thumbnail($exhibitSection->slug, $exhibitSection->title ,$errors);
        				$themeLink2		= html_escape(exhibit_builder_exhibit_uri($exhibit, $exhibitSection));
        			}
        			else {
        				$themeTitle1	= html_escape($exhibitSection->title, $errors);
        				$themeImage1	= ve_get_theme_thumbnail($exhibitSection->slug, $exhibitSection->title ,$errors);
        				$themeLink1		= html_escape(exhibit_builder_exhibit_uri($exhibit, $exhibitSection));
        			}

            	}  

 
            	
            	// output here
            	
            	if($rowCount%2==1){
            		
					// expanded rows (desktop view)
					            		
            		$rowHTML = '';
            		$rowHTML .= '<div class="row theme-title-row-expanded">';
            		$rowHTML .= 	'<div class="six columns right-text">';
            		$rowHTML .= 		'<div class="theme-item-wrapper right-text">';
            		$rowHTML .= 			'<a href="'.$themeLink1.'" class="meta">';
            		$rowHTML .= 				'<h2>'.$themeTitle1.'</h2>';
            		$rowHTML .= 			'</a>';
            		$rowHTML .= 		'</div>';
            		
            		$rowHTML .= 		'<div class="theme-item-wrapper right-text">';
            		$rowHTML .= 			'<a href="'.$themeLink1.'">';
            		$rowHTML .= 				$themeImage1;
            		$rowHTML .= 				'<div class="theme-img-overlay"></div>';
            		$rowHTML .= 			'</a>';
            		$rowHTML .= 		'</div>';
            		$rowHTML .= 	'</div>';
            		
            		$rowHTML .= 	'<div class="six columns left-text">';
            		$rowHTML .= 		'<div class="theme-item-wrapper left-text">';
            		$rowHTML .= 			'<a href="'.$themeLink2.'">';
            		$rowHTML .= 				$themeImage2;
            		$rowHTML .= 				'<div class="theme-img-overlay"></div>';
            		$rowHTML .= 			'</a>';
            		$rowHTML .= 		'</div>';
            		
            		$rowHTML .= 		'<div class="theme-item-wrapper left-text">';
            		$rowHTML .= 			'<a href="'.$themeLink2.'" class="meta">';
            		$rowHTML .= 				'<h2>'.$themeTitle2.'</h2>';
            		$rowHTML .= 			'</a>';
            		$rowHTML .= 		'</div>';
            		$rowHTML .= 	'</div>';
            		$rowHTML .= '</div>';
            		
            		$themeHTML .= $rowHTML;
            	}
            	else if($rowCount == count($exhibit->Sections)){ // odd number themes - centre the last theme 
            		
            		$rowHTML = '';
            		$rowHTML .= '<div class="row theme-title-row-expanded">';
            		
            		$rowHTML .= 	'<div class="twelve columns">';
            		$rowHTML .= 		'<div class="theme-item-wrapper">';
            		$rowHTML .= 			'<a href="'.$themeLink1.'">';
            		$rowHTML .= 				$themeImage1;
            		$rowHTML .= 				'<div class="theme-img-overlay"></div>';
            		$rowHTML .= 			'</a>';
            		$rowHTML .= 		'</div>';
            		$rowHTML .= 	'</div>';
            		
            		$rowHTML .= 	'<div class="twelve columns">';
            		$rowHTML .= 		'<div class="theme-item-wrapper">';
            		$rowHTML .= 			'<a href="'.$themeLink1.'" class="meta">';
            		$rowHTML .= 				'<h2>'.$themeTitle1.'</h2>';
            		$rowHTML .= 			'</a>';
            		$rowHTML .= 		'</div>';
            		$rowHTML .= 	'</div>';
            		
            		$rowHTML .= '</div>';
            		
            		$themeHTML .= $rowHTML;
            		
           		
            	}
            }
            
            $themesCollapsed .= 		'</ul>';
            $themesCollapsed .= 	'</div>';
            $themesCollapsed .=	'</div>';
            
            
            echo '<div class="row">';
            echo 	'<div class="twelve columns">';
            echo 		$themeHTML;

            
            echo 		'<div class="theme-title-row-collapsed">';
            echo 			$themesCollapsed;
            echo 		'</div>';
            
            
            echo 	'</div>';
            echo '</div>';
            
            ?>
    

    <?php
try {
	
//	commenting_echo_comments();
//	commenting_echo_comment_form();
	
} catch (Exception $e) {
 //   echo('Error: ' . $e->getMessage());
}		
?>
    


<?php
function ve_get_theme_thumbnail($slug, $eTitle, $errors)
{
    $html = '';
    set_items_for_loop(get_items(array('tags' => $slug . '-theme')));

    if (has_items_for_loop()) {

        while (loop_items()) {
            if (item_square_thumbnail()) {
                $html .= item_square_thumbnail();
            }
        }
        return $html;
    }
    else {
        if(get_theme_option('display_admin_errors')){
         $errors[] = '<div class="error">There is no item file (image) associated with the Exhibit Section: <strong>' . $eTitle . '</strong>.<br/>'
                  . 'Tag an image used in this exhibit section with: <strong><em>' . $slug . '-theme</em></strong></div>';
        }

    }

}

?>

