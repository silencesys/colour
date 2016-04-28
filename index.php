<?php
    require_once(dirname(__FILE__)."/functions/routes.php");
    require_once(dirname(__FILE__)."/functions/colours.php");
    require_once(dirname(__FILE__)."/tips.php");

    $color  = Colorizer();
    $action = '/';

    if($routes[1] == 'edsa-colorizer')
    {
        $action = '/edsa-colorizer/';
    }
    if($routes[1] == 'api')
    {
        if($routes[2] == 'random' || $routes[3] = isset($_GET['color']))
        {
            include 'json_response.php';
        }
        else
        {
            include 'api.php';
        }
    }
    // because of htaccess at local dev
    elseif($routes[1] == 'edsa-colorizer' && $routes[2] == 'api')
    {
        if($routes[3] == 'random' || $routes[4] = isset($_GET['color']))
        {
            include 'json_response.php';
        }
        else
        {
            include 'api.php';
        }
    }
    else
    {
        include 'colorizer.php';
    }