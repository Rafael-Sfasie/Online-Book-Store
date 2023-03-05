<?php

function get_all_authors($con){
    $sql = "SELECT * FROM autori";
    $stm = $con->prepare($sql);
    $stm->execute();
    
    if($stm->rowCount() > 0) {
        $authors = $stm->fetchAll();
    } else {
        $authors = 0;
    }

    return $authors;
}

function get_author($conn, $id){
    $sql = "SELECT * FROM autori WHERE id=?";
    $stm = $conn -> prepare($sql);
    $stm -> execute([$id]);

    if($stm->rowCount() > 0){
        $author = $stm->fetch();
    }else {
        $author = 0;
    }

    return $author;

}
?>