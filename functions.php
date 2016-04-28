<?php

// Print random colour
function printRandomColour()
{
    printf("%06x",rand(0,16777215));
}

function generateRandomColor(){ // fce pro generováí náhodného HEX kódu, generuje i s #
    $randomcolor = '#' . strtoupper(dechex(rand(0,10000000)));
    if (strlen($randomcolor) != 7){
        $randomcolor = str_pad($randomcolor, 10, '0', STR_PAD_RIGHT);
        $randomcolor = substr($randomcolor,0,7);
    }
return $randomcolor;
}

// funkce pro rozlišení barvy zdali se jedná o RGB nebo HEX
function RGBorHex() {
    global $hexRGB;
	// zjištění, zdali je definovana proměnna v adrese
	if (isset($_GET["color"])) {
		 $color = $_GET["color"];
		 // ověření zdali je validní RGB kod
		 if(strlen($color) <=11 && preg_match('/(([0-9]{1},|[1-9]{1}[0-9]{1},|[1]{1}[0-9]{2},|[2]{1}[0-4]{1}[0-9]{1},|25[0-5]{1},){2}([0-9]{1}|[1-9]{1}[0-9]{1}|[1]{1}[0-9]{2}|[2]{1}[0-4]{1}[0-9]{1}|25[0-5]{1}){1})$/', $color)) {
		 	// vytištění RGB ve formátu rgb(barva)
            $myColours = [
                'mycolor'  => "rgb(".$color.")",
                'HEXcolor' => rgb2hex($color)
            ];
			return $myColours;
		}
		// ověření zdali je validní zápis HEX
		elseif (preg_match('/^[a-fA-F\d+]+$/', $color) && strlen($color) == 3 || preg_match('/^[a-fA-F\d+]+$/', $color) && strlen($color) == 6 ) {
			// vytištění HEX ve formátu #barva
            $myColours = [
                'mycolor'  => "#".$color,
                'HEXcolor' => $color
            ];
            return $myColours;
		}
		// pokud obě metody selžou vrátí hlášku
		else {
			return "Wrong format";
		}
	}
	// pokud není definovaná proměnná v adrese
	else {
        $myColours = [
                'mycolor'  => generateRandomColor(),
                'HEXcolor' => generateRandomColor()
            ];
		return $myColours;
	}
}



function rgb2hex($rgb) {
   $hex = "#";
   $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

   return $hex; // returns the hex value including the number sign (#)
}


function color_inverse($color){
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6){ return '000000'; }
    $rgb = '';
    for ($x=0;$x<3;$x++){
        $c = 255 - hexdec(substr($color,(2*$x),2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
    }
    return '#'.$rgb;
}

function getContrastYIQ($hexcolor){
    $r = hexdec(substr($hexcolor,0,2));
    $g = hexdec(substr($hexcolor,2,2));
    $b = hexdec(substr($hexcolor,4,2));
    $yiq = (($r*299)+($g*587)+($b*114))/1000;
    return ($yiq >= 128) ? 'black' : 'white';
}

// odebrání od barevného kodu nezadoucích znaků jako je např. RGB() nebo # pro odkazy socialních sítí.
function ClearChar($d) {
	// kontroluje zdali je vstupní string delší než 8 znaků (použije se uprava pro RGB
	if (strlen($d) > 8) {
		return preg_replace('/[^0-9,_ %\[\]\.%&-]/s', '', $d);
	}
	// pokud je string kratší než 8 znaků, použije se defaultní HEX cleaner
	else {
		return preg_replace('/[^a-fA-F0-9,_ %\[\]\.%&-]/s', '', $d);
	}
	;
}