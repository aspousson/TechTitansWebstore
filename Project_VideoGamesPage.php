<!--
    TechTitans Store Video Games Page
    Date last modified: 4/28/2024
    Who last modified: Morgan Leger
-->
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
		<style>
			#listingForm 
			{
				display: none;
			}

            .videogamescontainer h2{
                display:block;
                width:100%
            }
		</style>
    </header>

     <body>
		<?php include("Header.php") ?>
		<?php
            include("connectdatabase.php");
            $videogames = array();
            $sql_videogames = "SELECT videogameID,name,developer,genre,price,picturepath,description FROM videogames WHERE userAdd = FALSE ORDER BY genre";
            $result_videogames = mysqli_query($conn, $sql_videogames);
            if (mysqli_num_rows($result_videogames) > 0) 
            {
                //Keep track of displayed genres
                $displayedGenres = array();
                while ($row = mysqli_fetch_assoc($result_videogames))
                {
                    //Check if the genre has already been displayed
                    if (!in_array($row["genre"], $displayedGenres)) 
                    {
                        echo '<div class="videogamescontainer">';
                        echo '<h2>'.$row["genre"].'</h2>';
                        $displayedGenres[] = $row["genre"];
                        
                    }
                    
                    //Display game details
                    ?>
                    <div class="book">
                        <h1><?php echo htmlspecialchars($row['name'])?> </h1>
                        <i> <?php echo htmlspecialchars($row['developer'])?> </i>
                        <p> <?php echo htmlspecialchars($row['genre'])?> </p>
                        <hr>
                        <img src="<?php echo htmlspecialchars($row['picturepath'])?>" alt="Book Cover">
                        <hr>
                        <p> <?php echo htmlspecialchars($row['price'])?> </p>
                        <p class="description"> <?php echo htmlspecialchars($row['description'])?> </p>
                        <form action="addGame.php" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['videogameID'])?>">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['name'])?>">
                            <input type="hidden" name="developer" value="<?php echo htmlspecialchars($row['developer'])?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($row['price'])?>">
                            <input type="hidden" name="description" value="<?php echo htmlspecialchars($row['description'])?>">
                            <input type="submit" class="add-to-cart-btn" value="Add to Cart">
                        </form>
                    </div>
                    <?php
                    if (!in_array($row["genre"], $displayedGenres) && $row != end($videogames)) 
                    {
                        echo '</div>';
                    }
                }
            } 
            else 
            {
                echo "<h1>NO USER INPUTS</h1>";
            }
        ?>
		<?php include("Footer.php") ?>
	</body>
	<script src="store.js" defer></script>
</html>
