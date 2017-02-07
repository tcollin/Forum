<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

require '/src/modele/m_post.php'; 
require '/src/modele/m_person.php'; 
require '/src/modele/m_subject.php';
require __DIR__.'/src/controleur/c_accueil.php';
require __DIR__.'/src/controleur/c_subject.php';

$app->run();