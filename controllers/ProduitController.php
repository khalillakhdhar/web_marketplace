<?php
session_start();
include("../models/crud_produit.php");
$targetDir = "../products/";

$pr = new Produit();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $pr->deleteproduit($id);

    header("location:..\articles.php");
}
if (isset($_POST['titre'])) {
    $fileName = basename($_FILES["photo"]["name"]);
    $statusMsg = "ok";
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
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
        header('location:../articles.php');
    } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
}

echo $statusMsg;