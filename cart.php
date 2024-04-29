<!--
    PHP file for the McNeese Bookstore Cart
    Author: Jett Rogers
    Created On: 3/28/2024
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Store Cart</title>
        <link rel="stylesheet" href="cart.css"> <!--Link to CSS file-->
        <link rel="stylesheet" href="style.css">

        

    </head>
    <body> 
        <?php include("Header.php") ?>
        <?php include("connectdatabase.php"); ?>
        
        <div class="cart">

            <?php
                $_SESSION['id'] = 1;
                
                $customer_id = $_SESSION['id'];
            ?>

            <div class="columns">
                <h1>Shopping Cart</h1>
                <h3>Price</h3>
                <form action="" method="post">
                    <input type="hidden" name="customerId" value="<?php echo $customer_id; ?>">
                    <input type="submit" class="removeAll" value="Remove All">
                </form>
            </div>
            <hr>
            <?php
                

                // Query to get cart information
                $query = "SELECT videogames.videogameID, videogames.name, videogames.developer, 
                            videogames.price, videogames.description
                        FROM cart 
                        INNER JOIN videogames ON cart.videogameID = videogames.videogameID
                        WHERE cart.userID = ?";
                $statement = $conn->prepare($query);
                $statement->bind_param("i", $customer_id);
                $statement->execute();
                $gameResult = $statement->get_result();
                $total_cost = 0.00;

                $query = "SELECT comicbooks.comicbookID, comicbooks.name, comicbooks.author, 
                            comicbooks.price, comicbooks.description
                        FROM cart 
                        INNER JOIN comicbooks ON cart.comicbookID = comicbooks.comicbookID
                        WHERE cart.userID = ?";
                $statement = $conn->prepare($query);
                $statement->bind_param("i", $customer_id);
                $statement->execute();
                $bookResult = $statement->get_result();

                $count = 0;

                // Check if cart is empty
                if ($gameResult->num_rows === 0 && $bookResult->num_rows === 0) {
                    echo "<h3>Your cart is empty.</h3>";
                } else {
                    // Display cart items
                    while ($row = $gameResult->fetch_assoc()) {
                        ?>
                        <div class="item">
                            <div class="info">
                                <?php
                                    echo "<h3>Name: " . htmlspecialchars($row["name"]) . "</h3>";
                                    echo "<h4>Developer: " . htmlspecialchars($row["developer"]) . "</h4>";
                                ?>
                            </div>
                            <div class="info">
                                <?php
                                    echo "<p>Description: " . htmlspecialchars($row["description"]) . "</p>";
                                    echo "<p>$" . htmlspecialchars($row["price"]) . "</p>";
                                ?>
                            </div>
                            <form action="deleteGame.php" method="post">
                                <input type="hidden" name="productId" value="<?php echo $row['videogameID']; ?>">
                                <input type="hidden" name="customerId" value="<?php echo $customer_id; ?>">
                                <input type="submit" name="delete" class="deleteBTN" value="X" onClick="javascript:history.go(-1)">
                            </form>
                        </div>
                        <?php
                        // Keep track of total cost for each item
                        $total_cost += $row["price"];
                        $count += 1;
                    }

                    while ($row = $bookResult->fetch_assoc()) {
                        ?>
                        <div class="item">
                            <div class="info">
                                <?php
                                    echo "<h3>Comic: " . htmlspecialchars($row["name"]) . "</h3>";
                                    echo "<h4>Author: " . htmlspecialchars($row["author"]) . "</h4>";
                                ?>
                            </div>
                            <div class="info">
                                <?php
                                    echo "<p>Description: " . htmlspecialchars($row["description"]) . "</p>";
                                    echo "<p>$" . htmlspecialchars($row["price"]) . "</p>";
                                ?>
                            </div>
                            <form action="deleteComic.php" method="post">
                                <input type="hidden" name="productId" value="<?php echo $row['comicbookID']; ?>">
                                <input type="hidden" name="customerId" value="<?php echo $customer_id; ?>">
                                <input type="submit" name="delete" class="deleteBTN" value="X">
                            </form>
                            
                        </div>
                        <?php
                        // Keep track of total cost for each item
                        $total_cost += $row["price"];
                        $count += 1;
                    }

                // Display total cost
                echo "<hr><p><strong>Total Cost: $" . htmlspecialchars($total_cost) . "</strong></p>";

            ?>

            <form action="checkout.php" method="post">
                <input type="hidden" name="total" value="<?php echo $total_cost; ?>">
                <input type="hidden" name="count" value="<?php echo $count; ?>">
                <input type="submit" value="Checkout" class="checkout">
            </form>
        </div>   

        <?php
            }
            include("footer.php"); //Display footer
        ?>
    </body>
</html>
