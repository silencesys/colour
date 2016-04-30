<?php
$web_url = $_SERVER['REQUEST_URI'];
$routes  = [];
$routes  = explode('/', $web_url);

$base_url = '/';

// because of localhost testing with easyphp
if($routes[1] == 'edsa-colorizer')
{
    $base_url = '/edsa-colorizer/';
    unset($routes[1]);
    $routes = array_values($routes);
}
// API route controller
if($routes[1] == 'api' && $routes[2] = isset($_GET['color']))
{
    include 'response.php';
}
elseif($routes[1] == 'api')
{
    include 'welcome.php';
}
elseif($routes[1] == 'authors')
{
    include 'layout/authors.php';
}
elseif($routes[1] == 'about')
{
    include 'layout/about.php';
}
else
{
    include 'layout/colorizer.php';
}