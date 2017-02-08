<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MyForum.com</title>

    <!-- Bootstrap -->
    <link href="/Forum/css/style.css" rel="stylesheet">
    <script src="/Forum/ckeditor/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.6.1/basic/ckeditor.js"></script>

    <!-- HTML5 shim and Respond.js dfor IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/Forum">MyForum.com</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">

                        <?php if (!isset($_SESSION["pseudo"])){ ?>
                            <!--si pas connecté, affichage bouton connexion et inscription -->
                            <a href="#?w=500" rel="connexion" class="poplight">
                                <button type="submit" class="btn btn-success">Connexion</button>
                            </a>
                            <a href="#?w=500" rel="inscription" class="poplight">
                                <button type="submit" class="btn btn-warning">Pas encore inscrit ?</button>
                            </a>
                            <?php }
                            else {  ?>
                                <button type="submit" class="btn btn-success">Bonjour,
                                    <?php echo $_SESSION['pseudo']?> !</button>
                                <!-- sinon afiche seulement le bouton de connexion -->
                                <a href="#?w=500" rel="deconnexion" class="poplight">
                                    <button type="submit" class="btn btn-danger">Deconnexion</button>
                                </a>
                                <?php 
                            if ($_SESSION["role"]==1) { ?>
                                    <a href="#?w=500" rel="inscription" class="poplight">
                                        <button type="submit" class="btn btn-warning">
                                            Ajouter membre
                                        </button>
                                    </a>
                                    <?php  }
                            } ?>
                    </form>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </nav>
    </header>

    <div id="connexion" class="popup_block">
        <form method='post' action='login'>
            <label>Pseudo :</label>
            <br />
            <input type="text" id="pseudo" name="pseudo" class="connexion-pseudo" />
            <br />
            <label>Mot de passe :</label>
            <br />
            <input type="password" id="mdp" name="mdp" class="connexion-mdp" />
            <div class="btn-popup">
                <hr>
                <button type="submit" class="btn btn-success btn-connecter" name="connexion" id="btn-connecter">Se connecter</button>
            </div>
        </form>
    </div>

    <div id="deconnexion" class="popup_block">
        <form method='post' action='deconnexion'>
            <label>Vous allez vous déconnecter</label>
            <div class="btn-popup">
                <hr>
                <button type="submit" class="btn btn-success btn-connecter" name="deco" id="btn-deconnecter">Ok</button>
            </div>
        </form>
    </div>

    <div id="inscription" class="popup_block">
        <form method='post' action='inscription'>
            <label>Pseudo :</label>
            <br />
            <input type="text" id="pseudo" name="pseudo" pattern=".{6,}" required class="inscription-pseudo" title="Le pseudo doit comporter minimum 6 caractères" />
            <br />
            <label>Mot de passe :</label>
            <br />
            <input type="text" id="mdp" name="mdp" class="inscription-mdp" pattern=".{6,}" required title="Le mot de passe doit comporter minimum 6 caractères" />
            <br />
            <label>Mail :</label>
            <br />
            <input type="text" id="mail" name="mail" class="inscription-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Saisissez une adresse email valide" required/>
            <div class="btn-popup">
                <hr>
                <button class="btn btn-success btn-connecter" name="inscription" id="btn-connecter">Valider</button>
            </div>
        </form>
    </div>