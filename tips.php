<?php
function RandomTip() {
	$number = Rand(1,15);
	$tips = array (
	1 => "You can easily save your favourite generated color by just adding the website to favourites. (You can share the color as well).",
	2 => "Did you know we have a mobile version too?",
	3 => "Nevermind.",
	4 => "Oh my ... little pony, its a rainbow!",
	5 => "If you can't find the randomize button, it's right next to the color code at the bottom of the page.",
	6 => "Did you know that Martin's most favourite color is #ef21de?",
	7 => "Did you know that Yas hates color #ef21de?",
	8 => "We're terribly sorry, if you're colorblind. Maybe, we'll release a service for you sometime later.",
	9 => "Got a better idea for a tip than those we already have? Let us know at <a href='mailto:color@colorizer.eu'>color@colorizer.eu</a>.",
	10 => "Error 37.",
	11 => "All colors for Colorizer adverts were generated using Colorizer.",
	12 => "Share your favorite color on social sites.",
	13 => "No idea what color to pick? Colorizer will help you.",
	14 => "Ph'nglui mglw'nafh Cthulhu R'lyeh wgah'nagl fhtagn",
	15 => "[Your ad here]"
	);
	return ($tips[$number]); // Random generated number
}
?>

