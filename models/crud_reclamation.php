<?php
class Reclamation
{
    function addreclamation($titre, $texte)
    {
        try {
            include('../config/connect.php');
            $sql = "INSERT INTO `reclamation`(`titre`, `texte`, `date`) VALUES ('" . $titre . "','" . $texte . "')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function deletereclamation($id)
    {
        try {
            include('../config/connect.php');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM reclamation WHERE id='" . $id . "'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function list_reclamations()
    {

        $servername = "localhost";
        $reclamationname = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $reclamationname, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * from reclamation";
        $result = $conn->query($sql);
        return $result;
    }
}