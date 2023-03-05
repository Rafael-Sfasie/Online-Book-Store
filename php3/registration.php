
<?php 

include ('../db_connection.php');

if(isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password'])){
    $uname = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (user_name, email, password) VALUES (?,?,?)";
    $stmt = $conn -> prepare($sql);
    $res = $stmt->execute([$uname, $email, $password]);
    if($res){
        $sm="Successfuly saved !";
        header("Location: ../register.php");
    }else {
        $em="There was an error while saving the data !";
        header("Location: ../register.php");
    }

}?>
