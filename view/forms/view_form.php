<?php
require('entity/Entreprise.class.php');


$r = ControllerEntreprise::afficherListeEntreprise();

$ens = array();

foreach ($r as $en) {
    // var_dump($en);
    //remplit le tb par mon objet
    $ens[] = new Entreprise($en['id_entreprise'], $en['Nom_entreprise'], $en['Adresse_entreprise'], $en['Tel_entreprise'], $en['Port_entreprise'], $en['Mail_entreprise']);
}
// var_dump($en);

//update
$ID_Jure = NULL;
$nom = NULL;
$prenom = NULL;
$adresse = NULL;
$tel = NULL;
$port = NULL;
$mail = NULL;
$vv=false;
$vc=false;
$ID_en = NULL;

if (isset($_SESSION['jure'])) {

    $jure = $_SESSION['jure'];
    // var_dump($jure);
    $ID_Jure = $jure['ID_Jure'];
    $nom = $jure['Nom'];
    $prenom = $jure['Prenom'];
    $adresse = $jure['Adresse_perso'];
    $tel = $jure['Tel_perso'];
    $port = $jure['Portable_perso'];
    $mail = $jure['Mail_perso'];
    $ID_en = $jure['id_entreprise'];
    $vv= intval($jure['Visible_sur_VALCE'])==1;
    $vc= intval($jure['Visible_sur_CERES'])==1;
    // var_dump($_POST);
    // var_dump($jure);

    if (isset($_POST['Nom'])) {
        $nom = $_POST['Nom'];
    }
    // var_dump($nom);
    if (isset($_POST['Prenom'])) {
        $prenom = $_POST['Prenom'];
    }
    if (isset($_POST['Adresse_perso'])) {
        $adresse = $_POST['Adresse_perso'];
    }
    if (isset($_POST['Tel_perso'])) {
        $tel = $_POST['Tel_perso'];
    }
    if (isset($_POST['Portable_perso'])) {
        $port = $_POST['Portable_perso'];
    }
    if (isset($_POST['Mail_perso'])) {
        $mail = $_POST['Mail_perso'];
    }
    if (isset($_POST['id_entreprise'])) {
        $ID_en = $_POST['id_entreprise'];
    }
    if (isset($_POST['vv'])) {
        $vv = true;
    }
    if (isset($_POST['vc'])) {
        $vc = true;
    }
}
?>
<div class="container-xl">
    <div class="row">
        <div class="col-md">
            <?php
            if (isset($_SESSION['Erreur'])) { ?>
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
                        <th scope="col">JURE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['jure'])) {
                        echo '<form action="index.php?action=updateJure "';
                    } else {
                        echo '<form action="index.php?action=addJure "';
                    }
                    ?>
                    method="POST">
                    <?php
                    if (isset($_SESSION['jure'])) {
                        echo ' <input type="hidden" name="ID_Jure" value="' . $ID_Jure . '">';
                    }
                    ?>
                    <tr>

                        <div class="input-group has-validation">
                            <td><label for="nom">Nom:</label></td>
                            <td> <input type="text" class="form-control <?php
                                                                        if (isset($_POST['nom'])) {
                                                                                echo "is-valid";
                                                                        }
                                                                        ?>" name="nom" id="inputnom" value="<?php
                                                                    if (isset($nom)) {
                                                                        echo $nom;
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
                                                                        if (isset($_POST['prenom'])) {
                                                                                echo "is-valid";
                                                                        }
                                                                        ?>" name="prenom" id="inputprenom" value="<?php
                                                                            if (isset($prenom)) {
                                                                                echo $prenom;
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
                                                                        if (isset($_POST['adresse'])) {
                                                                                echo "is-valid";
                                                                        }
                                                                        ?>" name="adresse" id="inputadresse" value="<?php
                                                                        if (isset($adresse)) {
                                                                            echo $adresse;
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
                                                                        if (isset($_POST['tel'])) {
                                                                            if (!ControllerJure::validateNumber($_POST['tel'])) {
                                                                                echo "is-invalid";
                                                                            } else {
                                                                                echo "is-valid";
                                                                            }
                                                                        }
                                                                        ?>" name="tel" id="inputtel" value="<?php
                                                                if (isset($tel)) {
                                                                    echo $tel;
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
                                                                        if (isset($_POST['port'])) {
                                                                            if (!ControllerJure::validateNumber($_POST['port'])) {
                                                                                echo "is-invalid";
                                                                            } else {
                                                                                echo "is-valid";
                                                                            }
                                                                        }
                                                                        ?>" name="port" id="inputport" value="<?php
                                                                    if (isset($port)) {
                                                                        echo $port;
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
                                                                        if (isset($_POST['mail'])) {
                                                                            if (ControllerJure::checkjure($_POST['mail'])) {
                                                                                echo "is-invalid";
                                                                            } else {
                                                                                echo "is-valid";
                                                                            }
                                                                        }
                                                                        ?>" name="mail" id="inputmail" value="<?php
                                                                    if (isset($mail)) {
                                                                        echo $mail;
                                                                    }
                                                                    ?>" required>
                                <div class="invalid-feedback">
                                    Votre adresse mail n'est pas correct.
                                </div>
                        </div>
                        </td>
                    </tr>
                    <td> <label for="vv">Visible sur valce:</label></td>
                    <td>
                    <?php 
                        if ($vv) {
                            echo '<input type="checkbox" checked name="vv" style="height:25px; width:25px;"> ';
                        }else{
                            echo '<input type="checkbox" name="vv" style="height:25px; width:25px;"> ';
                        }
                    ?>
                    <br><br>
                    </td>
                    </tr>
                    <td> <label for="vc">Visible sur ceres:</label></td>
                    <td> 
                    <?php 
                        if ($vc) {
                            echo '<input type="checkbox" checked name="vc" style="height:25px; width:25px;"> ';
                        }else{
                            echo '<input type="checkbox" name="vc" style="height:25px; width:25px;"> ';
                        }
                    ?>
                    <br><br>
                    </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Selectionnez une entreprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control form-control-lg" name="ID_en" id="ID_en">
                                <?php foreach ($ens as $en) {
                                        if(isset($ID_en) and  intval($en->getID_en())==intval($ID_en)){
                                            echo ('<option selected value="' . $en->getID_en() . '">' . $en->getNom_en() . '</option>');
                                        } else{

                                            echo('<option value="' . $en->getID_en() . '">' . $en->getNom_en() . '</option>');
                                        }
                                } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="index.php?action=addEn" class="btn btn-outline-success" role="button" aria-pressed="true">Ajoutez une entreprise</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="addJure">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="action" value="add" class="btn btn-outline-success">Validez</button>
                        </td>
                        <td>
                            <input type="hidden" name="action" value="updateJure">
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        </form>
    </div>