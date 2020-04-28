<?php
  include("includes/site-header.php");

  $sql = "SELECT * FROM dal_horses_for_sale";

  //Main filters
  $displayby = $_GET['displayby'];
  $displayvalue = $_GET['displayvalue'];

  if(isset($displayby) && isset($displayvalue)) {
    $sql = "SELECT * FROM dal_horses_for_sale WHERE $displayby LIKE '$displayvalue'";
  }

  //Between query
  $min = $_GET['min'];
  $max = $_GET['max'];
  $ageValue = $_GET['agevalue'];

  if(isset($_POST['range-submit']) && isset($minvalue) && isset($maxvalue)){
    $sql = "SELECT * FROM dal_horses_for_sale WHERE dal_cost BETWEEN $minvalue and $maxvalue";
  }

  $disciplineValue = $_GET['discipline'];
  $colorValue = $_GET['color'];
  $breedValue = $_GET['breed'];
  $genderValue = $_GET['gender'];


  $queryAppend = array();

  if ($disciplineValue != "") {
    array_push($queryAppend, "dal_discipline LIKE '$disciplineValue'"); //adds an item to the array
  }

  if ($colorValue  != "") {
    array_push($queryAppend, "dal_color LIKE '$colorValue'"); //adds an item to the array
  }

  if ($breedValue != "") {
    array_push($queryAppend, "dal_breed LIKE '$breedValue'"); //adds an item to the array
  }

  if ($genderValue != "") {
    array_push($queryAppend, "dal_gender LIKE '$genderValue'"); //adds an item to the array
  }

  foreach ($queryAppend as $k => $v){
    if ($k == 0) { //k is key
      $queryFilter .= " WHERE " . $v; //v is for value
    } else {
      $queryFilter .= " AND " . $v; //v is for value
    }
  }

  if (isset($queryFilter)) {
    $sql = "SELECT * FROM dal_horses_for_sale $queryFilter";
  }

  if(isset($min) && isset($max)){
    $sql = "SELECT * FROM dal_horses_for_sale WHERE $displayby BETWEEN $min and $max";
  }

  if(isset($min) && isset($max) && isset($ageValue)){
    $sql = "SELECT * FROM dal_horses_for_sale WHERE $displayby BETWEEN $min and $max and dal_ageoption = '$ageValue'";
  }

  $result = mysqli_query($con, $sql);

  $num_rows = mysqli_num_rows($result);

  if ($num_rows == 0) {
    $errorResult = "No Results";
  }
?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-9">
      <h1 class="my-4">Horses for Sale
      </h1>
      <?php if ($errorResult) { echo "<h2>$errorResult</h2>"; }?>
      <div style="display: flex; flex-wrap: wrap;">
      <?php
        /************************** ECHO OUT YOUR RESULTS ***********************/
        while ($row = mysqli_fetch_array($result)) {
          $name = $row['dal_name'];
          $city = $row['dal_city'];
          $province = $row['dal_province'];
          $breed = $row['dal_breed'];
          $age = $row['dal_age'];
          $ageOption = $row['dal_ageoption'];
          $gender = $row['dal_gender'];
          $cost = $row['dal_cost'];
          $horseID = $row['horseid'];
          $image = $row['dal_image'];
          $description = $row['dal_description'];
          $shortDesc = ellipsis($description, 220);

          if ($ageOption == 1) {
            $ageOptionValue = 'year old';
          } else if ($ageOption == 2){
            $ageOptionValue = 'month old';
          }
            echo "\n\t<div class=\"card mb-4\/,asmd;\" style=\"width:180px;margin-right:24px; margin-bottom: 40px;\">";
              echo "\n\t\t<img class=\"card-img-top\" src=\"image/thumbnail/$image\" alt=\"Card image cap\" style=\"height: 180px;\">";
              echo "\n\t\t<div class=\"card-body\">";
                echo "\n\t\t\t<h2 class=\"card-title\" style=\"font-size: 16px;\">" . $age . ' ' . $ageOptionValue . ' ' . $breed . " <br><small style=\"font-size: 16px; color: #0069d9;\">" . "$" . $cost . "</small>" . "</h2>";
                echo "\n\t\t\t<a href=\"detail.php?horseID=$horseID\" class=\"btn btn-primary\">Read
                More &rarr;</a>";
                echo "\n\t\t</div>";
                echo "\n\t\t<div class=\"card-footer text-muted\">";
              echo "\n\t\t</div>";
            echo "\n\t</div><br><br>";
        }
      ?>
      </div>
    </div>
  <!-- Sidebar Widgets Column -->
  <div class="col-md-3">
    <!-- <?php //echo "<p>$sql</p>";  THIS SHOWS THE QUERY! ?>  --> 
    <!-- Side Widget -->
    <div class="card my-4">
      <h5 class="card-header">Filters</h5>
      <div class="card-body">
        Click here to <a href="display.php">reset the filters</a>.<br><br>
        <h3>Common Filters:</h3>
        <?php 
          $linkGender = $_GET['gender'];
          $linkBreed = $_GET['breed'];
          $linkColor = $_GET['color'];
          $linkDiscipline = $_GET['discipline'];
         ?>

         <?php if (isset($linkColor)){ echo "$linkGender";}?>
         <?php if (isset($linkColor)){ echo "$linkColor";}?>
         <?php if (isset($linkBreed)){ echo "$linkBreed";}?>
         <?php if (isset($linkDiscipline)){ echo "$linkDiscipline";}?>
        <a href="display.php?gender=Mare&breed=Warmblood&color=&discipline=&submit=Submit">Warmblood Mares</a><br>
        <a href="
        display.php?gender=Gelding&breed=Warmblood&color=&discipline=Dressage&submit=Submit">Warmblood Geldings in Dressage</a><br>
        <a href="display.php?gender=&breed=Minature&color=&discipline=&submit=Submit">Minature Horses</a><br>
        <a href="display.php?display.php?gender=Mare&breed=&color=&discipline=Jumping&submit=Submit">Mares in Jumping</a><br><br><br>

        <div class="row">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" style="
            padding-left: 15px;">
            <h5>Gender</h5>
            <select class="form-control" id="selectad" name="gender" style="width: 210px;">
              <option value="">Any</option><br>
              <?php 
                if (!strlen($linkGender) == 0){ 
                  echo "<option value=\"$linkGender\" selected>$linkGender</option><br>";
                }
               ?>
              <?php 
                $query = mysqli_query($con, "SELECT DISTINCT dal_gender FROM dal_horses_for_sale") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($query)) {
                  $gender = $row['dal_gender'];

                  //Check something and add a select
                  if ($gender == $genderValue){
                    echo "<option value=\"$gender\" selected>$gender</option><br>";
                  } else {
                    echo "<option value=\"$gender\">$gender</option><br>";
                  }
                }
               ?>
            </select><br>

            <h5>Breed</h5>
            <select class="form-control" id="selectad" name="breed" style="width: 210px;">
              <option value="">Any</option><br>
              <?php 
                if (!strlen($linkBreed) == 0){ 
                  echo "<option value=\"$linkBreed\" selected>$linkBreed</option><br>";
                }
               ?>
              <?php 
                $query = mysqli_query($con, "SELECT DISTINCT dal_breed FROM dal_horses_for_sale") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($query)) {
                  $breed = $row['dal_breed'];

                  if ($breed == $breedValue) {
                    echo "<option value=\"$breed\" selected>$breed</option><br>";
                  } else {
                    echo "<option value=\"$breed\">$breed</option><br>";
                  }
                }
               ?>
            </select><br>

            <h5>Color</h5>
            <select class="form-control" id="selectad" name="color" style="width: 210px;">
              <option value="">Any</option><br>
              <?php 
                if (!strlen($linkColor) == 0){ 
                  echo "<option value=\"$linkColor\" selected>$linkColor</option><br>";
                }
               ?>
              <?php 
                $query = mysqli_query($con, "SELECT DISTINCT dal_color FROM dal_horses_for_sale") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($query)) {
                  $color = $row['dal_color'];

                  if ($color == $colorValue) {
                    echo "<option value=\"$color\" selected>$color</option><br>";
                  } else {
                    echo "<option value=\"$color\">$color</option><br>";
                  }
                }
               ?>
            </select><br>

            <h5>Discipline</h5>
            <select class="form-control" id="selectad" name="discipline" style="width: 210px;">
              <option value="">Any</option><br>
              <?php 
                if (!strlen($linkDiscipline) == 0){ 
                  echo "<option value=\"$linkDiscipline\" selected>$linkDiscipline</option><br>";
                }
               ?>
              <?php 
                $query = mysqli_query($con, "SELECT DISTINCT dal_discipline FROM dal_horses_for_sale") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($query)) {
                  $discipline = $row['dal_discipline'];

                  if ($discipline == $disciplineValue) {
                    echo "<option value=\"$discipline\" selected>$discipline</option><br>";
                  } else {
                    echo "<option value=\"$discipline\">$discipline</option><br>";
                  }
                }
               ?>
            </select>
            <div class="form-group">
              <label for="submit"></label>
              <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="margin-top: 10px; margin-bottom: -25px; width: 218px;margin-left: -5px;">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Province Widget -->
    <div class="card my-4">
      <h5 class="card-header">Province</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled mb-0">
              <?php 
                $query = mysqli_query($con, "SELECT DISTINCT dal_province FROM dal_horses_for_sale") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($query)) {
                  $province = $row['dal_province'];

                  echo "<li><a href=\"display.php?displayby=dal_province&displayvalue=$province\">$province</a><br /></li>";
                }
               ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Height Widget -->
    <div class="card my-4">
      <h5 class="card-header">Height</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled mb-0">
              <li>
                <a href="display.php?displayby=dal_height&min=7&max=10">Minature Horses </a>(7 to 10 Hands)<br>
              </li>
              <li>
                <a href="display.php?displayby=dal_height&min=10&max=14">Ponies </a>(10 to 14 Hands)<br>
              </li>
              <li>
                <a href="display.php?displayby=dal_height&min=14&max=17">Average sized horses </a>(14 to 17 Hands)<br>
              </li>
              <li>
                <a href="display.php?displayby=dal_height&min=17&max=40">Tall horses </a>(17+ Hands)<br>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Age Widget -->
    <div class="card my-4">
      <h5 class="card-header">Age</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled mb-0">
              <li>
                <a href="display.php?displayby=dal_age&min=1&max=20&agevalue=2">1 - 20 Months Old</a><br>
              </li>
              <li>
                <a href="display.php?displayby=dal_age&min=1&max=6&agevalue=1">1 - 6 Years Old</a><br>
              </li>
              <li>
                <a href="display.php?displayby=dal_age&min=6&max=12&agevalue=1">6 - 12 Years Old</a><br>
              </li>
              <li>
                <a href="display.php?displayby=dal_age&min=12&max=20&agevalue=1">12 - 20 Years Old</a><br>
              </li>
              <li>
                <a href="display.php?displayby=dal_age&min=20&max=50&agevalue=1">20+ Years Old</a><br>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Cost Widget -->
    <div class="card my-4">
      <h5 class="card-header">Cost</h5>
      <div class="card-body">
        <form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="text" id="amount" style="border: 0; color: #0069d9; font-weight: bold; margin-bottom: 20px;" /><br />
            
           <input type="hidden" id="minvalue" name="minvalue" value="<?php echo $minvalue ?>" />
          <input type="hidden" id="maxvalue" name="maxvalue" value="<?php echo $maxvalue ?>" />
           <div id="slider-range" style="width: 212px;"></div><br>
            
          <div class="form-group">
            <label for="submit"></label>
            <input type="submit" name="range-submit" class="btn btn-primary" value="Submit" style="margin-bottom: -25px; width: 212px;margin-left: -5px;">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

<?php
  include("includes/site-footer.php");

  function ellipsis($text, $max=100, $append='&hellip;'){
    if (strlen($text) <= $max) return $text;
    $out = substr($text,0,$max);
    if (strpos($text,' ') === FALSE) return $out.$append;
    return preg_replace('/\w+$/','',$out).$append;
  }
?>


    
