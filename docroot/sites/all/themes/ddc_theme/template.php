<?php

/**
 * @file
 * template.php
 */
require_once('sites/all/themes/ddc_theme/templates/node/node.inc');

function ddc_theme_preprocess_page($variables)
{
    // Hide page title.
    drupal_set_title(FALSE);

    // Add JS files
    drupal_add_js("https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js", "external");
    drupal_add_js(path_to_theme() . "/assets/js/min/app.min.js");

}
