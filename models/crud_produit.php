<?php
class Produit
{
    function addproduit($titre, $photo, $description, $prix, $id_user, $categorie)
    {
        try {
            include('../config/connect.php');
            $sql = "INSERT INTO `produit`(`titre`, `photo`, `description`, `prix`, `id_user`, `categorie`) VALUES ('" . $titre . "','" . $photo . "','" . $description . "','" . $prix . "','" . $id_user . "','" . $categorie . "')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function deleteproduit($id)
    {
        try {
            include('../config/connect.php');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM produit WHERE id='" . $id . "'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function count()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(id) FROM produit";
        $result = $conn->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }
    function list_produits()
    {

        $servername = "localhost";
        $produitname = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $produitname, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produit";
        $result = $conn->query($sql);
        return $result;
    }
    function list_mesproduits()
    {

        $servername = "localhost";
        $produitname = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $produitname, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produit WHERE id_user='" . $_SESSION['id'] . "'";
        $result = $conn->query($sql);
        return $result;
    }
    function list_produitscat($categorie)
    {

        $servername = "localhost";
        $produitname = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $produitname, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produit WHERE categorie='" . $categorie . "'";
        $result = $conn->query($sql);
        return $result;
    }
}