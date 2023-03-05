<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection3.php');

    include('funct-validation.php');

    include('upload.php');

    if (isset($_POST['book_title']) && 
        isset($_POST['description']) && 
        isset($_POST['book_author']) && 
        isset($_POST['book_category']) &&
        isset($_POST['book_price']) &&
        isset($_POST['pub_house']) &&
        isset($_POST['dimenssion']) &&
        isset($_POST['language']) &&
        isset($_POST['book_pages']) && 
        isset($_FILES['book_cover'])){
            $title = $_POST['book_title'];
            $desc = $_POST['description'];
            $author = $_POST['book_author'];
            $cat = $_POST['book_category'];
            $price = $_POST['book_price'];
            $pbh = $_POST['pub_house'];
            $dim = $_POST['dimenssion'];
            $lan = $_POST['language'];
            $pag = $_POST['book_pages'];


            $user_input='Titlu='.$title.'&Descriere='.$desc.'&id_autor='.$author.'&Categorie='.$cat.'&Editura='.$pbh.'&Limba='.$lan.'&Pret='.$price.'&Dimensiune='.$dim.'&Pagini='.$pag;

            $text="Book title";
            $location="../add_books3.php";
            $ms="error";
            is_empty($title, $text, $location, $ms, $user_input);

            $text="Book description";
            $location="../add_books3.php";
            $ms="error";
            is_empty($desc, $text, $location, $ms, $user_input);

            $text="Book author";
            $location="../add_books3.php";
            $ms="error";
            is_empty($author, $text, $location, $ms, $user_input);

            $text="Book category";
            $location="../add_books3.php";
            $ms="error";
            is_empty($cat, $text, $location, $ms, $user_input);

            $text="Publishing house";
            $location="../add_books3.php";
            $ms="error";
            is_empty($pbh, $text, $location, $ms, $user_input);

            $text="Language";
            $location="../add_books3.php";
            $ms="error";
            is_empty($lan, $text, $location, $ms, $user_input);

            $text="Price";
            $location="../add_books3.php";
            $ms="error";
            is_empty($price, $text, $location, $ms, $user_input);

            $text="Dimemssion";
            $location="../add_books3.php";
            $ms="error";
            is_empty($dim, $text, $location, $ms, $user_input);

            $text="Book pages";
            $location="../add_books3.php";
            $ms="error";
            is_empty($pag, $text, $location, $ms, $user_input);

            $allowed_img_exs = array('jpg', 'jpeg', 'png', 'webp');
            $path="web";
            $book_cover = upload_file($_FILES['book_cover'], $allowed_img_exs, $path);
            echo $book_cover['data'];

            if($book_cover['status'] == "error") {
                $em = $book_cover['data'];
                header("Location: ../add_books3.php?error=$em&$user_input");
                exit;
            }else{
                $book_cover_URL=$book_cover['data'];
                $sql ="INSERT INTO carti3 (Titlu, 
                                          id_autor, 
                                          id_categorie, 
                                          Numarul_de_pagini, 
                                          Editura, 
                                          Limba, 
                                          Dimensiune, 
                                          Pret, 
                                          Descriere, 
                                          Coperta)
                        VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$title, $author, $cat, $pag, $pbh, $lan, $dim, $price, $desc, $book_cover_URL]);
    
                if($res){
                    $sm="Cartea a fost adaugata cu success";
                    header("Location: ../add_books2.php?success=$sm");
                    exit;
                }else{
                    $em="Unknown error occured !";
                    header("Location: ../add_books2.php?error=$em");
                    exit;
                }
            }
    }else{
        header("Location: ../admin2.php");
        exit; 
    }

}else{
    header("Location: ../login.php");
    exit;
}
?>