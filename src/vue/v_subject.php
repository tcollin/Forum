
<?php include('v_header.php'); ?>

<div class="container">

    <a href="../">
        <button class="btn btn-success">Retour</button>
    </a>

    <hr>

    <main>
        <?php 
        $nombredemessage = 5;
        $i = 1;

        /* while ($i<$nombredemessage) {*/ 
        foreach ($posts as $post) {
            $user = $post['personne_pseudo'];?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="header-post">
                            <div class="user">
                                <div class="userimg"></div>
                                <div class="usertext">
                                    <?php echo $post['sujet_titre'];?>
                                    <br />
                                    <?php echo $post['personne_pseudo']; 
            if (isset($_SESSION["role"])&&($_SESSION["role"]==1||$_SESSION["role"]==3)) { ?>
                                    <a href="#?w=500" rel="bannir_utilisateur" class="info poplight">
                                        <div class="glyphicon glyphicon-ban-circle"></div><span><b>Bannir <?php echo $post['personne_pseudo'] ?></b></span></a>
                                </div>
                                <div class="bouton-admin">
                                    <a href="#" class="info" onclick="messageEdit(<?php echo $i ?>)">
                                        <div class="glyphicon glyphicon-edit"></div><span><b>Modérer le message</b></span>
                                    </a>
                                    <a href="#?w=500" rel="supprimer_message" class="info poplight">
                                        <div class="glyphicon glyphicon-remove-circle"></div><span><b>Supprimer le message</b></span>
                                    </a>
                                </div>
                                <?php }?>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p id="message<?php echo $i ?>">
                                <?php echo $post['post_texte']; ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="postdate">
                            <div>
                                <?php echo $post['post_date'];?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php $i++;
        }?>
    </main>
    <hr>
    <button class="btn btn-success btn-reponse" id="btn-reponse" onclick="afficherForm();">Répondre
        <div class="glyphicon glyphicon-share-alt"></div>
    </button>
    <form class="form-reponse" id="form-reponse">
        <textarea name="editor1" id="editor1" rows="5" cols="80">
        </textarea>
        <script>
            CKEDITOR.replace('editor1');
        </script>
        <button class="btn btn-success btn-annuler" id="btn-annuler" onclick="cacherForm();">Annuler</button>
        <button class="btn btn-success btn-envoyer" id="btn-envoyer" onclick="cacherForm();">Envoyer</button>
    </form>
</div>

<div id="bannir_utilisateur" class="popup_block">
    <form method='post' action='bannir_user'>
        <label>Vous allez bannir <?php echo $user; ?></label>
        <hr>
        <div class="btn-popup">
            <button class="btn btn-danger btn-confirmer" id="btn-bannir">Confirmer</button>
        </div>
    </form>
</div>

<div id="supprimer_message" class="popup_block">
    <form>
        <label>Souhaitez-vous vraiment supprimer ce message ?</label>
        <div class="btn-popup">
            <button class="btn btn-success btn-annuler" id="btn-annuler">Non</button>
            <button class="btn btn-success btn-confirmer" id="btn-confirmer">Oui</button>
        </div>
    </form>
</div>

<?php include('v_footer.php'); ?>