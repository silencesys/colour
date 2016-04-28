<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colorizer<?php echo " - ".$color['hex_color']; ?></title>
    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Welcome colors into your life. Colorizer has been created to add color into today's black and white world. You can use color finder (accepts HEX - #FF00FF, #CCC and RGB - 255,0,255 formats) or just use the random button." />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <!-- STYLESHEETS -->
    <link href="styles/reset.css" rel="stylesheet" type="text/css" />
    <link href="styles/application.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/font-awesome.min.css">
</head>
<!-- HEAD END -->
<body style="background: #<?php echo $color['hex_color']; ?>">
<section class="colorizer">
    <h1><a href="/">Colorizer</a></h1>
    <!-- FIND MY COLOR FORM -->
    <form method="GET" action="<?php echo $action ?>" class="findMyColor">
        <input type="text" name="color">
        <input type="submit" value="Find my color" style="color: <?php  echo $mycolor; ?>;">
    </form>
    <!-- NAVIGATION -->
    <nav class="mainNavigation">
        <ul>
            <li><a href="#" id="btn-about">About</a></li>
            <li><a href="#" id="btn-authors">Authors</a></li>
            <li><a href="https://oculum.ink">Oculum.ink</a></li>
        </ul>
    </nav>

    <!-- TIPS | ABOUT | AUTHORS -->
    <section class="tips" id="c-tips">
        <b>Tip:</b>
        <p><?php echo RandomTip(); ?></p>
    </section>
    <section class="about" id="c-about">
        <p>Colors can do much more than we can even imagine. With colors, you can express your feelings, set a mood or just use them as a starting point for your creations. The goal of Colorizer is to make our everyday life colorful. Thanks to a simple color generator, there's a new color waiting for you each time you visit the website. But you can also generate new random colors using the button next to the color code at the bottom of the page, or enter your own color code and see how the color looks like. Colorizer supports two color code formats - RGB (e.g.: 255,0,255) and HEX (e.g. ff00ff or ccc).</p>
        <p>Did you find your favourite color or color that expresses your feelings? You sure did. Let your friends know about that color thanks to social networks. Colorizer offers sharing via Google+, Facebook and Twitter. Do you want to save your color for later? save the page with the color to you bookmarks in your web browser.</p>
    </section>
    <section class="authors" id="c-authors">
        <ul>
            <li><b>Martin Rocek</b> - Someone who long time ago wanted to make something insane. Code and design.</li>
            <li><b>Yas Ravenheart</b> - One who added colors to insane idea, tested and translated the website.</li>
            <li><b>Red Panda</b> - Because why not!</li>
            <li>Contact us color[at]oculum.ink.</li>
        </ul>
    </section>

    <!-- RANDOM COLOR -->
    <section class="randomColor">
        <h2><?php echo $mycolor; ?></h2>
        <form method="get" action="<?php echo $action ?>" class="switchColor">
            <div class="btnGroup">
                <input type="hidden" value="<?php printRandomColour(); ?>">
                <input type="submit" value="">
                <i class="fa fa-refresh" aria-hidden="true"></i>
            </div>
        </form>
    </section>

    <!-- FOOTER -->
    <footer>
        &copy; 2012 - 2016 Oculum.ink and Colorizer team.
    </footer>
</section>

<script src="libraries/jquery/jquery-2.2.3.min.js"></script>
<script src="https://use.typekit.net/xwz1mfg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script src="libraries/fontfaceobserver/fontfaceobserver.standalone.js"></script>
<script src="javascripts/lib-init.js"></script>
<script src="javascripts/layout.js"></script>
</body>
</html>