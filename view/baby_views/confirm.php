    <?php
    /**
     * dialogue de confirmation prend 3 paramètres
     * le message peut etre changé avec la session confirm text
     * action est defini par url (la ou on veut si confirmé) et back la ou on retourne si annulé
     * exemple:<a href="index.php?action=confirm&url=valider&back=retour"/>
     * affichera la page de confirmations clique sur valider redirigera vers index.php?action=valider
     * autrement clqiue sur retour redirigera vers index.php?action=retour.
     * 
     *  possible de poster des param depuis formulaire. si formumlaire a action=confirm, valeurs post recupérée et exécutée que si confirmer.
     * exemple: <form action="index.php?action=confirm&url=deleteJure&back=listejure" method="post">
     *                 <input type="hidden" name="ID_Jure" value="'.$jure->getID_Jure().'">
     *                 <input type="hidden" name="action" value="deleteJure">
     *                 <button type="submit" class="btn btn-outline-danger" name="deleteJure">TUER</button>
     *             </form>
     */
    ?>
    
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
                <p><?php
                    if(isset($_SESSION['confirm_text'])){
                        echo $_SESSION['confirm_text'];
                    }else{
                        echo "Confirmer l'action";
                    }
                ?></p>
            </div>
            <div class="modal-footer">
                <form action="index.php?action=<?php 
                    echo $_GET['url'];
                    ?>" method="post">
                    <?php
                    foreach($_POST as $name=>$val){
                        echo '<input type="hidden" name="'.$name.'" value="'.$val.'">';
                    }
                    ?>
                    <input type="submit" class="btn btn-success" value="confirmez" name="confirmer"/>
                </form>
                <form action="index.php" method="get">
                <input type="hidden" name="action" value="<?php 
                    if(isset( $_GET['back'])){
                    echo $_GET['back'];}
                    ?>">
                        <input type="submit" class="btn btn-danger" value="annulez"/>
                </form>
            </div>
            </div>
        </div>
    </div>