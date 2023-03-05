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
    <title>ADMIN</title>
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
            <a class="navbar-brand" href="admin.php">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" 
                 id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                    <a class="nav-link" 
                       aria-current="page" 
                       href="index_project.php">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="add_books2.php">Adauga Carte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="add_categories2.php">Adauga Categorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="add_authors2.php">Adauga Autor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if($books == 0) { ?>
        <div class="alert alert-warning" 
             role="alert">
            Nu exista nici o carte in baza de date
        </div>
    <?php }else { ?>


    <h4>Toate Cartile</h4>
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
                <th>Utilizare</th>
                
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
                <a href="edit_books2.php?id=<?=$book['id']?>" class="btn btn-warning">Editare</a>
                <a href="php2/delete-book2.php?id=<?=$book['id']?>" class="btn btn-danger">Stergere</a>
            </td>
        </tr>
        <?php } ?>
       </tbody>
    </table>
    <?php } ?>

    <?php if($categories == 0) { ?>
        <div class="alert alert-warning" 
             role="alert">
            Nu exista nici o categorie in baza de date
        </div>
    <?php }else { ?>

    <h4 class="mt-5">Toate categoriile</h4>
    <table class="table table-bordered shadow">
        <thead>
            <tr>
                <th>#</th>
                <th>Categori</th>
                <th>Utilizare</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $j = 0;
            foreach($categories as $category){ 
                $j++;
            ?>
            <tr>
                <td><?=$j?></td>
                <td><?=$category['denumire']?></td>
                <td>
                    <a href="edit_categories2.php?id=<?=$category['id']?>" class="btn btn-warning">Editare</a>
                    <a href="php2/delete-category2.php?id=<?=$category['id']?>" class="btn btn-danger">Stegere</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>

    <?php if($authors == 0) { ?>
        <div class="alert alert-warning" 
             role="alert">
            Nu exista nici un autor in baza de date
        </div>
    <?php }else { ?>

    <h4 class="mt-5">Toti autorii</h4>
    <table class="table table-bordered shadow">
        <thead>
            <tr>
                <th>#</th>
                <th>Numele autorului</th>
                <th>Utilizare</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $m = 0;
            foreach($authors as $author){ 
                $m++;
            ?>
            <tr>
                <td><?=$m?></td>
                <td><?=$author['nume']?></td>
                <td>
                    <a href="edit_authors2.php?id=<?=$author['id']?>" class="btn btn-warning">Editare</a>
                    <a href="php2/delete-author2.php?id=<?=$author['id']?>" class="btn btn-danger">Stegere</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
<form action="admin.php"> 
    <button type="submit" style="background-color: #2471a3; color: #2ecc71">Preview</button> 
</form> 
<a role="link" aria-disabled="true">1</a> 
<a role="link" aria-disabled="true">2</a>
<a href="third_page.php" class="nav-link">3</a> 
<form action="admin3.php"> 
    <button type="submit" style="background-color: #2471a3; color: #2ecc71">Next</button> 
</form>

</body>
</html>

<?php }else{
    header("Location: login.php");
    exit;
} ?>
