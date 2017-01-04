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
        
        while ($i<$nombredemessage) { ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <div class="user">
                                        <div class="userimg"></div>
                                        <div class="usertext">Titre sujet
                                            <br />User
                                            <?php echo $i;?>
                                                <!-- IF ($login=$loginAdmin)  { }-->
                                                <a href="#?w=500" rel="bannir_utilisateur" class="info poplight">
                                                    <div class="glyphicon glyphicon-ban-circle"></div><span><b>Bannir l'utilisateur</b></span></a>
                                        </div>
                                        <!-- IF ($login=$loginAdmin)  { }-->
                                        <div class="bouton-admin">
                                            <a href="#" class="info">
                                                <div class="glyphicon glyphicon-edit"></div><span><b>Modérer le message</b></span>
                                            </a>
                                            <a href="#" class="info">
                                                <div class="glyphicon glyphicon-remove-circle"></div><span><b>Supprimer le message</b></span>
                                            </a>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php $i++;
        } ?>
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
    </div>

    <div id="bannir_utilisateur" class="popup_block">
        <form>
            <label>Pour bannir cet utilisateur veuillez renseigner votre mot de passe</label>
            <input type=text id="mdp" class="bannir-mdp" />
            <hr>
            <div class="btn-popup">
                <button class="btn btn-danger btn-confirmer" id="btn-bannir">Bannir</button>
            </div>
        </form>
    </div>

    <?php include('v_footer.php'); ?>