<?php

$app->get('subject/{id}', function ($id) {
    session_start ();
    $posts = getPosts($id);
    
    ob_start();
    require 'src/vue/v_subject.php';
    $view = ob_get_clean();
    return $view;
});

$app->post('subject/login', function () use ($app) {
    session_start();
    return $app->redirect('/Forum/login');
});

$app->post('subject/deconnexion', function () use ($app) { 
    session_start ();
    // On détruit les variables de notre session
    session_unset ();
    // On détruit notre session
    session_destroy ();
    
    $message = "Vous êtes déconnecté.";
	
    return $app->redirect('/Forum');
});

$app->get('subject/{idsujet}/{datepost}', function ($idsujet ,$datepost) use ($app) {
    session_start ();
    deletePost($datepost ,$idsujet);
    
    $posts = getPosts($idsujet);
    
    return $app->redirect('/Forum/subject/'.$idsujet);
});