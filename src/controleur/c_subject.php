<?php


$app->get('subject/{id}', function ($id) { 
    echo $id;
    ob_start();
    require 'src/vue/v_subject.php';
    $view = ob_get_clean();
    return $view;
});