<?php

include("../vendor/autoload.php");


use Helpers\Helper;

$test = (new Helper())->hello();

echo $test;
