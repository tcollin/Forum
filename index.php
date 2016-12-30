<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('forum/', function () {    
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();
    return $view;
});

$app->get('forum/subject', function () {    
    ob_start();
    require 'src/vue/v_subject.php';
    $view = ob_get_clean();
    return $view;
});

$app->run();