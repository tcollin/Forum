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

MàJ CSS et affichage date du post  …
- Il va falloir un CSS un peu mieux pour les posts donc à faire

inscription terminée  …
Si pseudo existe déjà, inscription impossible sinon insertion dans la
base.
Message d'erreur à terminer

Filtre par catégorie des sujets  …
- Quand on clique sur catégorie normalement seul les sujets qui
correspondent à cette catégorie sont affiché, le filtre s'affiche au
dessus et si on clique sur la close du filtre tout les sujets se
réaffiche

modification inscription  …
Un user ne peut pas s'inscrire 2 fois avec la même adresse
Si user connecté, il ne voit que le bouton déconnecté et il ne voit pas
celui pour s'inscrire
Le bouton "nouveau sujet" ne s'affiche que si user est authentifié

/!\ A voir pour session_start() car si user connecté clique sur un
sujet/categorie, il se déconnecte automatiquement

Connexion terminée  …
Session_start() à ajouter à chaque début de page pour que user reste
connecté à sa session.
	
correction connexion  …
Correction du bug mais ne se connecte pas quand même, à voir les
fonctions silex qui peuvent rediriger

Affichage icone rouge selon role  …
On récupère l'id du role de l'utilisateur et on affiche les icones si la
personne connectée est admin ou modérateur

	
Ajout d'un sujet possible et bouton personne connecté  …
- Grâce à plusieurs fonctions on peut maintenant insérer un sujet
associer à son post de départ.
- Correction de la BDD au niveau des insert into, à prévoir mettre en
unique le titre pour éviter les sujets doublons
- Ajout d'un bouton à côté de déconnexion pour voir qui est connecté (
bug sur le lien à corriger)

	
Réglage du bouton profil et suppression d'un sujet  …
- c_accueil : j'ai fais des redirect plutôt que de réappeler la vue sur
certaine chose et créer le chemin du delete sujet
- style : correction du style du bouton profil
- m_subject : création des fonctions dont j'avais besoin pour la
suppression

Modif BDD (ajout statut)  …
Ajout d'une table STATUT pour les sujets (résolus, urgent ou rien)

Modif BDD ajout de la table RANG (épinglé ou non)  …
Ajout d'une table RANG pour définir le rang d'un sujet, s'il est épinglé
ou non

Modif addSujet et ajout role Banni  …
- Ajout du rang_id et du statut_id dans le fonction addSujet
- Ajout d'un rôle pour user Bannis

Des petites modification et début du resolve  …
- correction d'un return
- ajout d'une fonction resolve permettant d'afficher RESOLU devant le
sujet

Résoudre sujet OK  …
- m_subject : j'ai donc créé 2 méthode une qui update le statut d sujet
en résolu et l'autre en null grâce à leur id
- c_accueil : j'ai modifié l'évènement du resolve/id pour que quand le
bouton radio est sur oui le sujet passe en résolu quand il est sur non
il revient à null
- v_accueil : j'ai associé un formulaire pop up différent à un lien
javascript différent à chaque tour de boucle car sinon nous ne pouvons
résoudre ou supprimer que le dernier sujet car le javascript s'éxecute
coté client donc apres l'html

début pour bannir l'utilisateur  …
Requête pour mettre à 0 le role_id
pb avec recup du bon utilisateur à bannir

Indentation du code et MàJ Read.me

Suppression des posts  …
- c_accueil : ajout d'une route qui redirige vers "/" pour le bouton
retour d'un sujet
- c_subject : création de la route pour supprimer un post
- m_post : j'ai ajouté une page de fonction post pour différencier les
fonctions lier à un sujet et à un post et j'ai créer la fonction
permettant de supprimer un post (à améliorer car on ne prend pas en
compte l'utilisateur qui a posté en paramètre)
- v_subject : affectation du formulaire de suppression dans la boucle
pour que un formulaire correspondent à un post

Ban de l'utilisateur et ajout de post  …
- ForumBDD : majuscules dans les libelles de la table rang
- c_accueil : j'ai mis la route du ban user dans le c_subject
- c_subject : ajout des routes pour addbost et banuser avec des
redirection a chaque fois vers le sujet
- m_person :  j'ai juste changer le nom de la fonction
- v_subject : affichage changé (j'ai banni l'utilisateur yoann)
maintenant on affiche utilisateur banni quand le rôle est à 0 mais on
laisse les messages et rajout du formulaire dans la boucle pour associer
un fomrulaire par post

Modif connexion  …
Si role_id=0, message informant l'utilisateur qu'il a été bannis
Si pseudo existe dans la base, pas inscription, idem pour email
	
Merge branch 'master' of https://github.com/tcollin/Forum

m_post

Merge branch 'master' of https://github.com/tcollin/Forum

Modérer message  …
- BUG obliger de double clic sur l'icône modérer pour afficher le form
mais tout marche sinon
- style : Form en display none
- core : gère l'affichage du formulaire
- c_subject : ajout de la route de modération
- m_post : fonction update
- v_subject : ajout du formulaire de modération post

Résolution bug css form post  …
- Il yavait un bug sur la class du form-post il ne cachait pas le
formulaire grace au css j'ai changé le nom de la class et apparement ça
a résolu le bug

regex inscription  …
pattern pour inscription correcte

MàJ Read me