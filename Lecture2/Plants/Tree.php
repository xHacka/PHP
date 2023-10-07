<?php

namespace Plants;

use Plants\Plant;

class Tree extends Plant {
    public int $height;
    public string $leafColor;
    public string $color;

    function getColor() : string { return $this->color; }

    function grow() : int {
        if ($this->growRate < 10) {
            $this->growRate++;
        } else {
            echo $this->wither();
        }
        return $this->growRate;
    }
}