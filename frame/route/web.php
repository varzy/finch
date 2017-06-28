<?php

use NoahBuscher\Macaw\Macaw;

/**
 * You can custom your route rules here
 */

Macaw::get('/', 'http\controller\PagesController@index');

Macaw::get('help', function () {
    echo 'help';
});
