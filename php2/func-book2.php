<?php

function get_all_books($con){
    $sql = "SELECT * FROM carti2 ORDER BY id DESC";
    $stm = $con -> prepare($sql);
    $stm -> execute();

    if($stm->rowCount() > 0){
        $books = $stm->fetchAll();
    }else {
        $books = 0;
    }

    return $books;
}

function get_book($con, $id){
    $sql = "SELECT * FROM carti2 WHERE id=?";
    $stm = $con -> prepare($sql);
    $stm -> execute([$id]);

    if($stm->rowCount() > 0){
        $book = $stm->fetch();
    }else {
        $book = 0;
    }
    return $book;


}