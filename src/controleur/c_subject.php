<?php

$app->get('forum/subject/', function () {    
    ob_start();
    require 'src/vue/v_subject.php';
    $view = ob_get_clean();
    return $view;
});