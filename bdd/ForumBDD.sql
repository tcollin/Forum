DROP TABLE IF EXISTS POST ;
DROP TABLE IF EXISTS SUJET;
DROP TABLE IF EXISTS PERSONNE ;
DROP TABLE IF EXISTS ROLE ;
DROP TABLE IF EXISTS CATEGORIE ;
DROP TABLE IF EXISTS STATUT ;
DROP TABLE IF EXISTS RANG;


-- Rang de l'user (admin, user, etc...)

CREATE TABLE ROLE (
    role_id INT  AUTO_INCREMENT NOT NULL,
    role_libelle VARCHAR(30) NOT NULL,
    PRIMARY KEY (role_id) ) ENGINE=InnoDB;


-- Table des utilisateurs

CREATE TABLE PERSONNE (
    personne_id INT  AUTO_INCREMENT NOT NULL,
    personne_pseudo VARCHAR(30) NOT NULL,
    personne_mdp VARCHAR(16) NOT NULL,
    personne_mail VARCHAR(150) NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (personne_id) ) ENGINE=InnoDB;

-- Categories de sujets

CREATE TABLE CATEGORIE (
    categorie_id INT  AUTO_INCREMENT NOT NULL,
    categorie_nom VARCHAR(50) NOT NULL,
    PRIMARY KEY (categorie_id) ) ENGINE=InnoDB;

-- Sujets des forum crées par les utilisateurs

CREATE TABLE SUJET (
    sujet_id INT  AUTO_INCREMENT NOT NULL,
    sujet_titre VARCHAR(255) NOT NULL,
    rang_id INT NOT NULL,
    categorie_id INT NOT NULL,
    statut_id INT,
    PRIMARY KEY (sujet_id) ) ENGINE=InnoDB;

CREATE TABLE RANG(
    rang_id INT AUTO_INCREMENT NOT NULL,
    rang_libelle VARCHAR(30),
    PRIMARY KEY (rang_id) ) ENGINE=InnoDB;

-- Statut du sujet (nul, urgent ou résolu)

CREATE TABLE STATUT (
    statut_id INT AUTO_INCREMENT NOT NULL,
    statut_libelle VARCHAR(30) NOT NULL,
    PRIMARY KEY (statut_id) ) ENGINE=InnoDB;

-- Table des posts

CREATE TABLE POST (
    sujet_id INT NOT NULL,
    post_date DATETIME NOT NULL,
    personne_id INT NOT NULL,
    post_texte LONGTEXT NOT NULL,
    PRIMARY KEY (personne_id,post_date,sujet_id) ) ENGINE=InnoDB;

-- clés étrangères

ALTER TABLE PERSONNE ADD CONSTRAINT FK_PERSONNE_role_id FOREIGN KEY (role_id) REFERENCES ROLE (role_id);
ALTER TABLE SUJET ADD CONSTRAINT FK_SUJET_categorie_id FOREIGN KEY (categorie_id) REFERENCES CATEGORIE (categorie_id);
ALTER TABLE SUJET ADD CONSTRAINT FK_SUJET_statut_id FOREIGN KEY (statut_id) REFERENCES STATUT (statut_id);
ALTER TABLE SUJET ADD CONSTRAINT FK_SUJET_rang_id FOREIGN KEY (rang_id) REFERENCES RANG (rang_id);
ALTER TABLE POST ADD CONSTRAINT FK_POST_personne_id FOREIGN KEY (personne_id) REFERENCES PERSONNE (personne_id);
ALTER TABLE POST ADD CONSTRAINT FK_POST_sujet_id FOREIGN KEY (sujet_id) REFERENCES SUJET (sujet_id);


-- insertions

insert into ROLE values (0,'Banni');
insert into ROLE values (1,'Administrateur');
insert into ROLE values (2,'Membre');
insert into ROLE values (3,'Modérateur');

insert into PERSONNE values (1,'thibaut','thibaut','thibaut@gmail.com',1);
insert into PERSONNE values (2,'aurore','aurore','aurore@gmail.com',1);
insert into PERSONNE values (3,'yoann','yoann','yoann@gmail.com',1);
insert into PERSONNE values (4,'alice','alice','alice@gmail.com',2);

insert into CATEGORIE values (1,'Mobile');
insert into CATEGORIE values (2,'Télévision');
insert into CATEGORIE values (3,'Ordinateur');
insert into CATEGORIE values (4,'Tablette');
insert into CATEGORIE values (5,'Console');
insert into CATEGORIE values (6,'Autres technologies');
insert into CATEGORIE values (7,'Divers');

insert into STATUT values(0,'');
insert into STATUT values(1,'[URGENT]');
insert into STATUT values(2,'[RESOLU]');

insert into RANG values(1,'Epinglé');
insert into RANG values(2,'Par défaut');

insert into SUJET values (1,'Premier sujet MONOLOGUE',2,1,0);
insert into SUJET values (2,'Second sujet DISCUSSION',2,5,1);
insert into SUJET values (3,'Topic à épingler',1,7,2);

-- insertion sujet monologue

insert into POST values (1,'2010-04-02 15:28:22',1,'Bonjour ceci est mon premier message a moi même');
insert into POST values (1,'2010-04-02 15:29:58',1,'Et je me répond comme cela');
insert into POST values (1,'2010-04-02 15:40:10',1,'Je continue une troisième fois de me parler');
insert into POST values (1,'2010-04-02 16:50:12',1,'Quatrième ligne à moi même');
insert into POST values (1,'2016-04-02 15:28:22',1,'Et enfin la fin de mon monologue');

-- insertion sujet discussion

insert into POST values (2,'2010-04-02 15:28:22',2,'Bonjour ceci est le premier message de la discussion');
insert into POST values (2,'2011-04-02 15:29:58',3,'bonjour Aurore, comment ça va ?');
insert into POST values (2,'2011-04-02 15:30:58',4,'Coucou moi je suis Alice');
insert into POST values (2,'2011-04-05 00:50:12',2,'Bonjour Alice');
insert into POST values (2,'2017-01-02 07:45:23',4,'A bientôt les ptizamis !');

-- insertion sujet moderation

insert into POST values (3,'2017-01-02 07:45:23',1,'Premier message dans le sujet Moderation');
insert into POST values (3,'2017-01-02 07:48:48',2,'Il faudrait epingler ce topic');
insert into POST values (3,'2017-01-02 07:50:25',3,'Je suis tout à fait daccord');
insert into POST values (3,'2017-01-04 11:35:36',1,'le topic a epingler a le rang numero 1');
insert into POST values (3,'2017-01-07 16:21:56',1,'Et les topics normaux ont un rang numero 2');
