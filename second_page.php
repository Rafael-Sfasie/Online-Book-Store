<?php
    session_start();

    if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

    include "db_connection2.php";

    include "php2/func-book2.php";

    $books = get_all_books($conn);

    include "php2/func-author2.php";

    $authors = get_all_authors($conn);
    
    include "php2/func-category2.php";

    $categories = get_all_categories($conn);


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horus Library</title>
    <!-- bootstrap 5 CDN-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
          crossorigin="anonymous">

    <!-- bootstrap 5 Js CDN-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" 
            crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Horus Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" 
                 id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                    <a class="nav-link active" 
                       aria-current="page" 
                       href="index_project.php">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="#">Contacte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="#">Despre noi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="register.php">Register</a>
                </li>
                <br>
                <a href="#" class="btn btn-button">
                <img src="Facebook_logo.png" style="width: 30px; height: 30px;">

                <a href="#" class="btn btn-button">
                <img src="Instagram_icon.png" style="width: 30px; height: 30px;">

                <a href="#" class="btn btn-button">
                <img src="whatsapp.png" style="width: 30px; height: 30px;">

                <a href="#" class="btn btn-button">
                <img src="twitter.png" style="width: 30px; height: 30px;">


                </a>
                </ul>
            </div>
        </div>
    </nav>
    <?php if($books == 0) { ?>
        empty
    <?php }else { ?>


    <h4>Pagina principala</h4>
    <table class="table table-bordered shadow">
        <thead>
            <tr>
                <th>#</th>
                <th>Titlu</th>
                <th>Coperta</th>
                <th>Autor</th>
                <th>Descriere</th>
                <th>Categorie</th>
                <th>Editura</th>
                <th>Pret</th>
                <th>Dimensiune</th>
                <th>Limba</th>
                <th>Nr_pagini</th>
                <th>Cumpara<th>
                
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = 0;
        foreach ($books as $book) {
            $i++;
        ?>

        <tr>
            <td><?=$i?></td>
            <td><?=$book['Titlu']?></td>
            <td>
                <img width = "160" 
                     src="descarcate/<?=$book['Coperta']?>">
            </td>
            <td>
                <?php if($authors == 0){
                    echo "nedefinit";
                } else {
                    foreach($authors as $author){
                        if ($author['id'] == $book['id_autor'] ){
                            echo $author['nume'];
                        }
                    }
                }
                ?>
            </td>
            <td><?=$book['Descriere']?></td>
            <td>
                <?php if($categories == 0) {
                    echo "undefined";
                }else{
                    foreach($categories as $category){
                        if($category['id'] == $book['id_categorie']){
                            echo $category['denumire'];
                        }
                    }
                }
                ?>
            </td>
            <td><?=$book['Editura']?></td>
            <td><?=$book['Pret']?></td>
            <td><?=$book['Dimensiune']?></td>
            <td><?=$book['Limba']?></td>
            <td><?=$book['Numarul_de_pagini']?></td>
            <td>
                    <a href="buy.php" class="btn btn-button"
                       style="background-color: #2E4053; color: #F4F6F7">Adauga in cos</a>
            </td>
        </tr>
        <?php } ?>
       </tbody>
    </table>
    <?php } ?>
    <?php {
        echo "Facut de Sfasie Rafael in data de 14 ianuarie 2023";
    } ?>
<form action="index_project.php">
    <button type="submit" style="background-color: #2471a3; color: #2ecc71">Preview</button>
</form>
<a href="index_project.php" class="nav-link">1</a>
<a role="link" aria-disabled="true">2</a>
<a href="third_page.php" class="nav-link">3</a>
<form action="third_page.php">
    <button type="submit" style="background-color: #2471a3; color: #2ecc71">Next</button>
</form>
</body>
</html>

<?php }else{
    header("Location: login.php");
    exit;
} ?>

