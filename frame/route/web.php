<?php

use NoahBuscher\Macaw\Macaw;

/**
 * You can custom your route rules here
 */

Macaw::get('/', 'Http\Controller\Pages@index');

Macaw::get('help', function () {
    echo 'help';
});
