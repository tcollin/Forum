DROP TABLE IF EXISTS POST ;
DROP TABLE IF EXISTS PERSONNE ;
DROP TABLE IF EXISTS SUJET;
DROP TABLE IF EXISTS ROLE ;
DROP TABLE IF EXISTS CATEGORIE ;
DROP TABLE IF EXISTS DATE ;


-- Rang de l'user (admin, user, etc...)

CREATE TABLE ROLE (
role_id INT(11)  AUTO_INCREMENT NOT NULL,
role_libelle VARCHAR(20),
PRIMARY KEY (role_id) ) ENGINE=InnoDB;


-- Table des utilisateurs

CREATE TABLE PERSONNE (
personne_id INT(11)  AUTO_INCREMENT NOT NULL,
personne_pseudo VARCHAR(30),
personne_mdp VARCHAR(30),
personne_mail VARCHAR(250),
role_id INT(11) NOT NULL,
PRIMARY KEY (personne_id) ) ENGINE=InnoDB;

-- Categories de sujets

CREATE TABLE CATEGORIE (
categorie_id INT(11)  AUTO_INCREMENT NOT NULL,
categorie_nom VARCHAR(30),
PRIMARY KEY (categorie_id) ) ENGINE=InnoDB;

-- Sujets des forum crées par les utilisateurs

CREATE TABLE SUJET (
sujet_id INT(11)  AUTO_INCREMENT NOT NULL,
sujet_titre VARCHAR(60),
personne_id int(11),
sujet_rang INT(2),
categorie_id INT(11) NOT NULL,
PRIMARY KEY (sujet_id) ) ENGINE=InnoDB;

-- Table des posts

CREATE TABLE POST (
sujet_id INT(11) NOT NULL,
post_date DATETIME NOT NULL,
personne_id INT(11) NOT NULL,
post_id int(11) AUTO_INCREMENT NOT NULL,
post_texte TEXT,
PRIMARY KEY (personne_id,post_date,sujet_id),
CONSTRAINT UK_post_id UNIQUE (post_id)   ) ENGINE=InnoDB;

-- clés étrangères

ALTER TABLE PERSONNE ADD CONSTRAINT FK_PERSONNE_role_id FOREIGN KEY (role_id) REFERENCES ROLE (role_id);
ALTER TABLE SUJET ADD CONSTRAINT FK_SUJET_categorie_id FOREIGN KEY (categorie_id) REFERENCES CATEGORIE (categorie_id);
ALTER TABLE SUJET ADD CONSTRAINT FK_SUJET_personne_id FOREIGN KEY (personne_id) REFERENCES PERSONNE (personne_id);
ALTER TABLE POST ADD CONSTRAINT FK_POST_personne_id FOREIGN KEY (personne_id) REFERENCES PERSONNE (personne_id);
ALTER TABLE POST ADD CONSTRAINT FK_POST_sujet_id FOREIGN KEY (sujet_id) REFERENCES SUJET (sujet_id);

-- insertions

insert into ROLE values (1,'admin');
insert into ROLE values (2,'user');

insert into PERSONNE values (1,'tibo','tibo','tibo@gmail.com',1);
insert into PERSONNE values (2,'aurore','aurore','aurore@gmail.com',1);
insert into PERSONNE values (3,'yoann','yoann','yoann@gmail.com',1);
insert into PERSONNE values (4,'alice','alice','alice@gmail.com',2);

insert into CATEGORIE values (1,'divers');
insert into CATEGORIE values (2,'moderation');

insert into SUJET values (1,'Premier sujet MONOLOGUE',1,2,1);
insert into SUJET values (2,'Second sujet DISCUSSION',2,2,1);
insert into SUJET values (3,'Topic de modération, à épingler',1,1,2);

-- insertion sujet monologue

insert into POST values (1,'2010-04-02 15:28:22',1,1,'Bonjour ceci est mon premier message a moi même');
insert into POST values (1,'2010-04-02 15:29:58',1,2,'Et je me répond comme cela');
insert into POST values (1,'2010-04-02 15:40:10',1,3,'Je continue une troisième fois de me parler');
insert into POST values (1,'2010-04-02 16:50:12',1,4,'Quatrième ligne à moi même');
insert into POST values (1,'2016-04-02 15:28:22',1,5,'Et enfin la fin de mon monologue');

-- insertion sujet discussion

insert into POST values (2,'2010-04-02 15:28:22',2,6,'Bonjour ceci est le premier message de la discussion');
insert into POST values (2,'2011-04-02 15:29:58',3,7,'bonjour Aurore, comment ça va ?');
insert into POST values (2,'2011-04-02 15:29:58',4,8,'Coucou moi je suis Alice');
insert into POST values (2,'2011-04-05 00:50:12',2,9,'Bonjour Alice');
insert into POST values (2,'2017-01-02 07:45:23',4,10,'A bientôt les ptizamis !');

-- insertion sujet moderation

insert into POST values (3,'2017-01-02 07:45:23',1,11,'Premier message dans le sujet Moderation');
insert into POST values (3,'2017-01-02 07:45:23',2,12,'Il faudrait epingler ce topic');
insert into POST values (3,'2017-01-02 07:45:23',3,13,'Je suis tout à fait daccord');
insert into POST values (3,'2017-01-04 11:35:36',1,14,'le topic a epingler a le rang numero 1');
insert into POST values (3,'2017-01-07 16:21:56',1,15,'Et les topics normaux ont un rang numero 2');
