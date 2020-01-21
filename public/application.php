<?php

use Random\Application;

require __DIR__ . "/../vendor/autoload.php";

$app = Application::getInstance(__DIR__ . "/../");

$app->process($_GET["algorithm"] ?? "");
