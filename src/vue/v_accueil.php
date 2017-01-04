<?php include('v_header.php'); ?>

    <div class="container">
        <div class="title">Bienvenue sur le forum !</div>
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
            $nombredesujet = 5;
            $i = 1;
        
        while ($i<$nombredesujet) { ?>
                            <tr>
                                <td><b><a href="subject/">Titre du sujet - id numéro
                                            <?php echo $i;?></a></b>
                                    <!-- IF ($login=$loginAdmin)  { }-->
                                    <div class="bouton-admin">
                                        <a href="#" class="info">
                                            <div class="glyphicon glyphicon-ok-circle"></div><span><b>Résoudre le sujet</b></span>
                                        </a>
                                        <a href="#?w=500" rel="popup_name" class="info poplight">
                                            <div class="glyphicon glyphicon-remove-circle"></div><span><b>Supprimer le sujet</b></span>
                                        </a>
                                    </div>
                                </td>
                                <td><a href="#">Catégorie <?php echo $i;?></a></td>
                            </tr>
                            <?php $i++;
        } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    </div>


    <div id="popup_name" class="popup_block">
        <form>
            <label>Souhaitez-vous vraiment supprimer ce sujet ?</label>
            <div class="btn-popup">
                <button class="btn btn-success btn-annuler" id="btn-annuler">Non</button>
                <button class="btn btn-success btn-confirmer" id="btn-confirmer">Oui</button>
            </div>
        </form>
    </div>


    <?php include('v_footer.php'); ?>