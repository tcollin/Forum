
<?php include('v_header.php'); ?>

<div class="container">

    <?php

    if (isset($message)){ ?>
    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $message; ?>
    </div>
    <?php
                        }
    if (isset($filtre)){ ?>
    <div class="alert alert-warning">
        <a href="." class="close" data-dismiss="alert">&times;</a>
        <?php echo $filtre; ?>
    </div>
    <?php
                       }
    else { ?>
    <div class="title">Bienvenue sur le forum !</div>
    <?php }
    ?>
    <hr>
    <main>
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
                    <?php
                    foreach ($sujets as $sujet) { ?>
                    <tr>
                        <td><b><a href="subject/<?php echo $sujet['sujet_id'] ?>"><?php echo $sujet['statut_libelle'].$sujet['sujet_titre']?></a></b>
                            <?php if (isset($_SESSION["role"])&&($_SESSION["role"]==1||$_SESSION["role"]==3))  { ?>
                            <div class="bouton-admin">
                                <a href="#?w=500" rel="resoudre_sujet_<?php echo $sujet['sujet_id'] ?>" class="info poplight">
                                    <div class="glyphicon glyphicon-ok-circle"></div><span><b>Résoudre le sujet</b></span>
                                </a>
                                <a href="#?w=500" rel="supprimer_sujet_<?php echo $sujet['sujet_id'] ?>" class="info poplight">
                                    <div class="glyphicon glyphicon-remove-circle"></div><span><b>Supprimer le sujet</b></span>
                                </a>
                            </div>
                            <div id="supprimer_sujet_<?php echo $sujet['sujet_id'] ?>" class="popup_block">
                                <label>Souhaitez-vous vraiment supprimer ce sujet ?</label>
                                <div class="btn-popup">
                                    <a href="/Forum/" class="info poplight">
                                        <button class="btn btn-success btn-annuler" id="btn-annuler">Non</button>
                                    </a>
                                    <a href="delete/<?php echo $sujet['sujet_id']?>">
                                        <button class="btn btn-danger btn-confirmer" id="btn-confirmer">Oui</button>
                                    </a>
                                </div>
                            </div>
                            <div id="resoudre_sujet_<?php echo $sujet['sujet_id'] ?>" class="popup_block">
                                <form method="post" action="resolve/<?php echo $sujet['sujet_id']?>">
                                    <label>Ce sujet est-il résolu ?</label>
                                    <br />
                                    <input type="radio" name="resoudre" value="Oui"> Oui
                                    <input type="radio" class="radio-resoudre" name="resoudre" value="Non" checked> Non
                                    <div class="btn-popup">
                                        <button class="btn btn-success btn-confirmer" id="btn-confirmer">Confirmer</button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo $sujet['categorie_id'] ?>">
                                <?php echo $sujet['categorie_nom'] ?>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <hr>

    <?php if (isset($_SESSION["pseudo"])){ //si visiteur n'est pas connecté, il ne peut pas créer un nouveau sujet ?>
    <button class="btn btn-success btn-sujet" id="btn-sujet" onclick="afficherFormSujet();">Nouveau sujet
        <div class="glyphicon glyphicon-plus"></div>
    </button>
    <?php }  if (isset($_SESSION["pseudo"])&&$_SESSION["role"]==1) { //si visiteur n'est pas connecté et pas admin, il ne peut pas créer une nouvelle catégorie ?>
    <form method="post" action="categorie" class="form-categorie">
        <input type="text" name="newCat" placeholder="Informatique, Matériel, Web ..." size="45"/>
        <button class="btn btn-info" >Ajout catégorie
            <div class="glyphicon glyphicon-plus"></div>
        </button>
      </form>
    <?php } ?>

    <br />
    <form method="post" class="form-sujet" id="form-sujet" action="sujet">
        <label>Titre du sujet :</label>
        <input type=text name="titre-sujet" class="titre-sujet" required />
        <label>Catégorie :</label>
        <select name="id-categorie">
            <?php
            foreach ($categories as $categorie) { ?>
            <option value=<?php echo $categorie['categorie_id']?>>
                <?php echo $categorie['categorie_nom']?>
            </option>
            <?php
                                                } ?>
        </select>
        <textarea name="editor1" id="editor1" rows="5" cols="80">
        </textarea>
        <script>
            CKEDITOR.replace('editor1');
        </script>
        <button class="btn btn-success btn-envoyer" id="btn-envoyer" onclick="cacherFormSujet();">Créer</button>
    </form>
</div>
</div>




<?php include('v_footer.php'); ?>
