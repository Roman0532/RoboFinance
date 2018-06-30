<?php

namespace App\Template;

require_once 'Renderer.php';

/**
 * Подключение view
 * @param $template
 * @param $variables
 * @return string
 */
function render($template, $variables = [])
{
    extract($variables);
    include $template;
}
