<?php
/*
    PHP file that connects to the MySQL database
    and selects product information
    Author: Jett Rogers
    Created On: 4/28/2024
*/
    $db_server = "localhost"; // server name
    $db_username = "root"; //username
    $db_password = ""; //password
    $db_name = "techtitans"; //name of database
    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set charset to UTF-8
    $conn->set_charset("utf8");

    //Retrieve data from videogames table
    $videogames = array();

    $sql_videogames = "SELECT name,developer,genre,price,picturepath FROM videogames";
    $result_videogames = mysqli_query($conn, $sql_videogames);
    if (mysqli_num_rows($result_videogames) > 0) {
        while ($row = mysqli_fetch_assoc($result_videogames)) {
            $videogames[] = $row;
        }
    }

    //Retrieve data from comicbooks table
    $comicbooks = array();


    $sql_comicbooks = "SELECT name,author,genre,price,picturepath FROM comicbooks";
    $result_comicbooks = mysqli_query($conn, $sql_comicbooks);
    if (mysqli_num_rows($result_comicbooks) > 0) {
        while ($row = mysqli_fetch_assoc($result_comicbooks)) {
            $comicbooks[] = $row;
        }
    }
?>
