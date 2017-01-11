# Forum
Réalisation de l'index et de l'environnement Silex et Bootstrap du projet

Architecture MVC  …
Ajout de l'architecture MVC et des pages principales dont on aura besoin
: pourr le moment vide

Modfication de l'index  …
Finition du style du forum (il manque juste un fond), ajout d'un footer
et dispersion de l'index dans les vues accueil, header et footer

Premier utilisation de silex  …
Dans index.php j'ai créer une nouvelle application silex et j'ai appelé
le controleur accueil.php pour ensuite rediriger la vue v_accueil.php
vers l'url localhost/forum/

Consultation de sujet  …
- .htaccess : sert à faire fonctionner silex
- bootstrap : amélioration du CSS
- img/default_user : image par défaut de l'utilisateur
- index.php : ajout des routes forum/ et forum/subject (subject sera
remplacer par un id correspondant au sujet)
- controleur : j'ai vidé les controleur en gros j'ai fait du fichier
index.php un équivalent d'un route.php contentant toute les routes donc
pour l'instant il n'y a rien dans les controleurs
- vue : création de la vue sujet
	
Ajout des liens entre les pages  …
v_accueil : le premier sujet emene sur la page sujet de test donc
forum/subject
v_header et v_footer : changement du lien de bootstrap

Correction des liens  …
- v_header : j'ai adapté le lien du css à la racine du projet
- liste des taches : j'ai ajouté une doc pour faire un peut les
problèmes de chacun et les taches à faire
- v_accueil : j'ai mis les sujets dans une boucle il faudra remplacer
par des données de la bdd + j'ai mis un overflow donc la liste des
sujets défilera et non la page
- v_subject : même système que v_accueil

Rajout des outils administrateur  …
- css : rajout d'infobulle sur les logos d'outils admin
- rajout des logos bootstrap
- style.css ne sert à rien donc delete

Correction CSS  …
- Correction de la police

Ajout de CKEditor  …
- CKEditor : CKEditor est une librairie du style bootstrap, elle permet
d'inclure un textarea avec les outils mettre en gras etc ...
- index.php : j'ai déplacer les chemin "/" et "subject/" dans les
controleurs respectifs c'est à dire c_accueil et c_subject
- style.css : j'ai renommé bootstrap.min.css en style.css et supprimer
tous les autres fichiers car ils n'avaient aucune utilité je les
remettrai si besoin

MàJ Mise en forme  …
Juste de l'ergonomie du CKEditor et footer

Insertion d'un pop up et MàJ du formulaire de réponse  …
- core.js : ajout de fonction permettant l'affichage du popup et gérer
le formulaire (afficher cacher)
- v_subject : fomulaire réponse qui s'affiche en appuyant sur un bouton
- v_accueil : popup qui s'affiche lorsqu'on clique sur supprimer un
bouton

Classe personne en objet et popup  …
- J'ai supprimé admin et user pour ensuite créer la classe personne pour
aller au plus simple donc je commence à intégrer le PHP objet
- J'ai insérer tout les popup ils manquent ceux de l'administrateur pour
modérer le message et supprimer un message

Fin des popups  …
Le popup modérer le message n'exsite pas c'est un bouton qui modifie
directement la balise p en champs textarea

MàJ du ReadMe  …
Je mets tous les commits dedans
	
début gestion connexion  …
Fonction pour afficher le membre/ admin connecté
Attributs name pour gérer la connexion et l'inscription

Ajout du formulaire nouveau sujet  …
- ajout du nouveau formulaire donc j'ai du créer de nouvelle fonction js
pour afficher et cacher le formulaire, le code html est dans la page
v_accueil

Base de donnée Forum  …
Ajout du fichier SQL contenant la création des tables, ainsi que des
insertions

Forum BDD, correction  …
Correction d'erreurs de la BDD, toujours un souci sur la contrainte DATE

Fichier SQL pour base de donnée Forum  …
Mise à disposition du fichier SQL (test de commit, encore un souci à
régler pour la date au niveau des clés étrangères)

Base de donnée forum corrigée + Inserts  …
Base de donnée sans erreur, avec inserts;
Supression de la table DATE inutile;
Ajout d'une clé étrangere id_personne dans sujet (pour identifier
l'auteur d'un sujet sans avoir à regarder le premier post);

Correction BDD  …
- Dans les insert il y a des données brut tels que catégorie où j'ai
rajouté plus exemple et rôle où j'ai rajouté modérateur pour le futur et
corrigé par rapport aux modifications des tables
- Supprimer le post_id dans post car on retrouver un post unique grâce
aux 3 clés primaires déjà présente
- Supprimer le personne_id dans sujet car on peut déjà le retrouver via
post
- Modification des varchar et not null par ci par là

Fonction d'exemple getSujets()  …
- m_subject : construction de la fonction simple non sécruisé avec la
connexion PDO à la bdd (user=root)
- c_accueil : execution de la fonction
- v_accueil affichage du resultat

Modification de la route sujet  …
- ancienne route forum/subject/
- nouvelle route forum/subject/{id}

connexion / début inscription  …
Connexion d'un utilisateur -> ne fonctionne pas encore bien
Début requête inscription

inscription  …
début inscription avec modif formulaire et requête
->qui ne fonctionne pas

connexion/deconnexion  …
Connexion et Déconnexion fonctionnent.
A voir pour une amélioration en utilisant session_start()

modif message + inscription  …
Requête préparée inscription
Affichage message en fonction de l'action
Ajout dans style.css

Affichage des posts  …
- Affichage des posts avec la méthode getPosts (cf fonctionnement de
getSujet)

