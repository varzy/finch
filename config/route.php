<?php

use NoahBuscher\Macaw\Macaw;
use core\ViewMaker;

/**
 * You can custom your route rules here
 */

Macaw::get('/', function () {
    ViewMaker::makeView('welcome.php');
});

Macaw::get('/demo', 'app\controller\DemoController@demo');
