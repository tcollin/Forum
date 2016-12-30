<?php


require_once __DIR__.'/vendor/autoload.php';


$app = new Silex\Application();


$app['debug'] = true;


require __DIR__.'/src/controleur/c_accueil.php';


$app->run();