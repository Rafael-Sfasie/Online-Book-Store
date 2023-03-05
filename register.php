<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- bootstrap 5 CDN-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- bootstrap 5 Js CDN-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</head>
<body>
    <div class="d-flex justify-content-center align-items-center"
         style="min-height: 100vh;">
        <form class="p-4 rounded shadow"
              style="max-width: 40rem; width: 100%"
              method="POST"
              action="php/registration.php">
              
        <h1 class="text-center display-4 pb-5">REGISTER</h1>
        <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger" role="alert">
            <?=htmlspecialchars($_GET['error']); ?>
        </div>
        <?php } ?>
            <div class="mb-3">
                <label for="exmpleInputName"
                       class="form-label">Name</label>
                <input type="name"
                       class="form-control"
                       name="user_name"
                       id="exampleInputName1">
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" 
                      class="form-label">Email address</label>
               <input type="email" 
                      class="form-control"
                      name="email"
                      id="exampleInputEmail1" 
                      aria-describedby="emailHelp">
            </div>
               <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Password</label>
               <input type="password" 
                      class="form-control" 
                      name="password"
                      id="exampleInputPassword1">
            </div>
            <button type="submit"
                    name="create" 
                    class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>