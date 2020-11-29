<?php
//include('./config/connect.php');
include("./models/crud_user.php");
include("./models/crud_categorie.php");
$cr = new Categorie();
$us = new User();
//$us->deleteuser(1);
//$us->adduser("email", "mdp", "nom", "telephone", "adresse", "grade");
//$cr->addcategorie("bijoux");
$x = $us->list_users();
$cnn=$us->connect("email","mdp");

?><?php
    if ($x->num_rows > 0) {
    ?>
<table>
    <tr>
        <td>nom</td>
    </tr>
    <?php

        while ($row = $x->fetch_assoc()) {
    ?>
    <tr>
        <td><?= $row["nom"] ?></td>
    </tr>
    <?php }
    }
?>
<?= $cnn; ?>
</table>