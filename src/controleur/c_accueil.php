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

$app->get('/{id}', function ($id) { 
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
	var_dump($user);
	if ($user){
		$_SESSION["pseudo"]=$pseudo;
		$_SESSION["mdp"]=$mdp;
	}else{
		$message = "Pseudo ou mot de passe incorrect !"; 
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
	
    var_dump($mail);
    var_dump($pseudo);
    var_dump($mdp);
	inscription($pseudo,$mdp,$mail);
	$message = "Vous êtes inscrits ! Vous pouvez maintenant vous connecter.";
	
	$sujets = getSujets();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

$app->post('/deconnexion', function () { 
    
	$message = "Vous êtes déconnecté.";
	$sujets = getSujets();
	
    ob_start();
    require 'src/vue/v_accueil.php';
    $view = ob_get_clean();  
    return $view;
});

?>