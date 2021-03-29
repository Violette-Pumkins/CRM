<input type="hidden" name="action" value="listeentreprise">

<?php
require('entity/Entreprise.class.php');
    // créer un tb vide
    $r=ControllerEntreprise::afficherListeEntreprise();
    
    $ens=array();
    
    foreach($r as $en){
        // var_dump($en);
        //remplit le tb par mon objet
        $ens[]= new Entreprise($en['id_entreprise'], $en['Nom_entreprise'], $en['Adresse_entreprise'], $en['Tel_entreprise'], $en['Port_entreprise'], $en['Mail_entreprise']);
        
    }
    ?>


    <div class="container-sm">
        
    <a class="btn btn-outline-success add" href="index.php?action=addEn" role="button">Ajouter une entreprise</a>

        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Noms</th>
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
            if(count($ens)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Les jurés se sont échappés...</h4></td>

                </tr>');
                
            }
            foreach($ens as $en){
                
                //utilise le tb comme un tb normal
                echo(' <tr>
                <td>'.$en->getNom_en().'</td>
                <td>'.$en->getAdresse_en().'</td>
                <td>'.$en->getTel_en().'</td>
                <td>'.$en->getPort_en().'</td>
                <td>'.$en->getMail_en().'</td>
                <td>
                    <form action="index.php?action=confirm&url=deleteEntreprise&back=listeentreprise" method="post">
                        <input type="hidden" name="ID_en" value="'.$en->getID_en().'">
                        <input type="hidden" name="action" value="deleteEntreprise">
                        <button type="submit" class="btn btn-outline-danger" name="deleteEntreprise">Supprimer</button>
                    </form>
                </td>
                <td> 
                    <a class="btn btn-outline-warning update" href="index.php?action=updateEntreprise&ID_en='.$en->getId_en().'" role="button">Modifier</a>
                </td>
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>