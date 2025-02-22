<?php
/**
 * File: providers.php
 *
 * Purpose: Array of exhibit providers and their associated information
 *
 * Use:
 *
 * The providers array is associated with the 'Credits' field from the Exhibit administration page.
 * Make sure that the $providers[Exhibit Name Field] is identical to that of the
 * value in the 'Credits' field from the Exhibit administration page
 *
 * The $providers[Exhibit Name Field][Image Name Field] should contain the name+ext of an image found in
 * the image directory contained in the theme directory of the exhibits associated theme. The theme used
 * by the exhibit is set on the Exhibit Administration page
 *
 *
 */
	// commented out by dan entous 2012-04-12
	// error_log("ANDY: themes/main/custom ve providers 1 underscore");

$providers = array();

//$providers['Europeana']['url'] = 'http://www.europeana.eu/';
//$providers['Europeana']['logo'] = 'logo-europeana.png';
$providers['Europeana']['comments'] = false;
$providers['Europeana']['collection'] = 'Europeana';
$providers['Europeana']['exhibit'] = 'Art Nouveau';

$providers['Jewish Museum London']['url'] = 'http://www.jewishmuseum.org.uk/';
$providers['Jewish Museum London']['logo'] = 'logo-jewish-museum-london.png';
$providers['Jewish Museum London']['comments'] = false;
$providers['Jewish Museum London']['collection'] = 'Judaica';
$providers['Jewish Museum London']['exhibit'] = 'Yiddish Theatre in London';

$providers['Jewish Historical Museum']['url'] = 'http://www.jhm.nl/';
$providers['Jewish Historical Museum']['logo'] = 'logo-jewish-historical-museum.png';
$providers['Jewish Historical Museum']['comments'] = false;
$providers['Jewish Historical Museum']['collection'] = 'Judaica';
$providers['Jewish Historical Museum']['exhibit'] = 'From Dada to Surrealism';

$providers['mimo']['url'] = 'http://www.mimo-project.eu/';
$providers['mimo']['logo'] = 'logo-mimo.png';
$providers['mimo']['comments'] = false;
$providers['mimo']['collection'] = 'MIMO';
$providers['mimo']['exhibit'] ='Explore the World of Musical Instruments';

$providers['DISMARC']['url'] = 'http://www.dismarc.org/info/';
$providers['DISMARC']['logo'] = 'logo-dismarc.png';
$providers['DISMARC']['comments'] = false;
$providers['DISMARC']['collection'] = 'Europeana Connect';
$providers['DISMARC']['exhibit'] ='Weddings in Eastern Europe';

$providers['Europeana 1914-1918']['url'] = 'http://www.europeana1914-1918.eu/';
$providers['Europeana 1914-1918']['logo'] = 'logo-1418.png';
$providers['Europeana 1914-1918']['comments'] = false;
