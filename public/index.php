<?php

// define project's root path
define('__ROOT__', dirname(__DIR__));

// load real entry php file
require __ROOT__ . '/core/frame.php';

// run it!
frame::run();
