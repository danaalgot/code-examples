<?php
  session_start();
  include("includes/mysql_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Horses for sale Canada</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <style type="text/css">
    #slider-range{
      width: 300px;
      font-size: 10px;    
    }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
    $(function(){

      
      $("#slider-range").slider({
        range: true,
        min: 1,
        max: 60000,
        <?php 
          if(isset($_POST['range-submit'])){
            $minvalue = $_POST['minvalue'];
            $maxvalue = $_POST['maxvalue'];
          } else {
            $minvalue = 2000;
            $maxvalue = 10000;
          }
         ?>
        values: [<?php echo "$minvalue"; ?>, <?php echo "$maxvalue"; ?>], // perhaps here is where we could prepopulate these values. You can go into a PHP block here in JS just like you can in HTML

      
        slide: function(event, ui) {
        // in order to pass the user selected values to your app, we will use jQuery to prepopulate certain hidden form elements, then grab those values from the $_POST
            $("#minvalue").val(ui.values[0]);
            $("#maxvalue").val(ui.values[1]);
            $("#amount").val(ui.values[0] + " - " + ui.values[1]);
        }
    });
    $("#amount").val($("#slider-range").slider("values", 0) + " - " + $("#slider-range").slider("values", 1));
        
      });
    </script>
  </head>
  <body style="padding-top: 80px;">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="padding: 0 12px;">
      <div class="container">
        <a class="navbar-brand" href="index.php">Horses for sale Canada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive"
        <?php 
          if (isset($_SESSION['dlahfoiwahp;hfhahwf779276*6'])){
            echo "style=\"padding-top: 14px;\"";
          } else {
            echo "style=\"padding-top: 14px; padding-bottom: 14px;\"";
          }
         ?>>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php 
                if (isset($_SESSION['dlahfoiwahp;hfhahwf779276*6'])){
                  //View Adds
                  echo "<li class=\"nav-item active\"\">";
                    echo "<a class=\"nav-link\" href=\"display.php\">View Ads<span class=\"sr-only\">(current)</span></a>";
                  echo "</li>";

                  //Drop Down
                  echo "<div class=\"dropdown show\">";
                    echo "<p class=\"btn btn-secondary dropdown-toggle\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" style=\"background-color: #343a40; border: 0px; padding-right: 14px; margin-top: 1.5px;\">User</p>";
                    echo "<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\" style=\"margin-top: -2px; border-radius: 0px; border: 2px solid #343a40;\">";
                    echo "<a class=\"dropdown-item\" href=\"insert.php\">New Post</a>";
                    echo "<a class=\"dropdown-item\" href=\"update.php\">Update Post</a>";
                    echo "<a class=\"dropdown-item\" href=\"logout.php\">Logout</a>";
                    echo "</div>";
                  echo "</div>";
                } else {
                  //View Adds
                  echo "<li class=\"nav-item active\">";
                    echo "<a class=\"nav-link\" href=\"display.php\">View Ads<span class=\"sr-only\">(current)</span></a>";
                  echo "</li>";

                  //Login
                  echo "<li class=\"nav-item active\" style=\"margin-right: 20px;\">";
                    echo "<a class=\"nav-link\" href=\"login.php\">Login<span class=\"sr-only\">(current)</span></a>";
                  echo "</li>";
                }
              ?>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for..." style="height: 38px; width: 274px;">
                <input type="submit" name="post-search" class="btn btn-secondary" value="Search"></a>
              </div>
            </form>
            <?php 
              if (isset($_POST['post-search'])){
                $search = $_POST['search'];
                header("Location: search.php?search=$search");
              }
             ?>
          </ul>
        </div>
      </div>
    </nav>