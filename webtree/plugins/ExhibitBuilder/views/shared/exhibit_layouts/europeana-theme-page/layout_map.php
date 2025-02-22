<?php $_SESSION['themes_uri'] = str_replace("themes-map", "themes", uri()); ?>

<style type="text/css">

	/* Leaflet overrides */
	
	.leaflet-popup-content-wrapper{
		border-radius:	1em;
	}
	
	.leaflet-popup-content-wrapper h5{
		color: #1C1C1A;
	}
	.leaflet-container a.leaflet-popup-close-button{
		color:		#999;
		padding:	2px 2px 0 0;
	}
	
	.leaflet-popup-content{
		margin:	1em 1em;
		min-width:100px;
	}

	/* End leaflet overrides */

	#map-container{
		padding-bottom:	3em;
		position:		relative;
	}
	
	
	/* #map object default height & breakpoint heights need to be tracked by height for #overlay-ctrl  */
	
	#map{
		height:		28em;
		width:		100%;
	}
	
	/*  #overlay-ctrl{}  */
	
	.overlay-options{
		max-height:	15em;
		overflow-y:	auto;
	}

	.overlay-option,
	.overlay-label{
		line-height:	2.4em;
	}

	
	@media only screen and ( min-width:	35em ){
		#map{
			height:		34em;
		}
		
		.overlay-options{
			max-height:	21em;		/* increase max-height */
			overflow-y:	auto;
		}
	}
	
	@media only screen and ( min-width:	48em ){
		#map{
			height:		42em;
		}
		
		.overlay-options{
			max-height:	13em;		/* mini-map has appeared, so lessen max-height */
			overflow-y:	auto;
		}
		
	}
	
	@media only screen and ( min-width:	54em ){
		#map{
			height:		45em;
		}
		
		.overlay-options{
			max-height:	16em;		/* mini-map has appeared, so lessen max-height */
			overflow-y:	auto;
		}
		
	}
	
	
	@media only screen and ( min-width:	60em ){
		#map{
			height:		50em;
		}
		
		.overlay-options{
			max-height:	21em;		/* mini-map has appeared, so lessen max-height */
			overflow-y:	auto;
		}
		
	}
	
	
	
	
	
	.read-story-link{
		display:	block;
		
	}
	
	#europeana-ctrls{
		position:			absolute;
		top:				0;
		right:				0;
		padding:			1em;
		color:				#E3D6B6;
		
		z-index:			1000; /* ie9 */
	}
	
	#layer-ctrl span{
		background-color:	rgba(255, 255, 255, 0.8);
		border:				1px solid #888888;
		border-radius:		5px 5px 5px 5px;
		box-shadow:			0 0 8px rgba(0, 0, 0, 0.4);
		color:				#000;
		cursor:				pointer;
		float:				right;
		margin-left:		1em;
		padding:			0.5em;
	}
	
	#layer-ctrl a:focus{
		background-color:	#fff;
		box-shadow:			0 0 8px rgba(0, 0, 0, 0.8);
	}
	
	#layer-ctrl span.active{
		font-weight:		bold;
	}
		
	#overlay-ctrl{

		clear:				both;
		display:			none;
		float:				right;
		margin-top:			1em;
		padding:			0.5em 1em 1em 1em;
		position:			relative;
		

		background-color:	rgba(255, 255, 255, 0.8);
		border:				1px solid #888888;
		border-radius:		5px 5px 5px 5px;
		box-shadow:			0 0 8px rgba(0, 0, 0, 0.4);
		color:				#000;
		
		
	}

	#overlay-ctrl.active{
		display:			block;
	}
	
	#overlay-toggle{
		background-color:		rgba(255, 255, 255, 0.8);
		background-image:		url('<?php echo(WEB_ROOT); ?>/themes/main/javascripts/images/layers.png');
		border-radius:			5px 5px 5px 5px;
		border:					1px solid #888888;
		box-shadow:				0 0 8px rgba(0, 0, 0, 0.4);
		cursor:					pointer;
		float:					right;
		height:					2em;
		margin-top:				1em;
		padding:				3px;
		width:					2em;
		
		background-position:	3px 3px;
		background-repeat:		no-repeat;
	}
	
	.overlay-option,
	.overlay-label{
		display:		block;
		white-space:	nowrap;
		margin:			0.25em 0.25em 0.25em 0;
	}

	.overlay-option input,
	.overlay-option label{
		cursor:		pointer;
	}

	.overlay-label{
		margin-bottom:	0.5em;
		margin-right:	1em;
	}
	
	
	.slider-label,
	.slider-label-mobile{
		text-align:	center;
	}	
	
	.slider,
	.slider-label,
	.slider-mobile,
	.slider-label-mobile{
		margin:			1.5em 10% 1.5em 10%;
		width:			80%;
		border-width:	2px;
		display:		none;
	}
	
	.slider-label-mobile.active,
	.slider-mobile.active{
		display:		block;
	}
	
	.leaflet-control-minimap{
		display:		none;
	}
	
	#mobile-test{
		width:		0px;
		height:		0px;
		display:	block;
	}
	
	/* hide the pan that appears in the mini-map */
	
	.leaflet-control-minimap .leaflet-control-pan.leaflet-control{
		display:none;
	}
	
	/* hide the pan, zoom and layer controls on phones */
	
	.leaflet-control-pan{
		display:	none;
	}

	.leaflet-control-zoom{
		display:	none;
	}
	
	#layer-ctrl{
		display:	none;
	}
		



	@media only screen and ( min-width:	48em ){
	
		/* show controls */

		#layer-ctrl{
			display:	block;
		}
		
		.slider-label.active,
		.slider.active{
			display:	block;
		}
		
		.slider-label-mobile.active,
		.slider-mobile.active{
			display:	none;
		}
		
		.leaflet-control-minimap{
			display:	block;
		}
		
		#overlay-ctrl{		
			display:	block;
		}
		
		#overlay-toggle{		
			display:	none;
		}
	}
	
	@media only screen and ( min-width:	65em ){
	
		/* show pan & zoom controls on anything wider than an ipad (landscape orientation) */
	
		.leaflet-control-pan{
			display:	block;
		}
		
		.leaflet-control-pan a:focus,
		.leaflet-control-zoom a:focus{
			background-color:	#fff;
			box-shadow:			0 0 8px rgba(0, 0, 0, 0.8);
		}

		.leaflet-control-zoom{
			display:	block;
		}

		.overlay-option,
		.overlay-label{
			line-height:	1.48em;
		}
		
	}
</style>
	

	
<!--[if IE 8]>
<style type="text/css">

		#layer-ctrl span,
		#overlay-ctrl,
		#overlay-toggle,
		.leaflet-control-pan a,
		.leaflet-control-zoom-in,
		.leaflet-control-zoom-out  {
			background-color:none;
			-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#CCFFFFFF,endColorstr=#CCFFFFFF);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#CCFFFFFF,endColorstr=#CCFFFFFF);
			zoom: 1;		
		}


		/* copied */

		#map{
			height:		50em;
		}
		
		.overlay-options{
			max-height:	21em;		/* mini-map has appeared, so lessen max-height */
			overflow-y:	auto;
		}
		
		/* show controls */

		#layer-ctrl{
			display:	block;
		}
		
		.slider-label.active,
		.slider.active{
			display:	block;
		}
		
		.slider-label-mobile.active,
		.slider-mobile.active{
			display:	none;
		}
		
		.leaflet-control-minimap{
			display:	block;
		}
		
		#overlay-ctrl{		
			display:	block;
		}
		
		#overlay-toggle{		
			display:	none;
		}

	.leaflet-control-pan{
		display:	block;
	}
	
	.leaflet-control-pan a:focus,
	.leaflet-control-zoom a:focus{
		background-color:	#fff;
		box-shadow:			0 0 8px rgba(0, 0, 0, 0.8);
	}

	.leaflet-control-zoom{
		display:	block;
	}

	.overlay-option,
	.overlay-label{
		line-height:	1.48em;
	}
	
	
	
</style>
<![endif]-->
	

<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/themes/main/javascripts/Leaflet.markercluster-master/dist/MarkerCluster.css" />
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/themes/main/javascripts/Leaflet.markercluster-master/dist/MarkerCluster.Default.css" />
<!--[if lte IE 8]>
	<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/themes/main/javascripts/Leaflet.markercluster-master/dist/MarkerCluster.Default.ie.css" />
<![endif]-->


<div class="row">

	<div id="map-container">
		<div id="map"></div>
	</div>

	<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/themes/main/javascripts/leaflet-plugins-master/layer/tile/Google.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/themes/main/javascripts/Leaflet.markercluster-master/dist/leaflet.markercluster.js"></script>
	    
	<script type="text/javascript">

		<?php  
			if (!$exhibit) {
				if (!($exhibit = exhibit_builder_get_current_exhibit())) {
					return;
				}
			}
		
			/*
			 * Get map data, starting with the basic latitude and longitude
			 * 
			 *  - (for Rome this is  41.89007, 12.49188)
			 * 
			 * */
			
			$map = exhibit_map_data($exhibit);
			
			echo('var mapOverlayLabel		= "' . ve_translate("view-historical-map", "") . '";' . PHP_EOL);
			echo('var mapStoryLinkLabel		= "' . ve_translate("read-story", "") . '";' . PHP_EOL);
			echo('var mapTransparencyLabel	= "' . ve_translate("control-transparency", "") . '";' . PHP_EOL);
			
			echo('var mapLatitude		= ' . $map->lat . ';' . PHP_EOL);
			echo('var mapLongitude		= ' . $map->lon . ';' . PHP_EOL);
			echo('var mapZoom			= ' . $map->zoomlevel . ';' . PHP_EOL);
			
			/* 
			 * Get overlay data from item metadata & write to json object:
			 * 
			 * See new meta fields:
			 * 		NW Latitude			(41.914)
			 * 		NW Longitude		(12.447)
			 * 		SE Latitude			(41.874)
			 * 		SE Longitude		(12.5135)
			 * 
			 * Note: map items have to be public or the map won't show!
			 * 
			 */
			
			echo('var mapOverlays = [];' . PHP_EOL);
			
			$items = get_items( array( 'tags' =>  ve_get_exhibit_name_from_slug($exhibit)), 0 );
			set_items_for_loop( $items );
			
			while(loop_items()){
				$current	= get_current_item();
				
				$title		= item('Dublin Core', 'Title', null, $current);
				$nwLat		= getItemTypeMetadataEntry($current, "NW Latitude");
				$nwLon		= getItemTypeMetadataEntry($current, "NW Longitude");
				$seLat		= getItemTypeMetadataEntry($current, "SE Latitude");
				$seLon		= getItemTypeMetadataEntry($current, "SE Longitude");
				
				if( strlen($nwLat) > 0 && strlen($nwLon) > 0 && strlen($seLat) > 0 && strlen($seLon) > 0){
					if( count($current->Files) > 0){
						$uri = str_replace("/fullsize/", "/files/", file_display_uri($current->Files[0]));
						echo('mapOverlays[mapOverlays.length] = {"title":"' . $title .  '",  "nwLat":"' . $nwLat . '", "nwLon":"' . $nwLon . '", "seLat":"' . $seLat . '", "seLon":"' . $seLon . '", "uri":"' . $uri . '"};' . PHP_EOL);
					}
				}
			}
			
			
			/*
			 *	Get marker data from story_points database table
			 * 
			 */
			
			echo('var markers = [];' . PHP_EOL);
			
			foreach($map -> getStoryPoints() as $storyPoint) {
				echo('markers[markers.length] = {"lat": "' . $storyPoint->lat . '", "lon": "' . $storyPoint->lon . '", "pageId":"' . $storyPoint->page_id . '", "hash":"' . $storyPoint->hash . '"}; ' . PHP_EOL);
			}
		?>
		
		jQuery.holdReady(true);
		
		jQuery.getScript('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', function() {
			jQuery.getScript('<?php echo WEB_ROOT; ?>/themes/main/javascripts/jquery-ui-touch-punch.min.js', function() {
				jQuery.holdReady(false);
			});
		});

		jQuery.holdReady(true);
	
		jQuery.getScript('<?php echo (WEB_ROOT . '/themes/main/javascripts/jquery.imagesloaded.min.js'); ?>', function() {
			jQuery.holdReady(false);
		});
	
	
		jQuery(document).ready(function(){
			var mqTilesAttr = 'Tiles &copy; <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png" />';

			// map quest
			var mq = new L.TileLayer(
				'http://otile{s}.mqcdn.com/tiles/1.0.0/{type}/{z}/{x}/{y}.png',
				{
					minZoom: 4,
					maxZoom: 18,
					attribution: mqTilesAttr,
					subdomains: '1234',
					type: 'osm'
				}
			);
				
			var map = L.map('map', {
			    center: new L.LatLng(mapLatitude, mapLongitude),
			    zoomControl: false,
			    zoom: mapZoom
			});

			
			var europeanaCtrls = jQuery('<div id="europeana-ctrls">').prependTo('#map-container');

			
			var EuropeanaLayerControl = function(map, ops){

				var self = this;
				
				self.ops = ops;
				self.map = map;
				self.grp = null;
				 
				self._setLayer = function(index){
					var layer = self.ops[index].layer;
					self.grp.clearLayers();
					self.grp.addLayer(layer);

					jQuery(self.cmp.find("span")).removeClass('active');
					jQuery(self.cmp.find("span").get(index)).addClass('active');
				};

				var html	= '';
				var layers	= [];
				
				jQuery.each(self.ops, function(i, ob){
					html += '<a href="#' + ob.title + '"><span class="' + i + '">' + ob.title + '</span></a>';
					layers[layers.length] = ob.layer;
				});

				
				self.cmp = jQuery('<div id="layer-ctrl">' + html + '</div>');

				self.cmp.find("span").each(function(){
					jQuery(this).click(function(){
						self._setLayer(parseInt(jQuery(this).attr('class')));
					});
				});

				self.grp = L.layerGroup(layers);
				self.grp.addTo(self.map);
				self._setLayer(0);

				
				return {
					getCmp : function(index){
						return self.cmp;
					} 
				}
			};

			var ggl = new L.Google();
			map.addLayer(ggl);
			
			var ctrlLayer = new EuropeanaLayerControl(map,
				[
					{
					    "title":	"Map",
					    "layer":	mq
				    },
				    {
					    "title":	"Satellite",
					    "layer":	ggl
				    }
			    ]		 
			);
			
			europeanaCtrls.append(ctrlLayer.getCmp());
			
			
			// Overview map - requires duplicate layer
			//var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
			new L.Control.MiniMap(
				new L.TileLayer(
					'http://otile{s}.mqcdn.com/tiles/1.0.0/{type}/{z}/{x}/{y}.png',
					{
						minZoom: 0,
						maxZoom: 13,
						attribution: mqTilesAttr,
						subdomains: '1234',
						type: 'osm'
					}),
				{toggleDisplay: true }
			).addTo(map);

			L.control.zoom().addTo(map);
			
			
			
			<?php if (current_user()): ?>	// coordinates utility
			
				var adminMarker = null;
				
				function onMapClick(e) {
					
					if(adminMarker){
						map.removeLayer(adminMarker);
					}
						
					var popup = new L.popup();
								
					var content = ''
					+ 	'<span style="color:black;">Clicked on coordinate:<br/>&nbsp;&nbsp;' + e.latlng.lat + ' / ' + e.latlng.lng
					+	'<br/>'
					+	'<br/>'
					+	'Image url:'
					+	'<br/>'
					+	'<input id="imgPath" style="width:100%;" />'
					+	'<br/>'
					+	'<br/>'
					+	'<button id="imgCalc" style="display:block; margin:auto;">load image...</button>';
				
				    popup.setLatLng(e.latlng).setContent(content);
					popup = map.openPopup(popup);
				        
					jQuery('#imgCalc').click(function(){
					
						var path = jQuery("#imgPath").val();
						
						if(path.length==0){
							return;
						}
						
						map.closePopup();

						// end popup 1
						
						adminMarker = L.marker(
							[
								parseFloat(e.latlng.lat)
									,
								parseFloat(e.latlng.lng)
							],
							{
								draggable:true
							}
						);
						
						
						var origCloseFn = adminMarker.closePopup;
						var img		= null;
						var imgW	= null;
						var imgH	= null;
						
						adminMarker.closePopup = function(){return this;}
						
						adminMarker.on('dragstart', function(){
							img = jQuery('#imgHelp');
							imgW =  img.width();
							imgH =	img.height();
							jQuery(img).resizable('destroy');
							setupImgPopup(imgW, imgH);
						});
						
						
						adminMarker.on('dragend', function(){
							setupImgPopup(imgW, imgH);
							fitBubble(img);
						});

						
						adminMarker.addTo(map);
						
						var fitBubble = function(img){
							img.closest('.leaflet-popup-content').width(img.width() + 'px');
							img.closest('.leaflet-popup-content').height(img.height() + 'px');
							var popupDiv = img.closest('.leaflet-popup');
							popupDiv.css('left', '-' + popupDiv.width()/2 + 'px');
						}
						
						var reduceDim = function(w, h){
						
							var maxW	= jQuery('#map-container').width() * 0.75;
							var res		= {"w": w ? w : '', "h": h ? h : ''};
							 
							if(w > maxW){
								var ratio = maxW / w;
								res.w = maxW;
								res.h = h * ratio; 
							}
							console.log(JSON.stringify(res));
							return res;
						};
						
						var setupImgPopup = function(w, h){
						
							var reduced = reduceDim(w, h);
							w = reduced.w;
							h = reduced.h;
						
							adminMarker.bindPopup('<img id="imgHelp" src="' + path + '" style="width:' + w + 'px; height:' + h + 'px;">');
							
							adminMarker.openPopup();
							img = jQuery('#imgHelp');
							img.closest('.leaflet-popup-content').css('margin', '0');
							img.imagesLoaded(function($images, $proper, $broken){
								img.resizable({ 
									aspectRatio: true,
									stop: function( event, ui ) {
										fitBubble(img);
									}
								});
								img.click(function(){
								
									var info = '';
									
									
									var p = map.latLngToContainerPoint(adminMarker.getLatLng());
									
									var x = p.x;
									var y = p.y;
									
									y -= 48;
									y -= img.height();
									x -= img.width()/2;
									
									var nw = map.containerPointToLatLng(new L.Point(x, y));
									var se = map.containerPointToLatLng(new L.Point(x + img.width(), y + img.height() ));
									
									info += nw.lat + "\n/\n" + nw.lng + "\n\n" + se.lat + "\n/\n" + se.lng;
								
									alert(info);
								});
							});
							if(w && h){
								img.width(w	+ "px");
								img.height(h	+ "px");
							}
						}
						
						
						jQuery('<img src="' + path + '">').appendTo( jQuery('body') ).imagesLoaded(function(){
							var $this = jQuery(this);
							if($this.width()){
								setupImgPopup($this.width(), $this.height());
							}
							$this.remove();
						});
						
						
					});
				}
				map.on('click', onMapClick);
				
				
			<?php endif; ?>  	// end of coordinates utility

			
			// Overlay control
			
			
			var EuropeanaOverlayControl = function(map, selector){
				var self = this;

				self.defaultOpacity	= 80;
				self.map			= map;				
				self.addedOverlays	= {};
				
				self.activeOverlay	= null;

				var overlayControl	= jQuery('<div id="overlay-ctrl">')											.appendTo(selector);
				var overlayToggle	= jQuery('<div id="overlay-toggle">')										.appendTo(selector);
				var sliderDiv		= jQuery('<div class="slider">')											.appendTo(overlayControl);
				var sliderLabel		= jQuery('<div class="slider-label">' + mapTransparencyLabel + '</div>')	.appendTo(overlayControl);

				var sliderDivMobile		= jQuery('<div class="slider-mobile">');
				var sliderLabelMobile	= jQuery('<div class="slider-label-mobile">' + mapTransparencyLabel + '</div>');
				jQuery(self.map.getContainer()).after(sliderLabelMobile);
				jQuery(self.map.getContainer()).after(sliderDivMobile);

				
				overlayToggle.click(function(){
					jQuery(this).toggleClass('active');
					if(jQuery(this).hasClass('active')){
						overlayControl.addClass('active');
					}
					else{
						overlayControl.removeClass('active');
					}
				});
				
				
				self.sliderDiv = sliderDiv.slider({
		            value: 100,
		            slide: function(e, ui) {
		            	self.activeOverlay.setOpacity(ui.value / 100);
		            }
		        });
		        
				self.sliderDivMobile = sliderDivMobile.slider({
		            value: 100,
		            slide: function(e, ui) {
		            	self.activeOverlay.setOpacity(ui.value / 100);
		            }
		        });

				self.setActiveOverlay = function(){

					jQuery.each(self.addedOverlays, function(i, ob){  // clear all overlays
						ob.setOpacity(0);
					})
					
					var index		= parseInt( this.id.replace(/\D/g,'') );
					
					if(isNaN(index)){
						self.sliderDiv			.removeClass('active');
						self.sliderDivMobile	.removeClass('active');
						sliderLabel				.removeClass('active');
						sliderLabelMobile		.removeClass('active');
					}
					else{
						var ob = null;	// restore or set new overlay
						
						if(self.addedOverlays["" + index]){
							ob = self.addedOverlays["" + index];
						}
						else{
							ob = mapOverlays[index];

							var zoom = ob.zoom;
							var bounds = [[ob.nwLat, ob.nwLon], [ob.seLat, ob.seLon]];

							ob = L.imageOverlay(ob.uri, bounds).addTo(self.map);
							ob.europeana = {
								"bounds" : new L.Bounds(bounds)
							}
							self.addedOverlays["" + index] = ob;
						}

						if(ob != null){
							ob.setOpacity(self.defaultOpacity/100);
							self.activeOverlay = ob;

							// force animation by using "panBy" then fit to bounds after delay
							
							var bounds = ob.europeana.bounds;	
							var centre = bounds.getCenter();
							var mapCentre = map.getBounds().getCenter();
					
							var p		= map.latLngToContainerPoint([centre.x, centre.y]);
							var mapP	= map.latLngToContainerPoint(mapCentre);
							var tgtP	= [p.x-mapP.x, p.y-mapP.y];
					
							map.panBy(tgtP);

							var nw = bounds.min,
								se = bounds.max;

							setTimeout(function(){
									map.fitBounds([[nw.x , nw.y ],[se.x , se.y ]]);
								},
								400
							);

							/*
							
							// straight forward fit bounds
							 
							var nw = ob.europeana.bounds.min,
								se = ob.europeana.bounds.max;
							map.fitBounds([[nw.x , nw.y ],[se.x , se.y ]]);
							
							*/
						}
						
						jQuery(this).parent().after(sliderLabel);
						jQuery(this).parent().after(self.sliderDiv);

						
						self.sliderDiv.slider		('value', self.defaultOpacity);		// reposition the slider
						self.sliderDivMobile.slider	('value', self.defaultOpacity);		// reposition the slider
						
						self.sliderDiv.addClass('active');
						self.sliderDivMobile.addClass('active');
						sliderLabel.addClass('active');
						sliderLabelMobile.addClass('active');
					}
				};

				function sortByTitle(a, b){
					var aTitle = a.title.toLowerCase();
					var bTitle = b.title.toLowerCase(); 
					return ((aTitle < bTitle) ? -1 : ((aTitle > bTitle) ? 1 : 0));
				}
				
				if(mapOverlays.length > 0){
				
					self.mapOverlays = mapOverlays.sort(sortByTitle);
					
					jQuery('<span class="overlay-label">' + mapOverlayLabel + '</span><div class="overlay-option"><input id="rd" name="overlay" type="radio" checked="checked"/><label for="rd">None</label></div>').appendTo(overlayControl);
	
					
					var optionHtml = '<div class="overlay-options">';
					jQuery.each(mapOverlays, function(i, ob){
						optionHtml += '<div class="overlay-option"><input id="rd' + i + '" name="overlay" type="radio"/><label for="rd' + i + '">' + ob.title + '</label></div>';
					});
					optionHtml += '</div>';
					jQuery(optionHtml).appendTo(overlayControl);
	
					jQuery('input[type="radio"]').bind('click', self.setActiveOverlay);
				}
				else{
					overlayControl.hide();
					jQuery('#overlay-toggle').hide();
				}
			}

			
			new EuropeanaOverlayControl(map, europeanaCtrls);


			var openMarkerId;
			var openMarker;
			if(window.location.href.indexOf('#')>0){
				openMarkerId =  window.location.href.substring(window.location.href.indexOf('#')+1, window.location.href.length);
			}
			
			// Markers
			
			var markerGroup = new L.MarkerClusterGroup({
				spiderfyOnMaxZoom:		false,
				showCoverageOnHover:	false,
				zoomToBoundsOnClick:	false,
				maxClusterRadius:		20
			});

			markerGroup.on('clusterclick', function (a) {
				a.layer.spiderfy();
			});
			
			jQuery.each(markers, function(i, ob){

				var marker = L.marker(
						[
							parseFloat(ob.lat)
								,
							parseFloat(ob.lon)
						]
				);

				markerGroup.addLayer(marker);
				
				if(ob.hash == openMarkerId){
					openMarker = marker;
				}
				
				
	    		marker.bindPopup('<div></div>');
				marker.on('click', function(e){

					document.location.hash = ob.hash;
				
					jQuery.ajax({
						url:		"<?php echo(WEB_ROOT); ?>/eumap/map/test?pageId=" + ob.pageId,
						dataType:	"json"
						}).done(function ( data ) {
							marker._popup.setContent(
										'<a href="' + data.url + '#' + ob.hash + '">'
									+		'<h5>' + data.title + '</h5>'
									+	'</a>'
									+	'<a href="' + data.url + '#' + ob.hash + '">'
									+		'<img style="width:100px;min-width:100px;height:100px;min-height:100px;" src="' + data.imgUrl + '"/>'
									+	'</a>'
									+	'<a href="' + data.url + '#' + ob.hash + '" class="read-story-link">'
									+		mapStoryLinkLabel
									+	'</a>'
							);

						});
						
				});
			});

			map.addLayer(markerGroup);
			
			if(openMarker){
			
			    jQuery('html, body').animate({
                	scrollTop: jQuery("#map").offset().top
           		}, 1200,
           		
           			function(){
           				openMarker.fire('click');
						markerGroup.zoomToShowLayer(openMarker, function(){ openMarker.fire('click'); });
           			
           			}
           		
           		);
			
			}
			
		});
	
	</script>
	
</div>
	
<!-- leave row open for footer to close -->