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

function show_sys_info($words, $border_color = '#eee')
{
    $styles = 'margin: 0 auto;'
        . 'max-width: 50%;'
        . 'padding: 18px 36px;'
        . 'border: 2px solid ' . $border_color . ';';

    echo '<div style="' . $styles . '">' . $words . '</div>';
}

function warning($words)
{
    show_sys_info($words, "#f4a460");
}

function error($words)
{
    show_sys_info($words, "#ff6347");
}

function getCorrectPath($path)
{
    return str_replace('\\', '/', $path);
}