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
      <div class="form-group page-header">
      <div class="row">                

        <form action="../controller/handle_login.php" method="post">

                <div class="col-md-12">
                    <label for="username">Username:</label>
                    <input type="text" placeholder="username" id="username" name="username" class="form-control" required>
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