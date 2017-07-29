<?php

use NoahBuscher\Macaw\Macaw;

/**
 * You can custom your route rules here
 */

Macaw::get('/', function () {
    echo 'Welcome to use Finch!';
});

Macaw::get('/demo', 'app\controller\PagesController@demo');
