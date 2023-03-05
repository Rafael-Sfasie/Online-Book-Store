<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection3.php');

    if (isset($_POST["denumire_categorie"])) {

        $denumire = $_POST["denumire_categorie"];

        if (empty($denumire)) {
            $em = "Introduceti denumirea categoriei";
            header("Location: ../add_categories2.php?error=$em");
            exit;
        }else{
            $sql = "INSERT INTO categorii3 (denumire) VALUES ('$denumire')";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$denumire]);

            if($res){
                $sm="Succesfully created !";
                header("Location: ../add_categories3.php?success=$sm");
                exit;
            }else{
                $em="Unknown error occured !";
                header("Location: ../add_categories3.php?error=$em");
                exit;
            }
        }

    }else{
        header("Location: ../admin3.php");
        exit; 
    }

}else{
    header("Location: ../login.php");
    exit;
}
?>