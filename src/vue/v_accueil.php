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
                                            <div class="glyphicon glyphicon-ok-circle"></div><span>Résoudre le sujet</span>
                                        </a>
                                        <a href="#" class="info">
                                            <div class="glyphicon glyphicon-remove-circle"></div><span>Supprimer le sujet</span>
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

    <?php include('v_footer.php'); ?>