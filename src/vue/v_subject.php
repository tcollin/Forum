
<?php include('v_header.php'); ?>

<div class="container">

    <a href="/Forum/return">
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
                                    <?php if ($post['role_id']==0) {
                                                echo "<i>Utilisateur banni.</i>";
                                        } 
                                        else {
                                                echo $post['personne_pseudo']; ?>
                                                <a href="#?w=500" rel="bannir_utilisateur_<?php echo $i ?>" class="info poplight">
                                                <div class="glyphicon glyphicon-ban-circle"></div><span><b>Bannir <?php echo $post['personne_pseudo'] ?></b></span></a>
                                    <?php
                                        }         
                                    if (isset($_SESSION["role"])&&($_SESSION["role"]==1||$_SESSION["role"]==3)) { ?>            
                                </div>
                                <div class="bouton-admin">
                                    <a href="#" class="info" onclick="afficherFormPost(<?php echo $i ?>);">
                                        <div class="glyphicon glyphicon-edit"></div><span><b>Modérer le message</b></span>
                                    </a>
                                    <a href="#?w=500" rel="supprimer_message_<?php echo $i ?>" class="info poplight">
                                        <div class="glyphicon glyphicon-remove-circle"></div><span><b>Supprimer le message</b></span>
                                    </a>
                                </div>
                                <div id="supprimer_message_<?php echo $i ?>" class="popup_block">
                                    <label>Souhaitez-vous vraiment supprimer ce message ?</label>
                                    <div class="btn-popup">
                                        <a href="/subject/<?php echo $post['sujet_id']?>">
                                            <button class="btn btn-success btn-annuler" id="btn-annuler">Non</button>
                                        </a>
                                        <a href="../subject/<?php echo $post['sujet_id']?>/<?php echo $post['post_date']?>">
                                            <button class="btn btn-success btn-confirmer" id="btn-confirmer">Oui</button>
                                        </a>
                                    </div>
                                </div>
                                <div id="bannir_utilisateur_<?php echo $i ?>" class="popup_block">
                                    <label>Vous allez bannir <?php echo $user; ?></label>
                                    <hr>
                                    <div class="btn-popup">
                                        <a href="../subject/banuser/<?php echo $post['personne_pseudo']?>/<?php echo $post['sujet_id']?>">
                                            <button class="btn btn-danger btn-confirmer" id="btn-bannir">Confirmer</button>
                                        </a>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                           <form name='form-post' id='form-post-<?php echo $i ?>' class='form-post' method="post" action="../subject/moderate/<?php echo $post['sujet_id']?>/<?php echo $post['post_date']?>">
                               <textarea name='content' rows=5 style="width:100%"><?php echo $post['post_texte']; ?></textarea>
                               <button>Ok</button>
                           </form>
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
        <?php $idsujet = $post['sujet_id'];
            $i++;
        }?>
    </main>
    <hr>
    <button class="btn btn-success btn-reponse" id="btn-reponse" onclick="afficherForm();">Répondre
        <div class="glyphicon glyphicon-share-alt"></div>
    </button>
    <form class="form-reponse" method="post" id="form-reponse" action="../subject/addpost/<?php echo $idsujet ?>">
        <textarea name="editor1" id="editor1" rows="5" cols="80">
        </textarea>
        <script>
            CKEDITOR.replace('editor1');
        </script>
        <button class="btn btn-success btn-annuler" id="btn-annuler" onclick="cacherForm();">Annuler</button>
        <button class="btn btn-success btn-envoyer" id="btn-envoyer" onclick="cacherForm();">Envoyer</button>
    </form>
</div> 

<?php include('v_footer.php'); ?>