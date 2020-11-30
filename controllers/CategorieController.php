<?php
include("../models/crud_categorie.php");
$ca = new Categorie();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $ca->deletecategorie($id);

    header("location:..\categorie.php");
}
if (isset($_POST["titre"])) {
    $titre = $_POST["titre"];
    $ca->addcategorie($titre);
    echo $titre;
    header("location:..\categorie.php");
}
echo "ici";