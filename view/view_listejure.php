<input type="hidden" name="action" value="listejure">

<?php
require('../entity/Jure.class.php');
require('../controller/ControllerJure.class.php');
require('../controller/BDCRM.class.php');

$r=Controllerjure::afficherListeJure();
    var_dump($r);

    ?>