<?php

/** PHP OBJET
$membre = new Person("user", "usermdp", 0); // Un premier personnage 
$admin = new Person("admin", "adminmdp", 1); // Un second personnage 

echo 'La personne 1 est ', $membre->getPseudo(), ' , la personne 2 est ', $admin->getPseudo(), '.
<br />'; echo 'Le mdp de la personne 1 est ', $membre->getMdp(), ' , le mdp de la personne 2 est ', $admin->getMdp(), '.
<br />'; echo 'L\'admin de la personne 1 est ', $membre->getRole(), ', l\'admin de la personne 2 est ', $admin->getRole(), '.
<br />'; **/

$app->get('/', function () { 
    $sujets = getSujets();
    $categories = getCategories();
    
    session_start ();
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->get('/return', function () use ($app) { 
    return $app->redirect('/Forum');
});

$app->get('/{id}', function ($id) { 
    session_start ();
    $categories = getCategories();
    $sujets = getSujetsByCategories($id);
    foreach ($sujets as $sujet) {
        $filtre = $sujet['categorie_nom'];
    }
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/login', function () { 
    $pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];

	$user = connexion($pseudo,$mdp);
    $role = getRole($pseudo);
	//var_dump($user);var_dump($role[0]);
    if ($user&&$role[0]!=0){
        session_start ();
		$_SESSION["pseudo"]=$pseudo;
		$_SESSION["mdp"]=$mdp;
        $_SESSION["role"]=$role[0];
	}else if ($user&&$role[0]==0){
        $message = "Vous avez été bannis de ce site, vous ne pouvez donc plus vous y connecter."; 
    }else{
		$message = "Pseudo ou mot de passe incorrect !"; 
	}
	$sujets = getSujets();
    $categories = getCategories();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/inscription', function () { 
    session_start ();
	$mail = $_POST['mail'];
    $pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
    //var_dump($mail);var_dump($pseudo);var_dump($mdp);
	$res = inscription($pseudo,$mdp,$mail);
    if ($res==false){
	   $message = "Vous êtes inscrits ! Vous pouvez maintenant vous connecter.";
    }else{
        $message = "Cette adresse email ou ce pseudo est déjà est déjà utilisé. Veuillez recommencer.";
    }
	$sujets = getSujets();
    $categories = getCategories();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/deconnexion', function () { 
    session_start ();
    // On détruit les variables de notre session
    session_unset ();
    // On détruit notre session
    session_destroy ();
    
	$message = "Vous êtes déconnecté.";
	$sujets = getSujets();
    $categories = getCategories();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/sujet', function () use ($app) { 
    session_start ();
    
    $titre = $_POST['titre-sujet'];
    $idCategorie = $_POST['id-categorie'];
	$res = addSujet($titre, $idCategorie);
    
    $sujets = getSujetByTitle($titre);
    foreach ($sujets as $sujet) {
        $idSujet = $sujet['sujet_id'];
    }
    $personnes = getPersonneByPseudo($_SESSION['pseudo']);
    foreach ($personnes as $personne) {
        $idPersonne = $personne;
    }
    $content = $_POST['editor1'];
    $res = addPost($idPersonne, $idSujet, $content);
    
	return $app->redirect('/Forum');
});

$app->get('/delete/{id}', function ($id) use ($app) { 
    session_start ();
    deleteSujet($id);
    
	return $app->redirect('/Forum');
});

$app->post('/resolve/{id}', function ($id) use ($app) { 
    session_start ();
    if ($_POST['resoudre']=="Oui"){
        resolveSujet($id);
    }
    else {
        unresolveSujet($id);
    }
    
	return $app->redirect('/Forum');
});


?>