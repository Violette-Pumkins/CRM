

    
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
                    <form action="index.php?action=addEn" method="POST">
                            <tr>
                            
                                <div class="input-group has-validation">
                                    <td><label for="Nom_en">Nom entreprise:</label></td>
                                <td> <input type="text" class="form-control <?php
                                if(isset($_POST['Nom_en'])){
                                    if(!ControllerEntreprise::validateField($_POST['Nom_en']) ){
                                        echo "is-invalid";
                                    }
                                    else{
                                        echo "is-valid";
                                    }
                                    
                                }
                                ?>" name="Nom_en" id="inputnom_en"  value="<?php
                                if (isset($_POST['Nom_en'])) {
                                    echo $_POST['Nom_en'];
                                }
                                ?>" required>
                                    <div class="invalid-feedback">
                                        Le nom d'entreprise n'est pas correct.
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="Adresse_en">Adresse entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['Adresse_en'])){
                                if(!ControllerEntreprise::validateField($_POST['Adresse_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Adresse_en" id="inputAdresse_en"  value="<?php
                            if(isset($_POST['Adresse_en'])){
                                echo $_POST['Adresse_en'];
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
                                if(!ControllerEntreprise::validateField($_POST['Tel_en'])or !ControllerEntreprise::validateNumber($_POST['Tel_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Tel_en" id="inputTel_en"  value="<?php
                            if(isset($_POST['Tel_en'])){
                                echo $_POST['Tel_en'];
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
                                if(!ControllerEntreprise::validateField($_POST['Port_en'])or !ControllerEntreprise::validateNumber($_POST['Port_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Port_en" id="inputPort_en"  value="<?php
                            if(isset($_POST['Port_en'])){
                                echo $_POST['Port_en'];
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
                                if(!ControllerEntreprise::validateField($_POST['Mail_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="Mail_en" id="inputmail_en"  value="<?php
                            if(isset($_POST['Mail_en'])){
                                echo $_POST['Mail_en'];
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
                            </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
        </form>
    </div>