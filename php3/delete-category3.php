<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection3.php');

    if (isset($_GET['id'])){

        $id=$_GET['id'];

        if(empty($id)) {
            $em = "Eroare";
            header("Location: ../admin3.php?error=$em");
            exit;
        }else{
            $sql = "DELETE FROM categorii3 WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$id]);

            if($res){
                $sm="Successfully removed !";
                header("Location: ../admin3.php?success=$sm");
                exit;
            } else {
                $em = "Eroare";
                header("Location: ../admin3.php?error=$em");
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