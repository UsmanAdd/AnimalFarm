<?php

require_once("autoload.php");

use classes\Farm;
use classes\shop\AnimalShop;
use classes\logger\ConsoleLogger;

$farm = new Farm();
$shop = new AnimalShop($farm);
$logger = new ConsoleLogger();

$logger->log("Первая неделя");
$orderList = ["cow" => 10, "chicken" => 20];
$shop->buy($orderList);
$farm->printCountAnimal();
$farm->collectProductForWeek();
$farm->printWeekTotal();
$farm->printTotal();

$logger->log("-----------------");
$logger->log("");

$logger->log("Вторая неделя");
$orderList = ["cow" => 1, "chicken" => 5];
$shop->buy($orderList);
$farm->printCountAnimal();
$farm->collectProductForWeek();
$farm->printWeekTotal();
$farm->printTotal();

?>