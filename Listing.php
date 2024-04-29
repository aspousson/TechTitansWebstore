<?php
	include("connectdatabase.php")
?>
<!DOCTYPE html>
<html lang="en">

    <header>
        <!-- Author of webpage-->
		<meta name = "author" content = "Morgan Leger"/>
		
		<!-- Description of webpage-->
		<meta name = "description" content = "About Tech Titan Morgan Leger"/>
		
		<!-- Keywords of webpage-->
		<meta name = "keywords" content = "HTML, Web Programming"/>
		
		<!-- Charachter set of webpage-->
		<meta charset = "UTF-8"/>
		
		<!--Link to external stylesheet -->
		<link href = "style.css" type = "text/css" rel = "stylesheet">
    </header>

     <body>
        <?php include("Header.php") ?>

		<form id = "listingForm" action = "Listing.php" method="post">
				<div>
					<label for="name">Game Name</label>
					<input type="text" id="name" name ="name">
				</div>
				<div>
					<label for="developer">Developer</label>
					<input type="text" id="developer" name ="developer">
				</div>
				<div>
					<label for="genre">Genre</label>
					<input type="text" id="genre" name ="genre">
				</div>
				<div>
					<label for="genre">Description</label>
					<input type="text" id="description" name ="description">
				</div>
				<div>
					<label for="price">Price</label>
					<input type="text" id="price" name ="price">
				</div>
				<button onclick="<?php insertListing() ?>">Submit</button>
			</form>
		<?php
			function insertListing()
			{
				global $conn;
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (isset($_POST['name'], $_POST['developer'], $_POST['genre'], $_POST['price'])) {
					$genre = $_POST['genre'];
					$name = $_POST['name'];
					$price = $_POST['price'];
					$developer = $_POST['developer'];
					$description = isset($_POST['description']) ? $_POST['description'] : '';
					$lister = isset($_SESSION['id']) ? $_SESSION['id'] : '';
					$sqlStatement = 'INSERT INTO videogames (name, developer, genre, price, description, userAdd, lister) VALUES (?, ?, ?, ?, ?, ?, ?)';
					$stmt = mysqli_prepare($conn, $sqlStatement);
					$userAddValue = 1;

					mysqli_stmt_bind_param($stmt, 'sssssii', $name, $developer, $genre, $price, $description, $userAddValue, $lister);
					$result = mysqli_stmt_execute($stmt);

					if ($result) 
					{
						// Redirect if insertion is successful
						header("Location: Listing.php");
						exit();
					} 
					else 
					{
						// Display error message if insertion fails
						echo '<script>alert("Missing/Incorrect Input")</script>';
						header("refresh:1");
					}
				} 
				else 
				{
					// Handle case when required fields are not set
					echo '<script>alert("Missing required fields")</script>';
					header("refresh:1");
				}
			}
			}
			?>
			<!--Broad View of Video Game Window-->
		<?php include("Footer.php") ?>
    </body>
	<script src="store.js" defer></script>
</html>