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
                                                <a href="#" class="info">
                                                    <div class="glyphicon glyphicon-ban-circle"></div><span>Bannir l'utilisateur</span></a>
                                        </div>
                                        <!-- IF ($login=$loginAdmin)  { }-->
                                        <div class="bouton-admin">
                                            <a href="#" class="info">
                                                <div class="glyphicon glyphicon-ok-circle"></div><span>Modérer le message</span>
                                            </a>
                                            <a href="#" class="info">
                                                <div class="glyphicon glyphicon-remove-circle"></div><span>Supprimer le message</span>
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
        <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
            </script>
        </form>
    </div>
    </div>

    <?php include('v_footer.php'); ?>