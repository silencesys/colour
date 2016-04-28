<!DOCTYPE html>
<!--#if expr="$HTTP_COOKIE=/fonts\-loaded\=true/" -->
<html lang="en" class="fonts-loaded">
<!--#else -->
<html lang="en">
<!--#endif -->
<head>
    <title>Color - <?php echo $color['hex_color']; ?></title>
    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Welcome colors into your life. Colorizer has been created to add color into today's black and white world. You can use color finder (accepts HEX - #FF00FF, #CCC and RGB - 255,0,255 formats) or just use the random button." />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <!-- STYLESHEETS -->
    <link href="styles/reset.css" rel="stylesheet" type="text/css" />
    <link href="styles/application.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/font-awesome.min.css">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <style>
        header a,
        .navigationAndTips,
        .navigationAndTips a,
        .myColor,
        .randomColor,
        .fa,
        .authors h2,
        .authors ul,
        .about,
        footer
        {color: #<?php echo $color['text_color'] ?>;}

        .myColor
        {border-color: #<?php echo $color['text_color'] ?>;}
    </style>
</head>
<!-- HEAD END -->
<body style="background: #<?php echo $color['hex_color']; ?>">
<header>
    <h1><a href="<?php echo $base_url ?>">Colour</a></h1>
    <a href="https://oculum.ink" class="subtitle">oculum.ink</a>
</header>
<section class="navigationAndTips">
    <nav>
        <ul>
            <li><a href="<?php echo $base_url ?>api">Api</a></li>
            <li><a href="https://gitlab.com/Silencesys/colorizer">Gitlab</a></li>
            <li><a href="<?php echo $base_url ?>authors">Authors</a></li>
            <li><a href="<?php echo $base_url ?>about">About</a></li>
        </ul>
    </nav>
    <section class="tips">
        <p><?php echo RandomTip();?></p>
    </section>
</section>