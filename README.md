# Colour
"Colour" is an application and a class which generates a random colour in HEX, RGB and HSL. Moreover, the application also shows a complementary colour in all supported formats and select white or black based on colour brightness.

## API
Colour has also own API which gives response in json. You can define [your own colour](http://colour.oculum.ink/api/532a33) `colour.oculum.ink/api/532a33` or [generate random](http://colour.oculum.ink/api/random) `colour.oculum.ink/api/random`.

__Response is an array:__
```php
{
"my_colour":"532a33",
"main_hex":"532a33",
"main_rgb":
    {
    "R":83,
    "G":42,
    "B":51
    },
"main_hsl":
    {
    "H":347,
    "S":0.33,
    "L":0.25
    },
"main_text":"ffffff",
"comp_hex":"aad4cb",
"comp_rgb":
    {
    "R":170,
    "G":212,
    "B":203
    },
"comp_hsl":
    {
    "H":167,
    "S":0.33,
    "L":0.75
    },
"comp_text":"000000",
"error_code":"C01"
}
```

## Instalation
You can choose between colour as an application or class which is located at `./modules/classes/`.

Released versions are available at [tags section](https://gitlab.com/Silencesys/colour/tags).

### Application
Just copy it on FTP and visit domain where your clone of colour is located.
Voila! A colourfull unicorn is running.

### Class
Copy it wherever you want. And then add to your file.
```php
require_once("/your/path/to/colour.php");
```
Then inicialize it like
```php
$c = new OculumINK\Colour();
$color = $c->colour();
```
There are more functions for disposal.
+ rgbToHex($rgb) - convert RGB colour to HEX, parameter must be an array.
+ hexToRgb($hex) - HEX to RGB and returns RGB as an array.
+ hexToHsl($hex) - HEX to HSL and returns HSL as an array.
+ hslToRgb($hsl) - HSL to RGB which is returned as an array, also parameter must be an array.
+ colourBrightness($hex) - calculate colour brightness and returns float.
+ complementary($hsl) - calculate complementary colour, parameter must be an HSL array and returns also HSL array.
+ randomColour() - generates a random colour based on RGB and then  returns array with HEX and HSL, RGB and HSL are arrays.
+ colour($myColour = null) - returns an array with given variable, HEX, RGB, HSL colours and complementary colour in HEX, RGB and HSL. Also contains error_code information and text colour.

#### Colour() response
Colour() response is an array with these columns.
```php
'my_colour'  => given variable or app response code
'main_hex'   => main colour in HEX formate
'main_rgb'   => the same colour as HEX but RGB
'main_hsl'   => main colour formated as HSL
'main_text'  => text colour - white or black, based on brightness
'comp_hex'   => complementary colour converted to HEX
'comp_rgb'   => complementary colour in RGB
'comp_hsl'   => complementary colour in HSL
'comp_text'  => complementary text colour - white or black, based on brightness
'error_code' => application response error code
```

#### Response codes
Response codes and their translation can be found in `./modules/response_translation.php`.

Error code has suffix E - C00E etc.

+ C00 - No variable is specified, default: empty
+ C01 - Given variable was HEX or RGB, default: empty
+ C02 - Given variable was word 'random', default: set
+ C03 - Given variable was not supported colour format, default: set

## Folder structure
+ `./api` - contains api functions
+ `./modules` - application logic
+ `./modules/classes` - colour class
+ `./layout` - views
+ `./public` - static parts of application

## License
Colour is released under [MIT license](LICENSE.md).