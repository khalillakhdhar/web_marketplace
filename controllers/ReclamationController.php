<?php
include("../models/crud_reclamation.php");
$ca = new Reclamation();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $ca->deletereclamation($id);

    header("location:..\reclamation.php");
}

echo "ici";