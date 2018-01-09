<?php

define ("__ACCESS__", true);

require_once "framework/paths.php";

require_once SITE_BASE . "/framework/Framework.php";
// var_dump(dirname(__FILE__));exit;
$app = new Framework();

$app->display();