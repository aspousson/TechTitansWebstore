<!--
    PHP file for the McNeese Bookstore Checkout
    Author: Jett Rogers
    Created On: 4/22/2024
-->
<?php
    include("connectdatabase.php");

    $query = "DELETE FROM cart";
    $statement = $conn->prepare($query);
    if ($statement->execute()) {
        // Item successfully removed
        echo "<script>alert('Purchase Confirmed.');</script>";
        include("index.php");
    } else {
        // Error removing Item
        echo "<script>alert('Error Completing Purchase. Please try again.');</script>";
    }
?>