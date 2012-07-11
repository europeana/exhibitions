<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$url=urlencode($url);
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>jquery-oembed link replace example</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    	<link rel="alternate" type="application/json+oembed"
    		href="<?php echo(WEB_ROOT); ?>/service/oembed/8?format=json&url=<?php echo($url); ?>;"
    		title="Andy's test title json" />
    	
    	<link rel="alternate" type="text/xml+oembed"
    		href="<?php echo(WEB_ROOT); ?>/service/oembed/8?format=json&url=<?php echo($url); ?>"
    		title="Andy's test title xml" />
    	
        <?php display_js(); ?>
</head>
<body>


<?php
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$url=urlencode($url);
?>
		
		
<br>
public/test/index
<br>

<br>
<script type="text/javascript">
        jQuery(document).ready(function(){
        	//alert(jQuery("a.oembed").oembed());
        	//jQuery("a.oembed").oembed();
        	//alert("done");
        	alert(jQuery("a.oembed").embedly);
        	jQuery("a.oembed").embedly();
        	alert("done");
        });
</script>

<div><a href="<?php echo(WEB_ROOT); ?>" class="oembed">Europeana</a></div>

<!--
<div><a href="http://www.flickr.com/photos/14516334@N00/345009210/" class="oembed">Flickr Image</a></div>
<div><a href="http://vimeo.com/3108686" class="oembed">Vimeo Video</a></div>
-->




	
</body>
</html>