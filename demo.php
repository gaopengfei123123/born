<?php
include './vendor/autoload.php';
use Body\Arm\Arm;
use Body\Leg\Leg;

$test = new Arm();
$test->index();

$leg = new Leg();
$leg->index();

 ?>
