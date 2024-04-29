<!--
    TechTitans Store
    Date last modified: 4/13/24
    Who last modified: Adam Pousson
-->

<!DOCTYPE html>
<html lang="en">

    <header>
        <!-- Author of webpage-->
		<meta name = "author" content = "Jett Rogers"/>
		
		<!-- Description of webpage-->
		<meta name = "description" content = "TexhTitans Store"/>
		
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

            .Hotcontainer h2
            {
                display:block;
                width:100%
            }

            .book {
                width: calc(12.5% - 20px);
                margin-right: 20px;
                margin-bottom: 20px;
                box-sizing: border-box;
                text-align: center;
                position: relative;
                padding: 20px;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
		</style>
    </header>

    <body>

        <?php include("Header.php") ?>
        <!--Home Page Content-->
        <div id="HomePage">
		
            <h2>Hottest Deals</h2>
            <div id="bookContainer">
                <?php
                    include("connectdatabase.php");
                    
                    // SQL query to retrieve books data
                    $sql = "SELECT comicbookID, name, author, genre, price, picturepath, description FROM comicbooks ORDER BY price ASC LIMIT 4";
                    $result = mysqli_query($conn, $sql);
                    $sql = "SELECT * FROM videogames WHERE userAdd = FALSE AND price < 30 ORDER BY price ASC LIMIT 4";
                    $result2 = mysqli_query($conn, $sql);
                    
                    // Close database connection
                    $conn->close();

                    // Output books as HTML
                    if ($result->num_rows > 0) {
                        $lasGenre = null;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="book">
                                <h1><?php echo htmlspecialchars($row['name'])?> </h1>
                                <i> <?php echo htmlspecialchars($row['author'])?> </i>
                                <p> <?php echo htmlspecialchars($row['genre'])?> </p>
                                <hr>
                                <img src="<?php echo htmlspecialchars($row['picturepath'])?>" alt="Book Cover">
                                <hr>
                                <p> <?php echo htmlspecialchars($row['price'])?> </p>
                                <p class="description"> <?php echo htmlspecialchars($row['description'])?> </p>
                                <form action="addComic.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['comicbookID'])?>">
                                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['name'])?>">
                                    <input type="hidden" name="author" value="<?php echo htmlspecialchars($row['author'])?>">
                                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($row['price'])?>">
                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($row['description'])?>">
                                    <input type="submit" class="add-to-cart-btn" value="Add to Cart">
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>No books found.</p>';
                    }

                    if ($result2->num_rows > 0) {
                        $lasGenre = null;
                        while ($row = $result2->fetch_assoc()) {
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
                        }
                    } else {
                        echo '<p>No games found.</p>';
                    }
                ?>
            </div>	

            <a href="Project_ComicBooksPage.php"><h2>Comic Books</h2></a>
            <div id="bookContainer">
                <?php
                    include("connectdatabase.php");
                    
                    // SQL query to retrieve books data
                    $sql = "SELECT comicbookID, name, author, genre, price, picturepath, description FROM comicbooks LIMIT 8";
                    $result = mysqli_query($conn, $sql);
                    
                    // Close database connection
                    $conn->close();

                    // Output books as HTML
                    if ($result->num_rows > 0) {
                        $lasGenre = null;
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="book">
                                <h1><?php echo htmlspecialchars($row['name'])?> </h1>
                                <i> <?php echo htmlspecialchars($row['author'])?> </i>
                                <p> <?php echo htmlspecialchars($row['genre'])?> </p>
                                <hr>
                                <img src="<?php echo htmlspecialchars($row['picturepath'])?>" alt="Book Cover">
                                <hr>
                                <p> <?php echo htmlspecialchars($row['price'])?> </p>
                                <p class="description"> <?php echo htmlspecialchars($row['description'])?> </p>
                                <form action="addComic.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['comicbookID'])?>">
                                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['name'])?>">
                                    <input type="hidden" name="author" value="<?php echo htmlspecialchars($row['author'])?>">
                                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($row['price'])?>">
                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($row['description'])?>">
                                    <input type="submit" class="add-to-cart-btn" value="Add to Cart">
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>No books found.</p>';
                    }
                ?>
            </div>	

            <a href="Project_VideoGamesPage.php"><h2>Video Games</h2></a>
            <div id="gameContainer">
                <?php
                        include("connectdatabase.php");
                        
                        //SQL query to retrieve videogame data
                        $sql = "SELECT * FROM videogames WHERE userAdd = FALSE LIMIT 8";
                        $result = mysqli_query($conn, $sql);
                        
                        $conn->close();

                        if ($result->num_rows > 0) {
                            $lasGenre = null;
                            while ($row = $result->fetch_assoc()) {
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
                            }
                        } else {
                            echo '<p>No games found.</p>';
                        }
                ?>
            </div>
        </div>

        <!--Footer Code-->
        <?php include("Footer.php") ?>
        <script src="store.js" defer></script>
    </body>

</html>