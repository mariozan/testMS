<?php
require_once "../controller/MoviesController.php";

session_start();
if(!$_SESSION["logged"]){
  header('Location: ../view/login.php');
}

$movies = new MoviesController();
$data = $movies->getAll();

if ((isset($_GET["title"]) && !empty($_GET["title"])) || (isset($_GET["startDate"]) && !empty($_GET["startDate"]))) {
  $title="";
  $startDate = 0;
  $endDate = 0;  
  $sort = "";
  $title = $_GET["title"] ?? $title;
  $startDate = $_GET["startDate"] != "" ? $_GET["startDate"] : $startDate;
  $endDate = $_GET["endDate"] != "" ? $_GET["endDate"] : $endDate;  

  $data = $movies->getByFilter($title, $startDate, $endDate);

}

  if (isset($_GET["sort"])) {
    $sort = $_GET["sort"] ?? $sort;
    $data = $movies->sortByFilter($data, $sort);

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
      <div class="form-group page-header">
        <form action="">

            <div class="row">
            <div class="col-md-6">
                    <label for="Title">Title:</label>
                    <input type="text" placeholder="Search" id="title" name="title" class="form-control">
                </div>
                <div class="col-md-2">
                <label for="Start Range">Start Range:</label>
                    <input type="number" placeholder="YYYY" id="startDate" name="startDate" class="form-control">
                </div>
                <div class="col-md-2">
                <label for="End Range">End Range:</label>
                    <input type="number" placeholder="YYYY" id="endDate" name="endDate" class="form-control">
                </div>

                <div class="col-md-2">
                <label for="sort" >Sort By:</label>
                    <select name="sort" id="sort" class="form-control">  
                        <option value="">-</option>   
                        <option value="asc">Asc</option>
                        <option value="desc">Desc</option>
                        <option value="title">Title</option>
                        <option value="date">Date</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <input type="submit" value="Search"class="form-control btn btn-primary" >
                </div>
                <br>
                <hr>
            </div>
        </form>

        <div class="row">                
            <form action="../controller/handle_movies.php" method="post">
                <div class="col-md-6">
                <input type="text" placeholder="Search your favorite Movies" id="filter" name="filter" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="submit" value="Get Movies From the Resource" class="form-control btn btn-danger" >
                </div>
                </form>
                </div>

        <hr>
        <div class="row">

            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                   <thead>
                      <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>imdbID</th>
                        <th>Type</th>
                        <th>Poster</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $row = "";
                    foreach ($data as $movie){
                    $row .= "<tr>";
                        $row .= "<td>{$movie->Title}</td>";
                        $row .= "<td>{$movie->Year}</td>";
                        $row .= "<td>{$movie->imdbID}</td>";
                        $row .= "<td>{$movie->Type}</td>";
                        $row .= "<td><img src='{$movie->Poster}'></td>";
                    $row .= "</tr>";
                    }

                    echo $row;
                    ?>

                </tbody>

            </table>

        </div>
    </div>
</div>

</div>
</div>

</body>
</html>