<?php
if(isset($_SESSION['Message'])){?>
    <div class="alert alert-warning" role="alert">
<?php 
    echo $_SESSION['Message'];
    
?>
    </div>
<?php unset($_SESSION['Message']);
}?>
<?php
if(isset($_SESSION['Success'])){?>
    <div class="alert alert-warning" role="alert">
<?php 
    echo $_SESSION['Success'];
?>
    </div>
<?php unset($_SESSION['Success']);
}?>

<?php
    if (isset($_SESSION['Erreur'])) { ?>
        <div class="alert alert-warning" role="alert">
<?php echo $_SESSION['Erreur'] ?>
        </div>
<?php
    unset($_SESSION['Erreur']);
    }
?>