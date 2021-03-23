
    
    <div class="container-xl">
        <div class="row">
            <div class="col-md">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">JURE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="index.php?action=addJure" method="post">
                            <tr>
                            
                                <div class="input-group has-validation">
                                    <td><label for="nom">Nom:</label></td>
                                <td> <input type="text" class="form-control <?php
                                if(isset($_POST['nom'])){
                                    if(!ControllerJure::validateField($_POST['nom']) ){
                                        echo "is-invalid";
                                    }
                                    else{
                                        echo "is-valid";
                                    }
                                    
                                }
                                ?>" name="nom" id="inputnom"  value="<?php
                                if(isset($_POST['nom'])){
                                    echo $_POST['nom'];
                                }
                                ?>" required>
                                    <div class="invalid-feedback">
                                        Votre nom n'est pas correct.
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            
                                <div class="input-group has-validation">
                                    <td><label for="prenom">Prénom:</label></td>
                                <td> <input type="text" class="form-control <?php
                                if(isset($_POST['prenom'])){
                                    if(!ControllerJure::validateField($_POST['prenom'])){
                                        echo "is-invalid";
                                    }
                                    else{
                                        echo "is-valid";
                                    }
                                    
                                }
                                ?>" name="prenom" id="inputprenom"  value="<?php
                                if(isset($_POST['prenom'])){
                                    echo $_POST['prenom'];
                                }
                                ?>" required>
                                    <div class="invalid-feedback">
                                        Votre prénom n'est pas correct.
                                    </div>
                                    </div>
                                </td>
                            </tr> 
                            <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="adresse">Adresse:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['adresse'])){
                                if(!ControllerJure::validateField($_POST['adresse'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="adresse" id="inputadresse"  value="<?php
                            if(isset($_POST['adresse'])){
                                echo $_POST['adresse'];
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Votre adresse n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="tel">Téléphone:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['tel'])){
                                if(!ControllerJure::validateField($_POST['tel']) or !ControllerJure::validateNumber($_POST['tel'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="tel" id="inputtel"  value="<?php
                            if(isset($_POST['tel'])){
                                echo $_POST['tel'];
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Votre numéro de téléphone n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="port">Portable:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['port'])){
                                if(!ControllerJure::validateField($_POST['port'])or !ControllerJure::validateNumber($_POST['port'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="port" id="inputport"  value="<?php
                            if(isset($_POST['port'])){
                                echo $_POST['port'];
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Votre numéro de portable n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            
                            <div class="input-group has-validation">
                                <td><label for="mail">Mail:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['mail'])){
                                if(!ControllerJure::validateField($_POST['mail'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="mail" id="inputmail"  value="<?php
                            if(isset($_POST['mail'])){
                                echo $_POST['mail'];
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Votre adresse mail n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr>
                                <td> <label for="v-v">Visible sur vales:</label></td>
                                <td> <input type="checkbox" name="vv" style="height:25px; width:25px;"> <br><br>
                                </td>
                            </tr>
                                <td> <label for="v-c">Visible sur ceres:</label></td>
                                <td> <input type="checkbox" name="vc" style="height:25px; width:25px;"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="action" value="<?php echo $action ?>">
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ENTREPRISE</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                            
                                <div class="input-group has-validation">
                                    <td><label for="nom_en">Nom entreprise:</label></td>
                                <td> <input type="text" class="form-control <?php
                                if(isset($_POST['nom_en'])){
                                    if(!ControllerJure::validateField($_POST['nom_en']) ){
                                        echo "is-invalid";
                                    }
                                    else{
                                        echo "is-valid";
                                    }
                                    
                                }
                                ?>" name="nom_en" id="inputnom_en"  value="<?php
                                if(isset($_POST['nom_en'])){
                                    echo $_POST['nom_en'];
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
                                <td><label for="adresse_en">Adresse entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['adresse_en'])){
                                if(!ControllerJure::validateField($_POST['adresse_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="adresse_en" id="inputadresse_en"  value="<?php
                            if(isset($_POST['adresse_en'])){
                                echo $_POST['adresse_en'];
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
                                <td><label for="tel_en">Téléphone entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['tel_en'])){
                                if(!ControllerJure::validateField($_POST['tel_en'])or !ControllerJure::validateNumber($_POST['tel_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="tel_en" id="inputtel_en"  value="<?php
                            if(isset($_POST['tel_en'])){
                                echo $_POST['tel_en'];
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
                                <td><label for="port_en">Portable entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['port_en'])){
                                if(!ControllerJure::validateField($_POST['port_en'])or !ControllerJure::validateNumber($_POST['port_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="port_en" id="inputport_en"  value="<?php
                            if(isset($_POST['port_en'])){
                                echo $_POST['port_en'];
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
                                <td><label for="mail_en">Mail entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['mail_en'])){
                                if(!ControllerJure::validateField($_POST['mail_en'])){
                                    echo "is-invalid";
                                }
                                else{
                                    echo "is-valid";
                                }
                                
                            }
                            ?>" name="mail_en" id="inputmail_en"  value="<?php
                            if(isset($_POST['mail_en'])){
                                echo $_POST['mail_en'];
                            }
                            ?>" required>
                                <div class="invalid-feedback">
                                    Le mail d'entreprise n'est pas correct.
                                </div>
                                </div>
                            </td>
                        </tr>
                            <td>
                                <input type="hidden" name="action" value="<?php echo $action ?>">
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="add" value="add" class="btn btn-outline-success">Validez</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>

    </div>