<!--
    PHP file for the sign up function
    Author: Jett Rogers
    Created On: 4/28/2024
-->
<?php 
    include("connectdatabase.php");

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        $password = password_hash($password, PASSWORD_DEFAULT);
        try
        {
            $sqlStatement = 'INSERT INTO users(username, password, name, address)
                        VALUES(?,?,?,?)';
            $stmt = mysqli_prepare($conn, $sqlStatement);
            mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $name, $address);

            if(mysqli_stmt_execute($stmt))
            {
                $userQuery = 'SELECT userID FROM users WHERE Username=? AND Password=?';
                $stmt = mysqli_prepare($conn, $userQuery);
                mysqli_stmt_bind_param($stmt, "ss", $username, $password);

                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id);

                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                echo'<script>alert("Account Created"); window.location.href = "Index.php"</script>';
            }
            else
            {
                echo'<script>alert("Error Creating user. Please try again.")</script>';
                echo '<script>window.location.href = "signUp.html";</script>';
                exit;
            }
        }
        catch(Exception $e)
        {
            echo'<script>alert("Username already in use")</script>';
            echo '<script>window.location.href = "signUp.html";</script>';
            exit;
        }
        
    }
?>