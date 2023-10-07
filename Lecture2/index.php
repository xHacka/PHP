<?php

require "imports.php";

use Plants\Tree;

$oak = new Tree("Oak", 42, 8);
echo $oak->grow() . PHP_EOL;
echo $oak->grow() . PHP_EOL;