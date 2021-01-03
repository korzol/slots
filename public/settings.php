<?php
require '../vendor/autoload.php';

use App\ConfigFactory;

$config = ConfigFactory::build(__DIR__.'/../config.json');

header('Content-Type: application/json');

echo json_encode($config->getLines());
