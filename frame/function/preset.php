<?php

function say_hi()
{
    echo 'hello, world';
}

function do_nothing()
{
    ;
}

function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
