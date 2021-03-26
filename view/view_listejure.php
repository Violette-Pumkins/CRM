<input type="hidden" name="action" value="listejure">

<?php
require('entity/Jure.class.php');

    $r=Controllerjure::afficherListeJure();
    
    // créer un tb vide
    $jures=array();
    foreach($r as $jure){
        //remplit le tb par mon objet
        $jures[]= new Jure($jure['ID_Jure'], $jure['Nom'], $jure['Prenom'], $jure['Adresse_perso'], $jure['Tel_perso'], $jure['Portable_perso'], $jure['Mail_perso']);
    // var_dump($jure);
    }
    ?>
    <div class="container-sm">
        
    <a class="btn btn-outline-success add" href="index.php?action=addJure" role="button">Ajouter un juré</a>

        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Noms</th>
                <th scope="col">Prenom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Portable</th>
                <th scope="col">Adresse Mail</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($jures)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Les jurés se sont échappés...</h4></td>

                </tr>');
                
            }
            foreach($jures as $jure){
                
                //utilise le tb comme un tb normal
                echo(' <tr>
                <td>'.$jure->getNom().'</td>
                <td>'.$jure->getPrenom().'</td>
                <td>'.$jure->getAdresse_perso().'</td>
                <td>'.$jure->getTel_perso().'</td>
                <td>'.$jure->getPortable_perso().'</td>
                <td>'.$jure->getMail_perso().'</td>
                <td>
                    <form action="index.php?action=confirm&url=deleteJure&back=listejure" method="post">
                        <input type="hidden" name="ID_Jure" value="'.$jure->getID_Jure().'">
                        <input type="hidden" name="action" value="deleteJure">
                        <button type="submit" class="btn btn-outline-danger" name="deleteJure">TUER</button>
                    </form>
                </td>
                <td>
                <form action="index.php?action=confirm&url=updateJure&back=listejure" method="post">
                    <input type="hidden" name="ID_Jure" value="'.$jure->getID_Jure().'">
                    <input type="hidden" name="action" value="updateJure">
                    <button type="submit" class="btn btn-outline-warning" name="updateJure">Cyborger</button>
                </form>
            </td>
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>