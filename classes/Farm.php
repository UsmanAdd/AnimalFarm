<?php

namespace classes;

use classes\logger\ConsoleLogger;

class Farm {
    private array $total;
    private array $weekTotal;
    private array $products;
    private array $animals;
    private ConsoleLogger $logger;

    public function __construct()
    {
        $this->total = [];
        $this->weekTotal = [];
        $this->products = [];
        $this->animals = [];
        $this->logger = new ConsoleLogger();
    }

    public function addAnimal($animal){
        $this->animals[] = $animal;
    }

    public function collectProductForWeek(){
        $this->weekTotal = [];
        for ($i = 1; $i <= 7; $i++) {
            $this->collectProducts();
        }
        $this->calculateTotal();
    }

    private function collectProducts(){
        $this->products = [];
        foreach ($this->animals as $container) {
            foreach ($container as $animal) {
                $animal = (object) $animal;
                $product = $animal->collectProducts();
                $typeProduct = $animal->getTypeProduct();
                $this->products[$typeProduct][] = $product;
            }
        }
        $this->calculateWeekTotal();
    }
    
    private function calculateTotal(){
        $weekTotal = $this->weekTotal;
        foreach (array_keys($weekTotal) as $typeProduct){
            if (isset($this->total[$typeProduct])){
                $this->total[$typeProduct] += $weekTotal[$typeProduct];
            } else {
                $this->total[$typeProduct] = $weekTotal[$typeProduct];
            }
        }
    }
    
    private function calculateWeekTotal(){
        $weekTotal = array_merge_recursive($this->weekTotal, $this->products);
        foreach (array_keys($weekTotal) as $typeProduct){
            $weekTotal[$typeProduct] = array_sum($weekTotal[$typeProduct]);
        }
        $this->weekTotal = $weekTotal;
    }

    public function printTotal(){
        $total = $this->total;
        $this->logger->log("Итого: ");
        foreach ($total as $product => $count){
            $this->logger->log($product . ": " . $count);
        }
        $this->logger->log("");
    }

    public function printWeekTotal(){
        $weekTotal = $this->weekTotal;
        $this->logger->log("Итоги недели: ");
        foreach ($weekTotal as $product => $count){
            $this->logger->log($product . ": " . $count);
        }
        $this->logger->log("");
    }

    private function getCountAnimal(){
        $countAnimal = [];
        foreach ($this->animals as $container){
            foreach ($container as $animal){ 
                $animal = (object) $animal;
                $classesAnimal = explode("\\",get_class($animal));
                $typeAnimal = end($classesAnimal);
                isset($countAnimal[$typeAnimal]) ? $countAnimal[$typeAnimal]++ :  $countAnimal[$typeAnimal] = 1; 
            }
        }
        return $countAnimal;
    }

    public function printCountAnimal(){
        $countAnimal = $this->getCountAnimal();
        $this->logger->log("Количество животных:");
        foreach ($countAnimal as $typeAnimal => $count){
            $this->logger->log($typeAnimal . ": " . $count);
        }
        $this->logger->log("");
    }
}

?>