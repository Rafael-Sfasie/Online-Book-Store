<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection.php');

    if (isset($_POST["denumire_categorie"])) {

        $denumire = $_POST["denumire_categorie"];

        if (empty($denumire)) {
            $em = "Introduceti denumirea categoriei";
            header("Location: ../add_categories.php?error=$em");
            exit;
        }else{
            $sql = "INSERT INTO categorii (denumire) VALUES ('$denumire')";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$denumire]);

            if($res){
                $sm="Succesfully created !";
                header("Location: ../add_categories.php?success=$sm");
                exit;
            }else{
                $em="Unknown error occured !";
                header("Location: ../add_categories.php?error=$em");
                exit;
            }
        }

    }else{
        header("Location: ../admin.php");
        exit; 
    }

}else{
    header("Location: ../login.php");
    exit;
}
?>