<?php

session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include('../db_connection2.php');

    include('funct-validation.php');

    include('upload.php');

    if ( isset($_POST['book_id']) &&
         isset($_POST['book_title']) && 
         isset($_POST['description']) && 
         isset($_POST['book_author']) && 
         isset($_POST['book_category']) &&
         isset($_POST['book_price']) &&
         isset($_POST['pub_house']) &&
         isset($_POST['dimenssion']) &&
         isset($_POST['language']) &&
         isset($_POST['book_pages']) &&
         isset($_FILES['book_cover']) && 
         isset($_POST['current_cover'])) {

            $id = $_POST['book_id'];
            $title = $_POST['book_title'];
            $desc = $_POST['description'];
            $author = $_POST['book_author'];
            $cat = $_POST['book_category'];
            $price = $_POST['book_price'];
            $pbh = $_POST['pub_house'];
            $dim = $_POST['dimenssion'];
            $lan = $_POST['language'];
            $pag = $_POST['book_pages'];
            $current_cover = $_POST['current_cover'];

            $text="Book title";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($title, $text, $location, $ms, "");

            $text="Book description";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($desc, $text, $location, $ms, "");

            $text="Book author";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($author, $text, $location, $ms, "");

            $text="Book category";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($cat, $text, $location, $ms, "");

            $text="Publishing house";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($pbh, $text, $location, $ms, "");

            $text="Language";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($lan, $text, $location, $ms, "");

            $text="Price";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($price, $text, $location, $ms, "");

            $text="Dimemssion";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($dim, $text, $location, $ms, "");

            $text="Book pages";
            $location="../edit_books2.php";
            $ms="id=$id&error";
            is_empty($pag, $text, $location, $ms, "");

            if(!empty($_FILES['book_cover']['name'])){

                $allowed_exs = array('jpg', 'jpeg', 'png', 'webp');
                $path="web";
                $book_cover = upload_file($_FILES['book_cover'], $allowed_exs, $path);

                if($book_cover['status'] == "error"){
                    $em = $book_cover['data'];
                    header("Location: ../edit_books2.ph?error=$em&id=$id");
                    exit;
                } else {
                    $c_p_book_cover = "../descarcate/web/$current_cover";
                    unlink($c_p_book_cover);
                    $book_cover_URL=$book_cover['data'];
                    $sql = "UPDATE carti2 SET Titlu=?,
                                             id_autor=?,
                                             id_categorie=?,
                                             Numarul_de_pagini=?,
                                             Editura=?,
                                             Limba=?,
                                             Dimensiune=?,
                                             Pret=?,
                                             Descriere=?,
                                             Coperta=?             
                            WHERE id=?";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$title, $author, $cat, $pag, $pbh, $lan, $dim, $price, $desc, $book_cover_URL, $id]);
                if($res){
                    $sm="Successfully updated !";
                    header("Location: ../edit_books2.php?success=$sm&id=$id");
                    exit;
                }else{
                    $em="Unknown error occured !";
                    header("Location: ../edit_books2.php?error=$em&id=$id");
                    exit;
                    }
                }

            } else {
                $sql = "UPDATE carti2 SET Titlu=?,
                                         id_autor=?,
                                         id_categorie=?,
                                         Numarul_de_pagini=?,
                                         Editura=?,
                                         Limba=?,
                                         Dimensiune=?,
                                         Pret=?,
                                         Descriere=?            
                        WHERE id=?";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$title, $author, $cat, $pag, $pbh, $lan, $dim, $price, $desc, $id]);

                if($res){
                    $sm="Successfully updated !";
                    header("Location: ../edit_books2.php?success=$sm&id=$id");
                    exit;
                }else{
                    $em="Unknown error occured !";
                    header("Location: ../edit_books2.php?error=$em&id=$id");
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