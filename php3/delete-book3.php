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
            $sql2 = "SELECT * FROM carti3";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$id]);
            $the_book = $stmt2->fetch();

            if ($stmt2->rowCount() > 0){
            $sql = "DELETE FROM carti3 WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$id]);

            if($res){
                $cover = $the_book['Coperta'];
                $c_b_c = "../descarcate/web/$cover";

                unlink($c_b_c);

                $sm="Successfully removed !";
                header("Location: ../admin3.php?success=$sm");
                exit;
                }else{
                    $em="Unknown error occured !";
                    header("Location: ../admin3.php?error=$em");
                    exit;
                }
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