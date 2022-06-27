<?php
require_once "../controller/UserController.php";

$user = new UsersController();
$errors = array();

        if (isset($_GET["email"])) {
            array_push($errors, "email");
        }
        if (isset($_GET["phone"])) {
            array_push($errors, "phone");
        }
        if (isset($_GET["username"])) {
            array_push($errors, "username");
        }
        if (isset($_GET["password"])) {
            array_push($errors, "password");
        }

?>
 
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script type="text/javascript" src="../js/jquery-3.1.1/jquery-3.1.1.min.js"></script>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" >

  <!-- Latest compiled and minified JavaScript -->
  <script src="../js/bootstrap/bootstrap.min.js"></script>
</head>


<body>
    <div class="container">
        <div class="page-header">            
            
        <?php 
        foreach ($errors as $error){
        echo "<div class='alert alert-danger' role='alert'>
        {$error} not valid
      </div>";
        }
        ?>
          
      <div class="form-group page-header">
      <div class="row">                

        <form action="../controller/handle_user.php" method="post">

                <div class="col-md-12">
                    <label for="username">Username:</label>
                    <input type="text" placeholder="username" id="username" name="username" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="phone" >phone:</label>
                    <input type="text" placeholder="phone" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="email" >email:</label>
                    <input type="email" placeholder="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="password" >password:</label>
                    <input type="password" placeholder="password" id="password" name="password" class="form-control" required>
                </div>
                <hr>

                <hr>
                <div class="col-md-12">
                    <input type="submit" value="Submit" class="form-control btn btn-primary" >
                </div>
                </form>

                </div>

            </div>

       
</div>

</div>

</body>
</html>