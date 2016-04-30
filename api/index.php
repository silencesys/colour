<?php
require_once("../modules/classes/colour.php");

$c = new OculumINK\Colour();
isset($_GET["color"]) ? $myColor =$_GET["color"] : $myColor = null;
$color = $c->colour($myColor);

require_once("../modules/routes.php");