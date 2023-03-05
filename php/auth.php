<?php

session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

    include "../db_connection.php";
    
    include "funct-validation.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $text="Email";
    $location="../login.php";
    $ms="error";
    is_empty($email, $text, $location, $ms,"");

    $text="Password";
    $location="../login.php";
    $ms="error";
    is_empty($password, $text, $location, $ms,"");

    $sql = "SELECT * FROM admin WHERE email=?";

    $stm = $conn->prepare($sql);
    $stm->execute([$email]);

    if($stm->rowCount() == 1){
        $user = $stm -> fetch();

        $user_id = $user['id'];
        $user_email = $user['email'];
        $user_password = $user['password'];
        if($email === $user_email){
            if(password_verify($password, $user_password)){
                $_SESSION['user_id']=$user_id;
                $_SESSION['user_email']=$user_email;
                header("Location: ../admin.php");
                

            }else{
                $em = "Incorrect User name or password";
                header("Location: ../login.php?error=$em");
            }

        }else{
            $em = "Incorrect User name or password";
            header("Location: ../login.php?error=$em");
        }
    }else{
        $em = "Incorrect User name or password";
        header("Location: ../login.php?error=$em");

    }

}else{
    header("Location: ../login.php");
}

?>