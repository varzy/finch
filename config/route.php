<?php

use NoahBuscher\Macaw\Macaw;

/**
 * You can custom your route rules here
 */

Macaw::get('/', 'app\controller\StaticPagesController@index');

Macaw::get('/test', 'app\controller\StaticPagesController@test');