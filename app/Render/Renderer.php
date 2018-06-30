<?php

namespace App\Renderer;

require_once 'Template.php';

/**
 * Метод поиска абсолютного пути
 * @param $path
 * @param array $variables
 * @return string
 */
function render($path, $variables = [])
{
    $path = realpath('app/View/' . $path . '.php');
    return \App\Template\render($path, $variables);
}
