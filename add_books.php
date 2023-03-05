<?php
    session_start();

    if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

        include ('db_connection.php');

        include "php/func-category.php";
        $categories = get_all_categories($conn);

        include "php/func-author.php";
        $authors = get_all_authors($conn);

        if(isset($_GET['Titlu'])) {
            $title = $_GET['Titlu'];
        }else{
            $title = '';
        }

        if(isset($_GET['Descriere'])) {
            $desc = $_GET['Descriere'];
        } else{
            $desc = '';
        }
        
        if(isset($_GET['id_categorie'])){
            $cat_id = $_GET['id_categorie'];
        } else {
            $cat_id = 0;
        }

        if(isset($_GET['id_autor'])){
            $author_id = $_GET['id_autor'];
        } else {
            $author_id = 0;
        }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adauga Carte</title>
    <!-- bootstrap 5 CDN-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- bootstrap 5 Js CDN-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

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
                       href="add_books.php">Adauga Carte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="add_categories.php">Adauga Categorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="add_authors.php">Adauga Autor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                       href="logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="php/add-book.php"
          method="post"
          class="shadow p-6 rounded mt-8"
          enctype="multipart/form-data"
          style="width: 95%; max-width: 60rem;">
        <h1 class="text-center p-4 display-8 fs-7">
            Adauga Catre Noua
        </h1>
        <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?=htmlspecialchars($_GET['error']); ?>
            </div>
        <?php } ?>
        <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
                <?=htmlspecialchars($_GET['success']); ?>
            </div>
        <?php } ?>
        <div class="mb-3">
               <label class="form-label">Titlul cartii</label>
               <input type="text" 
                      class="form-control"
                      value="<?=$title?>"
                      name="book_title">
        </div>
        <div class="mb-3">
               <label class="form-label">Descriere</label>
               <input type="text" 
                      class="form-control"
                      value="<?=$desc?>"
                      name="description">
        </div>
        <div class="mb-3">
                <label class="form-label">Autorul</label>
                <select name="book_author"
                       class="form-control">
                       <option value="0">
                            Selecteaza autorul
                        </option>
                        <?php 
                        if($authors == 0){

                        }else{
                        foreach($authors as $author){ 
                            if ($author_id == $author['id']) { ?>
                                <option selected value="<?=$author['id']?>">
                                <?=$author['nume']?>
                                </option>
                        <?php } else { ?>
                            <option value="<?=$author['id']?>">
                            <?=$author['nume']?>
                            </option>
                        <?php } } } ?>
                </select>
            
        </div>
        <div class="mb-3">
               <label class="form-label">Editura</label>
               <input type="text" 
                      class="form-control"
                      name="pub_house">
        </div>
        <div class="mb-3">
               <label class="form-label">Pret</label>
               <input type="text" 
                      class="form-control"
                      name="book_price">
        </div>
        <div class="mb-3">
               <label class="form-label">Dimensiune</label>
               <input type="text" 
                      class="form-control"
                      name="dimenssion">
        </div>
        <div class="mb-3">
               <label class="form-label">Limba</label>
               <input type="text" 
                      class="form-control"
                      name="language">
        </div>
        <div class="mb-3">
               <label class="form-label">Pagini</label>
               <input type="text" 
                      class="form-control"
                      name="book_pages">
        </div>


        <div class="mb-3">
               <label class="form-label">Categoria</label>
               <select name="book_category"
                       class="form-control">
                       <option value="0">
                            Selecteaza categoria
                        </option>
                        <?php 
                        if($categories == 0){

                        }else{
                        foreach($categories as $category){ 
                            if ($cat_id == $category['id']) {
                            ?>
                                <option selected value="<?=$category['id']?>">
                                <?=$category['denumire']?>
                                </option>
                            <?php } else { ?>
                            <option value="<?=$author['id']?>">
                            <?=$category['denumire']?>
                            </option>
                        <?php } } } ?>
                </select>
                     
        </div>
        <div class="mb-3">
               <label class="form-label">Coperta</label>
               <input type="file" 
                      class="form-control"
                      name="book_cover">
        </div>

        <button type="submit"
                name="submit"
                style="background-color:#339933;" 
                class="btn btn-secondary"
                value="Upload">Adauga carte</button>
    </form>
</body>
</html>

<?php }else{
    header("Location: login.php");
    exit;
} ?>
