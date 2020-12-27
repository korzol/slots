<?php
require '../vendor/autoload.php';

use App\ConfigFactory;
use App\Slots;

$slots = new Slots(ConfigFactory::build(__DIR__.'/../config.json'));

header('Content-Type: application/json');
echo $slots->spin()->getJsonReport();
