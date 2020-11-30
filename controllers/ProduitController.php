<?php
session_start();
include("../models/crud_produit.php");

$ca = new Produit();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $ca->deleteproduit($id);

    header("location:..\articles.php");
}
if (isset($_POST["titre"])) {
    $titre = $_POST["titre"];
    $photo = $_POST["photo"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $id_user = $_SESSION["id"];
    $categorie = $_POST["categorie"];
    $ca->addproduit($titre, $photo, $description, $prix, $id_user, $categorie);
    echo $titre;
    header("location:..\categorie.php");
}
echo "ici";