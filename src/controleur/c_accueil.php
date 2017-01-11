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
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/login', function () { 
    $pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];

	$user = connexion($pseudo,$mdp);
	//var_dump($pseudo);var_dump($mdp);var_dump($user);
	if ($user){
		$_SESSION["pseudo"]=$pseudo;
		$_SESSION["mdp"]=$mdp;
	}else{
		$message = "Pseudo ou Mdp incorrect !";
	}
	$sujets = getSujets();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/inscription', function () { 
	$mail = $_POST['mail'];
    $pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	
	$user = inscription($mail,$pseudo,$mdp);
	var_dump($user);
	if ($user){
		$message = "Inscription Succès !";
	}
	$sujets = getSujets();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/deconnexion', function () { 
	
	$sujets = getSujets();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

?>