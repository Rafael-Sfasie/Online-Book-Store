<?php

function get_all_categories($conn){
    $sql = "SELECT * FROM categorii2";
    $stm = $conn -> prepare($sql);
    $stm -> execute();

    if($stm->rowCount() > 0){
        $categories = $stm->fetchAll();
    }else {
        $categories = 0;
    }

    return $categories;

}

function get_category($conn, $id){
    $sql = "SELECT * FROM categorii2 WHERE id=?";
    $stm = $conn -> prepare($sql);
    $stm -> execute([$id]);

    if($stm->rowCount() > 0){
        $category = $stm->fetch();
    }else {
        $category = 0;
    }

    return $category;

}
?>