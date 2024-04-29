<!--
    PHP file for the add to cart function
    Author: Jett Rogers
    Created On: 4/28/2024
-->
<?php
    include("connectdatabase.php");

    // Check if the comic id is provided
    if(isset($_POST['id'])) {

        // Retrieve the comic id
        $comicId = $_POST['id'];

        // Assume the customer ID is 1 for now
        $customer_id = 1;

        // Query to insert the comic into the cart
        $query = "INSERT INTO cart (userID, comicbookID, price) VALUES (?, ?, ?)";
        $statement = $conn->prepare($query);

        // Calculate total cost
        $price = $_POST['price'];

        // Bind parameters and execute the query
        $statement->bind_param("iii", $customer_id, $comicId, $price);
        if ($statement->execute()) {
            // Comic added to cart successfully
            echo "<script>alert('Comic added to cart successfully.');</script>";
            include("index.php");
        } 
        else {
            // Failed to add comic to cart
            echo "<script>alert('Failed to add comic to cart. Please try again.');</script>";
        }
    } 
    else {
        // Comic ID is not provided
        echo "<script>alert('Comic ID is missing.');</script>";
    }
?>