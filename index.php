<?php
    require_once(dirname(__FILE__)."/functions/routes.php");
    require_once(dirname(__FILE__)."/functions/colours.php");
    require_once(dirname(__FILE__)."/functions/tips.php");

    $color  = Colorizer();
    $base_url = '/';

    // because of localhost testing with easyphp
    if($routes[1] == 'edsa-colorizer')
    {
        $base_url = '/edsa-colorizer/';
        unset($routes[1]);
        $routes = array_values($routes);
    }
    /*
     * Correct routing start
     */
    if($routes[1] == 'api')
    {
        if(isset($routes[2]) == 'random' || $routes[3] = isset($_GET['color']))
        {
            include '/layout/api/json_response.php';
        }
        else
        {
            include '/layout/api/api.php';
        }
    }
    elseif($routes[1] == 'authors')
    {
        include '/layout/authors.php';
    }
    elseif($routes[1] == 'about')
    {
        include '/layout/about.php';
    }
    else
    {
        include '/layout/colorizer.php';
    }