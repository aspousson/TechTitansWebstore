<!--
    PHP file for the sign in
    Author: Jett Rogers
    Created On: 4/17/2024
-->

<?php 
    include("footer.php")
    include("connectdatabase.php");

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sqlStatement = 'SELECT userID, Username, Password FROM users WHERE Username=?';
        $stmt = mysqli_prepare($conn, $sqlStatement);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $results = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($results);
        $hashed_password = $row["Password"];
        $id = $row["userID"];

        //If username and password are correct
        if(mysqli_num_rows($results) > 0)
        {
            if (password_verify($password, $hashed_password)) 
            { 
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;

                echo'<script>alert("Welcome Back")</script>';
                echo '<script>window.location.href = "Index.php";</script>';
                exit;
            }
            else
            {
                echo'<script>alert("Incorrect Password")</script>';
                echo '<script>window.location.href = "signin.html";</script>';
                exit;
            }
        }

        //If username is incorrect
        else
        {
            echo'<script>alert("Incorrect Username")</script>';
            echo '<script>window.location.href = "signin.html";</script>';
        }
    }
    include("footer.php");
?>