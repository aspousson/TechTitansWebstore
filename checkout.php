<!--
    PHP file for the McNeese Bookstore Checkout
    Author: Jett Rogers
    Created On: 4/22/2024
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookstore Cart</title>
        <link rel="stylesheet" href="style.css"> <!--Link to CSS file-->
        <link rel="stylesheet" href="checkout.css"> <!--Link to CSS file-->

        <style>
            .btn {
                background-color: #007bff;
                color: white;
                padding: 12px;
                margin: 10px 0;
                border: none;
                width: 100%;
                border-radius: 3px;
                cursor: pointer;
                font-size: 17px;
            }
            
            .btn:hover {
                background-color: rgba(4, 82, 156, 255);;
            }
        </style>
    </head>
    <body>

    <?php
        include("Header.php");
    ?>
    <div class="checkout">
        <h2>Checkout Form</h2>
        <div class="row">
            <div class="col75">
                <div class="container">
                    <form action="confirmation.php">
                    
                        <div class="row">
                        <div class="col50">
                            <h3>Billing Address</h3>
                            
                            <label for="fname">Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required >

                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com" required pattern="[A-Za-z]*@[A-Za-z]*.[A-Za-z]*">

                            <label for="adr">Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>

                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="Lake Charles" required>

                            <div class="row">
                                <div class="col50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="LA" required pattern="[A-Z][A-Z]">
                                </div>
                                <div class="col50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="70605" required pattern="[0-9]{5}">
                                </div>
                            </div>
                        </div>

                        <div class="col50">
                            <h3>Payment</h3>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>

                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required pattern="[0-9]{4}[-][0-9]{4}[-][0-9]{4}[-][0-9]{4}">

                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>

                            <div class="row">
                                <div class="col50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018" required pattern="[0-9]{4}">
                                </div>
                                <div class="col50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352" required pattern="[0-9][0-9][0-9]*">
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <input type="submit" value="Complete Checkout" class="btn">
                    </form>
                </div>
            </div>
            <div class="col25">
                <div class="container">
                    <?php
                        $count = $_POST['count'];
                        $total = $_POST['total'];
                    ?>
                    <h2>Cart <span class="price" style="color:black"> <b><?php echo $count;?></b></span></h2>
                    <hr>
                    <h3>Total <span class="price" style="color:black"><b>$<?php echo $total;?></b></span></h3>
                </div>
            </div>
    </div>
        
    </body>
    <?php
        include("Footer.php");
    ?>
</html>