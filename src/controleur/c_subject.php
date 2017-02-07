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
<<<<<<< HEAD
});

$app->get('subject/{idsujet}/{datepost}', function ($idsujet ,$datepost) use ($app) {
    session_start ();
    deletePost($datepost ,$idsujet);
    
    $posts = getPosts($idsujet);
    
    return $app->redirect('/Forum/subject/'.$idsujet);
});

$app->post('subject/addpost/{idsujet}', function ($idsujet) use ($app) { 
    session_start ();
    
    $personnes = getPersonneByPseudo($_SESSION['pseudo']);
    foreach ($personnes as $personne) {
        $idpersonne = $personne;
    }
    
    $content = $_POST['editor1'];
    $res = addPost($idpersonne, $idsujet, $content);
    
    return $app->redirect('/Forum/subject/'.$idsujet);
});

$app->get('/subject/banuser/{pseudo}/{idsujet}', function ($pseudo, $idsujet) use ($app) { 
    session_start ();
    
    $res = setRoleBan($pseudo);
	
    return $app->redirect('/Forum/subject/'.$idsujet);
});

$app->post('subject/moderate/{idsujet}/{datepost}', function ($idsujet ,$datepost) use ($app) {
    session_start ();
    
    $content=$_POST['content'];
    updatePost($datepost ,$idsujet, $content);
    
    return $app->redirect('/Forum/subject/'.$idsujet);
});
=======
});
>>>>>>> origin/master
