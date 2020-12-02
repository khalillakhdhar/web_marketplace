<?php
session_start();
include("../models/crud_produit.php");
$targetDir = "../products/";
$statusMsg = "ok";
$fileName = basename($_FILES["photo"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$pr = new Produit();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $ca->deleteproduit($id);

    header("location:..\articles.php");
}
if (isset($_POST['titre'])) {

    // Upload file to server
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
        // Insert image file name into database

        $titre = $_POST["titre"];
        $photo = "products/" . $fileName;
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $id_user = $_SESSION["id"];
        $categorie = $_POST["categorie"];
        $pr->addproduit($titre, $photo, $description, $prix, $id_user, $categorie);
    } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
}

echo $statusMsg;