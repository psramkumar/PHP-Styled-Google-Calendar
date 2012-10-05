<?php



/**********************************************

CHANGE THESE VARIABLES

***********************************************/


//This is the URL of your Calendar. It's the 'src' attribute of the iFrame tag in the embed code that Google gives you.
//If you go to this URL, you can see the default styling of the calendar, which we're trying to change.
$my_calendar="https://www.google.com/calendar/embed?src=envql02v2rijr5doiku8mulu3o%40group.calendar.google.com&ctz=America/New_York";

//The location of our CSS file
$our_css_url = 'css/custom-calendar.css';




/**********************************************

YOU PROBABLY WON'T NEED TO CHANGE ANYTHING
BELOW THIS LINE

***********************************************/


//A constant. You don't need to modify this. It's where Google stores its calendar files.
$google_domain = 'https://www.google.com/calendar/';

//Creates the HTML file that we'll be displaying to our user
$dom = new DOMDocument;
//Puts the HTML from 
$dom->loadHTMLfile($my_calendar);

//Change Google's CSS file to use absolute URLs instead of relative ones
//Note: There is only one CSS file
$css = $dom->getElementsByTagName('link')->item(0);
$css_href = $css->getAttribute('href');
$css->setAttribute('href', $google_domain . $css_href);

//Changes the Javascript to use absolute URLs as well
$jss = $dom->getElementsByTagName('script');
foreach ($jss as $js) {
	$js_src = $js->getAttribute('src');
	if ($js_src) {
		$js->setAttribute('src',$google_domain . $js_src);
	}
}

//Adds a link to our own CSS file, so we can override the default CSS
$element = $dom->createElement('link');
$element->setAttribute('type', 'text/css');
$element->setAttribute('rel', 'stylesheet');
$element->setAttribute('href', $our_css_url);

//We put this element into the head of the page
$head = $dom->getElementsByTagName('head')->item(0);
$head->appendChild($element);

//Finally, we export the HTML
echo $dom->saveHTML();

//That's all, folks.

?>