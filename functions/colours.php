<?php
/*
    Main colorizer function
    @return array
 */
function colorizer()
{
    $hex_random_color = randomColor()['hex'];
    $color = [
        'get_color'     => null,
        'hex_color'     => $hex_random_color,
        'rgb_color'     => hex2rgb($hex_random_color)
    ];
    if(isset($_GET["color"])){$color['get_color'] = $_GET["color"];}
    // echo trim($color['get_color'], '#');
    $rgb_rule = preg_match('/(([0-9]{1},|[1-9]{1}[0-9]{1},|[1]{1}[0-9]{2},|[2]{1}[0-4]{1}[0-9]{1},|25[0-5]{1},){2}([0-9]{1}|[1-9]{1}[0-9]{1}|[1]{1}[0-9]{2}|[2]{1}[0-4]{1}[0-9]{1}|25[0-5]{1}){1})$/', $color['get_color']);
    $hex_rule = preg_match('/^[a-fA-F\d+]+$/', $color['get_color']);

    if(isset($color['get_color']) && $rgb_rule)
    {
        $hexColor = rgb2hex($color['get_color']);
        $color = [
            'hex_color'     => $hexColor,
            'rgb_color'     => $color['get_color'],
            'text_color' => contrastColor($hexColor)
        ];
        return $color;
    }
    elseif(isset($color['get_color']) && $hex_rule)
    {
        $rgbColor = hex2rgb($color['get_color']);
        $color = [
            'hex_color'     => $color['get_color'],
            'rgb_color'     => $rgbColor,
            'text_color' => contrastColor($color['get_color'])
        ];
        return $color;
    }
    elseif(isset($color['get_color']))
    {
    }
    else
    {
        $color['text_color'] = contrastColor($hex_random_color);
        return $color;
    }
}

/*
    Generate random colour
    @return array with two columns rgb and hex
 */
function randomColor()
{
    $colours = [
    'hex'     => '',
    'rgb'     => ''
    ];
    foreach(array('r', 'g', 'b') as $color){
        $val    = mt_rand(0,255);
        $colours['rgb'] .= ','.$val;
        $dechex = dechex($val);
        if(strlen($dechex) < 2)
        {
            $dechex = "0" . $dechex;
        }
        $colours['hex'] .= $dechex;
    }
    $colours['rgb'] = ltrim($colours['rgb'] , ',');
    return $colours;
}

/*
    Convert RGB colour code to HEX
    @return string
 */
function rgb2hex($rgb) {
    $rgb  = explode(',', $rgb);
    $hex  = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);
    return $hex;
}

/*
    Convert HEX colour code to RGB
    @return string
 */
function hex2rgb($hex) {
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb);
}

/*
    Returns brightness value from 0 to 255
    @return int
 */
function colorBrightness($hex) {
 $c_r = hexdec(substr($hex, 0, 2));
 $c_g = hexdec(substr($hex, 2, 2));
 $c_b = hexdec(substr($hex, 4, 2));
 return (($c_r * 299) + ($c_g * 587) + ($c_b * 114)) / 1000;
}

/*
    Return white or black color based on brightness of basic colour
    @return string
 */
function contrastColor($hex)
{
    if($hex <= 3)
    {
        $longHex =  $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        $brightness = colorBrightness($longHex);
    }
    else
    {
        $brightness = colorBrightness($hex);
    }
    if( $brightness > 130)
    {
        return '000000';
    }
    else
    {
        return 'ffffff';
    }
}


/* Complementary colours
function colorInverse($color){
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
*/