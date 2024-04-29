<!--
    TechTitans Store Comic Books Page
    Date last modified: 4/13/24
    Who last modified: Morgan Leger
-->
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
    <h1>Romance</h1>
    <div id="RomanceContainer">
        <?php
            include("connectdatabase.php");
            
            // SQL query to retrieve books data
            $sql = "SELECT name, author, genre, price, picturepath, description FROM comicbooks WHERE genre = 'Romance'";
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

    <h1>Horror</h1>
    <div id="HorrorContainer">
    <?php
            include("connectdatabase.php");
            
            // SQL query to retrieve books data
            $sql = "SELECT name, author, genre, price, picturepath, description FROM comicbooks WHERE genre = 'Horror'";
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

    <h1>Superhero</h1>
    <div id="SuperheroContainer">
    <?php
            include("connectdatabase.php");
            
            // SQL query to retrieve books data
            $sql = "SELECT name, author, genre, price, picturepath, description FROM comicbooks WHERE genre = 'Superhero'";
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

    <h1>Manga</h1>
    <div id="MangaContainer">
    <?php
            include("connectdatabase.php");
            
            // SQL query to retrieve books data
            $sql = "SELECT name, author, genre, price, picturepath, description FROM comicbooks WHERE genre = 'Manga'";
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
	<?php include("Footer.php") ?>
    <script src="navFunctions.js" defer></script>
    </body>

</html>