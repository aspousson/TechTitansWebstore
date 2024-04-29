<!--
    PHP file for the add to cart function
    Author: Jett Rogers
    Created On: 4/28/2024
-->

<?php
    include("connectdatabase.php");

    // Check if the game id is provided
    if(isset($_POST['id'])) {

        // Retrieve the game id
        $gameId = $_POST['id'];

        // Assume the customer ID is 1 for now
        $customer_id = 1;

        // Query to insert the game into the cart
        $query = "INSERT INTO cart (userID, videogameID, price) VALUES (?, ?, ?)";
        $statement = $conn->prepare($query);

        // Calculate total cost
        $price = $_POST['price'];

        // Bind parameters and execute the query
        $statement->bind_param("iii", $customer_id, $gameId, $price);
        if ($statement->execute()) {
            // Game added to cart successfully
            echo "<script>alert('Game added to cart successfully.');</script>";
            include("index.php");
        } 
        else {
            // Failed to add game to cart
            echo "<script>alert('Failed to add Game to cart. Please try again.');</script>";
        }
    } 
    else {
        // Game ID is not provided
        echo "<script>alert('Game ID is missing.');</script>";
    }
?>