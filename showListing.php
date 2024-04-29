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

            .Hotcontainer h2{
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
            $sql_videogames = "SELECT name,developer,genre,price,picturepath FROM videogames WHERE userAdd = TRUE ORDER BY genre";
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
                        echo '<div class="Hotcontainer">';
                        echo '<h2>'.$row["genre"].'</h2>';
                        $displayedGenres[] = $row["genre"];
                        
                    }
                    //Display game details
                    echo '<div class="book">';
                        echo '<h2>'.$row["name"].'</h2>';
                        echo '<h4>'.$row["developer"].'</h4>';
                        echo '<img src="'.$row["picturepath"].'" alt="'.$row["name"].'">';
                        echo '<p>Price: $'.$row["price"].'</p>';
                        echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '</div>';

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