<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection.php');

    if ((isset($_POST['nume_autor'])) && (isset($_POST['id_autor']))){

        $nume = $_POST['nume_autor'];
        $id_aut = $_POST['id_autor'];

        if (empty($nume)) {
            $em = "Introduceti numele autorului";
            header("Location: ../edit_authors.php?error=$em&id=$id_aut");
            exit;
        }else{
            $sql = "UPDATE autori SET nume=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$nume, $id_aut]);

            if($res){
                $sm="Successfully updated !";
                header("Location: ../edit_authors.php?success=$sm&id=$id_aut");
                exit;
            }else{
                $em="Unknown error occured !";
                header("Location: ../edit_authors.php?error=$em&id=$id_aut");
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