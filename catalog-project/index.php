<?php
  include("includes/site-header.php");
?>
<header style="margin-top: -70px; background-image: url(image/field-background.jpg); background-repeat: no-repeat; background-size: cover; text-align: center; border-bottom: 5px solid rgb(52, 58, 64); padding-bottom: 100px;">
	<h1 style="padding-top: 150px; font-size: 70px; color: white;">Horses for sale Canada</h1>
</header>
<main style="margin: 24px 60px;">
	<div>
		<div style="margin-bottom: 40px;">
			<h2>About</h2>
			<p style="width: 40rem;">This website demonstraits my skills with PHP/MySQL. The application allows a user to sign in and create a post, which inserts the content into a database. When the user submits an image for their post, the application makes different sizes of that image for different parts of the website. After the content is inserted into the database, the user can update or delete posts. On the "View Posts" page there are multiple choices to allow the user to filter through the results, similar to many online shops. The search bar is available throughout the website allowing a user to search for a specific post.</p>
			<p style="width: 40rem;">The website design and layout is a free bootstrap template with minor changes made by me.</p>
		</div>
		<div>
			
		</div>
	</div>
	<div>
		<div style="display: flex; margin-bottom: 40px; ">
			<!-- Discipline -->
			<div class="card mb-4" style="margin-right: 2.5%">
		        <img class="card-img-top" src="image/dressage.jpg" alt="Card image cap">
		        <div class="card-body">
		          <h2 class="card-title">Dressage</h2>
		          <p class="card-text">Looking for the perfect dressage horse to be your next champion?</p>
		          <!-- Put the link as the search query! -->
		          <a href="display.php?gender=&breed=&color=&discipline=Dressage&submit=Submit" class="btn btn-primary">View Posts &rarr;</a>
		    	</div>
	          <div class="card-footer text-muted">
	          </div>
	    	</div>
			<!-- Breed -->
			<div class="card mb-4" style="margin-right: 2.5%">
		        <img class="card-img-top" src="image/warmblood.jpg" alt="Card image cap">
		        <div class="card-body">
		          <h2 class="card-title">Warmblood</h2>
		          <p class="card-text" style="width: 309px;">This european horse breed was made for eventing! They are used privarily for dressage, jumping and eventing.</p>
		          <!-- Put the link as the search query! -->
		          <a href="display.php?gender=&breed=Warmblood&color=&discipline=&submit=Submit" class="btn btn-primary">View Posts &rarr;</a>
		    	</div>
	          <div class="card-footer text-muted">
	          </div>
	        </div>
			<!-- Cost -->
			<div class="card mb-4">
		        <img class="card-img-top" src="image/henry.jpg" alt="Card image cap">
		        <div class="card-body">
		          <h2 class="card-title">Horse's Under $4000</h2>
		          <p class="card-text">Looking for a nice horse under $4000?</p>
		          <!-- Put the link as the search query! -->
		          <a href="display.php?displayby=dal_cost&min=0&max=4000" class="btn btn-primary">View Posts &rarr;</a>
		    	</div>
	          <div class="card-footer text-muted">
	          </div>
			</div>
		</div>
	</div>
</main>

<?php
  include("includes/site-footer.php");
?>