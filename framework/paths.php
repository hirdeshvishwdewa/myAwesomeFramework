<?php

defined("__ACCESS__") or die ("Direct Access Not Allowed !");
define ('BASE_DIR_NAME', 'myAwesomeFramework');
define ('SITE_FULL_URL', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define ('SITE_BASE_URL', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_DIR_NAME);
define ('ASSETS_BASE_URL', SITE_BASE_URL . "/assets");
define ('SITE_BASE', dirname(__DIR__));
// define ('DS', "/");