<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MyForum.com</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js dfor IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">MyForum.com</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Mot de passe" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Connexion</button>
                    <button type="submit" class="btn btn-warning">Pas encore inscrit ?</button>
                </form>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <h4>Sujet</h4></th>
                        <th>
                            <h4>Catégorie</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b><a href="#">Mon téléviseur ne s'allume plus</a></b></td>
                        <td><a href="#">Téléviseur</a></td>
                    </tr>
                    <tr>
                        <td><b><a href="#">Quel forfait téléphone choisir ?</a></b></td>
                        <td><a href="#">Téléphone</a></td>
                    </tr>
                    <tr>
                        <td><b><a href="#">Quel smartphone choisir ?</a></b></td>
                        <td><a href="#">Téléphone</a>, <a href="#">Mobile</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>