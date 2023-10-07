<?php

namespace Plants;

abstract class Plant {
    public string $name;
    public int $age;
    public int $growRate;
    public bool $alive;

    public function __construct(string $name, int $age, int $growRate) {
        $this->name = $name;
        $this->age = $age;
        $this->growRate = $growRate;    
        echo $this->birth();
    }

    protected function birth() : string {
        return "{$this->name} Has Been Born 🎉" . PHP_EOL;
    }

    public function wither() : string {
        $this->growRate = 0;
        $this->alive = false;
        return "{$this->name} Has Died 💀" . PHP_EOL;
    }
    
    abstract function getColor() : string;
    abstract function grow() : int;
}