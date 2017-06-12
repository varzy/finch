<?php

namespace app\_common;

function sayHello()
{
    echo 'hello, world';
}

function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}
