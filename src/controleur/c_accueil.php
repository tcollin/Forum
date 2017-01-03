<?php

$app->get('forum/', function () {    
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();
    return $view;
});

?>