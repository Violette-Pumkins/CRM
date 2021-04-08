<?php
$nom=NULL;
$ID_en=NULL;
$adresse=NULL;
$tel=NULL;
$port=NULL;
$mail=NULL;


    if(isset($_SESSION['entreprise'])){
        $entreprise=$_SESSION['entreprise'];
        // var_dump($entreprise);
        $nom=$entreprise['Nom_entreprise'];
        $ID_en=$entreprise['id_entreprise'];
        $adresse=$entreprise['Adresse_entreprise'];
        $tel=$entreprise['Tel_entreprise'];
        $port=$entreprise['Port_entreprise'];
        $mail=$entreprise['Mail_entreprise'];
    }
    if (isset($_POST['Nom_en'])) {
        $nom= $_POST['Nom_en'];
    }
    if (isset($_POST['Adresse_entreprise'])) {
        $nom= $_POST['Adresse_entreprise'];
    }
    if (isset($_POST['Tel_entreprise'])) {
        $nom= $_POST['Tel_entreprise'];
    }
    if (isset($_POST['Port_entreprise'])) {
        $nom= $_POST['Port_entreprise'];
    }
    if (isset($_POST['Mail_entreprise'])) {
        $nom= $_POST['Mail_entreprise'];
    }
    



    
?>

    
    <div class="container-xl">
        <div class="row">
            <div class="col-md">
            <?php
            if(isset($_SESSION['Erreur'])){ ?>
                <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['Erreur'] ?>
            </div>
            <?php 
                unset($_SESSION['Erreur']);
            }
            ?>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ENTREPRISE</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    
                    <?php
                    if (isset($_SESSION['entreprise'])) {
                        echo '<form action="index.php?action=updateEntreprise"';
                    }
                    else{
                        echo '<form action="index.php?action=addEn"';
                    }
                        ?>
                    method="POST">
                    <?php
                    if (isset($_SESSION['entreprise'])) {
                        echo ' <input type="hidden" name="ID_en" value="'.$ID_en.'">';
                    }
                        ?>
                            <tr>
                            
                                <div class="input-group has-validation">
                                    <td><label for="Nom_en">Nom entreprise:</label></td>
                                <td> <input type="text" class="form-control <?php
                                if(isset($_POST['Nom_en'])){
                                    if(ControllerEntreprise::checkentreprise($_POST['Nom_en']) ){
                                        echo "is-invalid";
                                    }
                                    else{
                                        echo "is-valid";
                                    }
                                    
                                }
                                ?>" name="Nom_en" id="inputnom_en"  value="<?php
                                if (isset($nom)) {
                                    echo $nom;
                                }
                                
                                
                                ?> " required>
                                    <div class="invalid-feedback">
                                        Le nom d'entreprise n'est pas correct.
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="Adresse_en">Adresse entreprise:</label></td>
                            <td> <input type="text" class="form-control" name="Adresse_en" id="inputAdresse_en"  value="<?php
                            if(isset($adresse)){
                                echo $adresse;
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    L'adresse d'entreprise n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="Tel_en">Téléphone entreprise:</label></td>
                            <td> <input type="Text" class="form-control <?php
                            if(isset($_POST['Tel_en'])){
                                if(!ControllerEntreprise::validateNumber($_POST['Tel_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Tel_en" id="inputTel_en"  value="<?php
                            if(isset($tel)){
                                echo $tel;
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Le numéro de téléphone d'entreprise n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="Port_en">Portable entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['Port_en'])){
                                if(!ControllerEntreprise::validateNumber($_POST['Port_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Port_en" id="inputPort_en"  value="<?php
                            if(isset($port)){
                                echo $port;
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Le numéro de portable d'entreprise n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="Mail_en">Mail entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['Mail_en'])){
                                if(ControllerEntreprise::checkentreprise($_POST['Mail_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Mail_en" id="inputmail_en"  value="<?php
                            if(isset($mail)){
                                echo $mail;
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Le mail d'entreprise n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr>
                            <td>
                                <input type="hidden" name="action" value="addEn">
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="add" value="add" class="btn btn-outline-success">Validez</button>
                                </td>
                                <td>
                                <input type="hidden" name="action" value="updateEntreprise">
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
        </form>
    </div>