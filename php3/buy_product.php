<?php 
if(isset($_POST['buy'])){
    $sm = "Produsul a fost adaugat cu success in cos !";
    header("Location: ../buy.php?success=$sm");
} else {
    $em = "Produsul nu poate fi adaugat in cos !";
    header("Location: ../buy.php?error=$em");
}
?>