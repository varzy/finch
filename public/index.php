<?php

// define project's root path
define('__ROOT__', dirname(__DIR__));

// load real entry php file
require __ROOT__ . '/core/Frame.php';

// run it!
\core\Frame::run();
