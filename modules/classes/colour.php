<?php
/*
 * @author  : Martin Rocek
 * @info    : https://gitlab.com/Silencesys/colour
 * @license : Licensed under MIT licence https://gitlab.com/Silencesys/colour/blob/master/LICENSE.md
 *
 */
namespace OculumINK;
/*
 * A Colour utility that generates random HEX, RGB and HSL colours.
 */
class Colour {

    private $colour = [
        'my_colour'     => null,
        'hex'           => null,
        'rgb'           => null,
        'hsl'           => null,
        'text'          => null,
        'complementary' => null,
        'error_code'    => null
    ];
    /**
     *
     * Convert RGB to HEX
     * @param  array $rgb
     * @return string HEX colour
     *
     */
    public static function rgbToHex($rgb)
    {
        $hex  = str_pad(dechex($rgb['R']), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb['G']), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb['B']), 2, "0", STR_PAD_LEFT);
        return $hex;
    }
    /**
     *
     * Convert HEX to RGB colour
     * @param  string $hex
     * @return array RGB as array
     *
     */
    public static function hexToRgb($hex) {
        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = [
            'R' => $r,
            'G' => $g,
            'B' => $b
        ];
        return $rgb;
    }
    /**
     *
     * Convert HEX to HSL
     * @param  string $colour
     * @return array HSL colours as array
     *
     */
    public static function hexToHsl($colour)
    {
        // Convert HEX to DEC
        if(strlen($colour) == 3) {
            $R = hexdec(substr($colour,0,1).substr($colour,0,1));
            $G = hexdec(substr($colour,1,1).substr($colour,1,1));
            $B = hexdec(substr($colour,2,1).substr($colour,2,1));
        } else {
            $R = hexdec(substr($colour,0,2));
            $G = hexdec(substr($colour,2,2));
            $B = hexdec(substr($colour,4,2));
        }
        $HSL = array();
        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);
        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;
        $L = ($var_Max + $var_Min)/2;
        if ($del_Max == 0)
        {
            $H = 0;
            $S = 0;
        }
        else
        {
            if ( $L < 0.5 ) $S = $del_Max / ( $var_Max + $var_Min );
            else            $S = $del_Max / ( 2 - $var_Max - $var_Min );
            $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            if      ($var_R == $var_Max) $H = $del_B - $del_G;
            else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
            else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;
            if ($H<0) $H++;
            if ($H>1) $H--;
        }
        $HSL['H'] = round($H * 360);
        $HSL['S'] = round($S, 2);
        $HSL['L'] = round($L, 2);
        return $HSL;
    }
    /**
     *
     * Convert HSL colour to RGB
     * @param  array $hsl colours
     * @return array      Converted HSL colours to RGB
     *
     */
    public static function hslToRgb($hsl){

        $h = $hsl['H'];
        $s = $hsl['S'];
        $l = $hsl['L'];

        $r;
        $g;
        $b;
        $c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
        $x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
        if ( $h < 60 ) {
            $r = $c;
            $g = $x;
            $b = 0;
        } else if ( $h < 120 ) {
            $r = $x;
            $g = $c;
            $b = 0;
        } else if ( $h < 180 ) {
            $r = 0;
            $g = $c;
            $b = $x;
        } else if ( $h < 240 ) {
            $r = 0;
            $g = $x;
            $b = $c;
        } else if ( $h < 300 ) {
            $r = $x;
            $g = 0;
            $b = $c;
        } else {
            $r = $c;
            $g = 0;
            $b = $x;
        }
        $m = $l - ( $c / 2 );
        $r = ( $r + $m ) * 255;
        $g = ( $g + $m ) * 255;
        $b = ( $b + $m  ) * 255;

        $rgb = [
            'R' => floor( $r ),
            'G' => floor( $g ),
            'B' => floor( $b )
        ];
        return $rgb;
    }
    /**
     *
     * Calculate colour brightness
     * @param  string $hex
     * @return float Colour brightness
     *
     */
    public static function colourBrightness($hex) {
        $c_r = hexdec(substr($hex, 0, 2));
        $c_g = hexdec(substr($hex, 2, 2));
        $c_b = hexdec(substr($hex, 4, 2));

        $brightness = (($c_r * 299) + ($c_g * 587) + ($c_b * 114)) / 1000;
        return $brightness;
    }
    /**
     *
     * Returns the complimentary color
     * @return string Complementary RGB color
     *
     */
    public static function complementary($hsl) {
        // Adjust Hue 180 degrees
        $hsl['H'] += ($hsl['H']>180) ? -180 : 180;
        $hsl['L'] = 1 - $hsl['L'];
        // return RGB
        return $hsl;
    }
    /**
     *
     * Generate random colour in RGB and then convert to HEX and HSB
     * @return array with HEX, RGB and HSB format
     *
     */
    public static function randomColour()
    {
        $random = [
            'rgb' => null,
            'hex' => null,
            'hsl' => null
        ];
        foreach(array('R', 'G', 'B') as $colour=>$key){
        $val    = mt_rand(0,255);
        $random['rgb'][$key] = $val;
        $dechex = dechex($val);
        if(strlen($dechex) < 2)
        {
            $dechex = "0" . $dechex;
        }
        $random['hex'] .= $dechex;
        }
        $random['hsl'] = self::hexToHsl($random['hex']);

        return $random;
    }
    /**
     *
     * Main colour function
     * @param  string $myColour colour code (rgb or hex)
     * @todo   add support for HSL colour formats and delete unnecessary code
     * @return array            complete APP response
     *
     */
    public static function colour($myColour = null)
    {
        $rgb_rule = false;
        $hsl_rule = false;
        $hex_rule = false;

        // Define defaults
        $random        = self::randomColour();
        $my_colour     = 'C00';
        $main_hex      = $random['hex'];
        $main_rgb      = $random['rgb'];
        $main_hsl      = $random['hsl'];
        $main_text     = self::contrast($main_hex);
        $comp_hsl      = self::complementary($main_hsl);
        $comp_rgb      = self::hslToRgb($comp_hsl);
        $comp_hex      = self::rgbToHex($comp_rgb);
        $error_code    = 'C00'; // NOTHING SPECIFIED

        if(isset($myColour))
        {
            $myColour = str_replace(['#', '(', ')'], '', $myColour);

            // validate and replace unwanted characters
            if(strpos($myColour, 'rgb') !== false && strlen($myColour) >= 6)
            {
                $myColour = str_replace(['rgb'], '', $myColour);
                if(strpos($myColour, ',') !== false)
                {
                    $myColour = explode(',', $myColour);
                }
                elseif(strpos($myColour, '.') !== false)
                {
                    $myColour = explode('.', $myColour);
                }
                else
                {
                    $length  = strlen($myColour);
                    $split = $length / 3;
                    $myColour = str_split($myColour, $split);
                }
                $myColour = [
                    'R' => $myColour['0'],
                    'G' => $myColour['1'],
                    'B' => $myColour['2'],
                ];
                $rgb_rule = true;
            }
            elseif(strpos($myColour, 'hsl') !== false && strlen($myColour) >= 6)
            {
                $myColour = str_replace(['hsl'], '', $myColour);
                if(strpos($myColour, ',') !== false)
                {
                    $myColour = explode(',', $myColour);
                }
                elseif(strpos($myColour, '.') !== false)
                {
                    $myColour = explode('.', $myColour);
                }
                else
                {
                    $length  = strlen($myColour);
                    $split = $length / 3;
                    $myColour = str_split($myColour, $split);
                }
                $myColour = [
                    'H' => $myColour['0'],
                    'S' => $myColour['1'] / 100,
                    'L' => $myColour['2'] / 100,
                ];
                $hsl_rule = true;
            }
            else
            {
                $hex_rule = preg_match('/^[a-fA-F\d+]+$/', $myColour);
            }
            if($rgb_rule)
            {
                $my_colour     = $myColour;
                $main_hex      = self::rgbToHex($myColour);
                $main_rgb      = $myColour;
                $main_hsl      = self::hexToHsl($main_hex);
                $main_text     = self::contrast($main_hex);
                $comp_hsl      = self::complementary($main_hsl);
                $comp_rgb      = self::hslToRgb($comp_hsl);
                $comp_hex      = self::rgbToHex($comp_rgb);
                $error_code    = 'C01'; // NONE
            }
            elseif($hex_rule)
            {
                $my_colour     = $myColour;
                $main_hex      = $myColour;
                $main_rgb      = self::hexToRgb($myColour);
                $main_hsl      = self::hexToHsl($myColour);
                $main_text     = self::contrast($myColour);
                $comp_hsl      = self::complementary($main_hsl);
                $comp_rgb      = self::hslToRgb($comp_hsl);
                $comp_hex      = self::rgbToHex($comp_rgb);
                $error_code    = 'C01'; // NONE
            }
            elseif($hsl_rule)
            {
                $my_colour     = $myColour;
                $main_hsl      = $myColour;
                $main_rgb      = self::hslToRgb($main_hsl);
                $main_hex      = self::rgbToHex($main_rgb);
                $main_text     = self::contrast($main_hex);
                $comp_hsl      = self::complementary($myColour);
                $comp_rgb      = self::hslToRgb($comp_hsl);
                $comp_hex      = self::rgbToHex($comp_rgb);
                $error_code    = 'C01'; // NONE

            }
            elseif($myColour == 'random' || $myColour == 'Random')
            {
                $my_colour     = 'C02'; // Random colour
                $error_code    = 'C02'; // RANDOM
            }
            else
            {
                $my_colour     = 'C03'; // Wrong format
                $error_code    = 'C03'; // WRONG FORMAT
            }
        }
        // return!
        return $colour = [
            'my_colour'  => $my_colour,
            'main_hex'   => $main_hex,
            'main_rgb'   => $main_rgb,
            'main_hsl'   => $main_hsl,
            'main_text'  => $main_text,
            'comp_hex'   => $comp_hex,
            'comp_rgb'   => $comp_rgb,
            'comp_hsl'   => $comp_hsl,
            'comp_text'  => self::contrast($comp_hex),
            'error_code' => $error_code
        ];
    }

    /* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

     PRIVATE FUNCTIONS

    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

    /**
     *
     * Select basic contrast colour to given colour
     * @param  string $hex
     * @return string HEX colour without prefix
     *
     */
    private static function contrast($hex)
    {
        if($hex <= 3)
        {
            $longHex =  $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
            $brightness = self::colourBrightness($longHex);
        }
        else
        {
            $brightness = self::colourBrightness($hex);
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
}