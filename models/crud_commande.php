<?php
class Commande
{
    function addcommande($id_user,$id_produit,$quantite)
    {
        try {
            include('../config/connect.php');
            $sql = "INSERT INTO `commande`( `id_user`, `id_produit`, `quantite`) VALUES ('" . $id_user . "','" . $id_produit . "','" . $quantite . "')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function deletecommande($id)
    {
        try {
            include('../config/connect.php');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM commande WHERE id='" . $id . "'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function list_commandes()
    {

        $servername = "localhost";
        $commandename = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $commandename, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT quantite,date,etat,user.email,user.id,user.nom,user.telephone,user.adresse,produit.prix,produit.description,produit.categorie,produit.id_user,produit.titre FROM `commande` ,produit ,user WHERE produit.id=commande.id_produit AND user.id=commande.id_user";
        $result = $conn->query($sql);
        return $result;
    }
}