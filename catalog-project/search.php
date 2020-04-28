<?php include("includes/site-header.php"); 

$search = $_GET['search'];

  if (isset($search)){
    $sql = "SELECT * FROM dal_horses_for_sale WHERE 
    dal_breed LIKE '%$search%' 
    OR dal_name LIKE '%$search%'
    OR dal_city LIKE '%$search%'
    OR dal_province LIKE '%$search%'
    OR dal_gender LIKE '%$search%'
    OR dal_discipline LIKE '%$search%'
    OR dal_height LIKE '%$search%'
    OR dal_age LIKE '%$search%'
    OR dal_color LIKE '%$search%'
    OR dal_cost LIKE '%$search%'
    OR dal_description LIKE '%$search%'";
  }

  $result = mysqli_query($con, $sql);

  $num_rows = mysqli_num_rows($result);

  if ($num_rows == 0) {
    $errorResult = "No Results";
  }

?>
<div class="container">
  	<div class="row">
    	<!-- Blog Entries Column -->
    	<div class="col-md-12">
    	<h1 class="my-4">Search Results</h1>
		<?php if ($errorResult) { echo "<h2 style=\"margin-bottom:
		1000px;\">$errorResult</h2>"; }?>
    		<div style="display: flex; flex-wrap: wrap;">
    		<?php 
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
	</div>
</div>

<?php 
	include("includes/site-footer.php"); 
?>