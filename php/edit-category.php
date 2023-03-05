<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection.php');

    if ((isset($_POST['denumire_categorie'])) && (isset($_POST['id_categorie']))){

        $denumire = $_POST['denumire_categorie'];
        $id_cat = $_POST['id_categorie'];

        if (empty($denumire)) {
            $em = "Introduceti denumirea categoriei";
            header("Location: ../edit_categories.php?error=$em&id=$id_cat");
            exit;
        }else{
            $sql = "UPDATE categorii SET denumire=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$denumire, $id_cat]);

            if($res){
                $sm="Successfully updated !";
                header("Location: ../edit_categories.php?success=$sm&id=$id_cat");
                exit;
            }else{
                $em="Unknown error occured !";
                header("Location: ../edit_categories.php?error=$em&id=$id_cat");
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