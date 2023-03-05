<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection3.php');

    if (isset($_POST['nume_autor'])) {

        $nume = $_POST['nume_autor'];

        if (empty($nume)) {
            $em = "Introduceti numele autorului";
            header("Location: ../add_authors3.php?error=$em");
            exit;
        }else{
            $sql = "INSERT INTO autori3 (nume) VALUES ('$nume')";          
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$nume]);

            if($res){
                $sm="Succesfully created !";
                header("Location: ../add_authors3.php?success=$sm");
                exit;
            }else{
                $em="Unknown error occured !";
                header("Location: ../add_authors3.php?error=$em");
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