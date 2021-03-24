
    <div class="container-xl">
        <div class="row">
            <div class="col-md">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ENTREPRISE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="index.php?action=addEn" method="post">
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
                                if(isset($_POST['Nom_en'])){
                                    echo $_POST['Nom_en'];
                                }?>" required>
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
                                <td><label for="tel_en">Téléphone entreprise:</label></td>
                            <td> <input type="text" class="form-control <?php
                            if(isset($_POST['tel_en'])){
                                if(!ControllerEntreprise::validateField($_POST['tel_en'])or !ControllerEntreprise::validateNumber($_POST['tel_en'])){
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
                                if(!ControllerEntreprise::validateField($_POST['port_en'])or !ControllerEntreprise::validateNumber($_POST['port_en'])){
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
                                if(!ControllerEntreprise::validateField($_POST['mail_en'])){
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
                                <input type="hidden" name="action" value="addEn">
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