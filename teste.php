<?php
//include('./config/connect.php');
include("crud_user.php");
$us = new User();
$us->deleteuser(1);
//$us->adduser("email", "mdp", "nom", "telephone", "adresse", "grade");
$x = $us->list_users();
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
</table>