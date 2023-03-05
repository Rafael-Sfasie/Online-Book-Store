<?php
    session_start();


    if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

        if(!isset($_GET['id'])){
            header("Location: admin.php");
            exit;
        }

        $id = $_GET['id'];
    
        include "db_connection.php";

        include "php/func-author.php";
        $author = get_author($conn, $id);

        if($author == 0){
            header("Location: admin.php");
            exit;
        }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editeaza Autor</title>
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
    <form action="php/edit-author.php"
          method="post"
          class="shadow p-6 rounded mt-8"
          style="width: 95%; max-width: 60rem;">
        <h1 class="text-center p-4 display-8 fs-7">
            Editare Autor 
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
               <label class="form-label">Numele autorului</label>
               <input type="text" 
                      value="<?=$author['id']?>"
                      hidden
                      name="id_autor">

                <input type="text" 
                       class="form-control"
                       value="<?=$author['nume']?>"
                       name="nume_autor">
        </div>
        <button type="submit"
                style="background-color:#339933;"
                class="btn btn-secondary">Actualizeaza</button>
    </form>
   
</body>
</html>

<?php }else{
    header("Location: login.php");
    exit;
} ?>

