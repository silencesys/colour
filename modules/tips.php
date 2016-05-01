<?php
function RandomTip() {
	$number = Rand(1,16);
	$tips = array (
	1 => "<b>Tip:</b> You can easily save your favourite generated color <br> by just adding the website to favourites.<br> (You can share the color as well).",
	2 => "<b>Tip:</b> Did you know we have a mobile version too?",
	3 => "<b>Tip:</b> Nevermind.",
	4 => "Oh my ... little pony, its a rainbow!",
	5 => "<b>Tip:</b> If you can't find the randomize button,<br> it's right next to the colour code<br> at the bottom of the page.",
	6 => "<b>Tip:</b> Did you know that Martin's most favourite colour is #ef21de?",
	7 => "<b>Tip:</b> Did you know that Yas hates colour #ef21de?",
	8 => "We're terribly sorry, if you're colourblind.<br> Maybe, we'll release a service for you sometime later.",
	9 => "<b>Tip:</b> Got a better idea for a tip than those we already have?<br> Let us know at colour[at]oculum.ink.",
	10 => "<b>Tip:</b> Error 37.",
	11 => "<b>Tip:</b> All colors for Colorizer adverts were generated using Colorizer.",
	12 => "<b>Tip:</b> Share your favorite colour on social networks.",
	13 => "<b>Tip:</b> No idea what colour to pick? Colorizer will help you.",
	14 => "<b>Tip:</b> Ph'nglui mglw'nafh Cthulhu R'lyeh wgah'nagl fhtagn",
	15 => "[Your ad here]",
	16 => "<b>Tip:</b> Did you know that red pandas do never fart?"
	);
	return ($tips[$number]); // Random generated number
}
?>

