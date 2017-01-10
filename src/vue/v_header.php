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
                    <a class="navbar-brand" href="../">MyForum.com</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <a href="#?w=500" rel="connexion" class="poplight">
                            <button type="submit" class="btn btn-success">Connexion</button>
                        </a>
                        <a href="#?w=500" rel="inscription" class="poplight">
                            <button type="submit" class="btn btn-warning">Pas encore inscrit ?</button>
                        </a>
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
            <input type="text" id="pseudo" name="pseudo" class="connexion-pseudo" require/>
            <br />
            <label>Mot de passe :</label>
            <br />
            <input type="password" id="mdp" name="mdp" class="connexion-mdp" require />
            <div class="btn-popup">
                <hr>
                <button type="submit"  class="btn btn-success btn-connecter"  name="connexion" id="btn-connecter">Se connecter</button>
            </div>
        </form>
    </div>

    <div id="inscription" class="popup_block">
        <form>
            <label>Mail :</label>
            <br />
            <input type=text id="mail" name="mail"class="inscription-mail" />
            <br />
            <label>Pseudo :</label>
            <br />
            <input type=text id="pseudo" name="pseudo" class="inscription-pseudo" />
            <br />
            <label>Mot de passe :</label>
            <br />
            <input type=text id="mdp" name="mdp" class="inscription-mdp" />
            <div class="btn-popup">
                <hr>
                <button class="btn btn-success btn-connecter"name="inscription"  id="btn-connecter">S'inscrire</button>
            </div>
        </form>
    </div>