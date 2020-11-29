<?php
class User
{
    function adduser($email, $mdp, $nom, $tel, $adresse, $grade)
    {
        try {
            include('./config/connect.php');
            $sql = "INSERT INTO `user`( `email`, `mdp`, `nom`, `telephone`, `adresse`, `grade`) VALUES ($email, $mdp, $nom,$tel,$adresse,$grade)";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}