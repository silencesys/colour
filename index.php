<?php
require_once(dirname(__FILE__)."/modules/classes/colour.php");
require_once(dirname(__FILE__)."/modules/tips.php");

$c = new OculumINK\Colour();
isset($_GET["color"]) ? $myColor =$_GET["color"] : $myColor = null;
$color = $c->colour($myColor);

require_once(dirname(__FILE__)."/modules/response_translation.php");
require_once(dirname(__FILE__)."/modules/routes.php");