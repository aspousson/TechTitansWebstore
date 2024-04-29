<div class="header">
    <img src="Images/McNeeseLogo.png" alt="McNeese" id="mcneeselogotop"> <!--Mcneese logo-->

    <!--Search bar-->
    <div class="search">
        <input type="text" class="searchInput" placeholder="Enter Game or Comic name">
    </div>

    <!--Sign in button-->
    <a href="signin.html" id="signin">
        <div class="signinbutton">
            <button>Sign In
                <img id="signinImage" src="Images/SignIn.png" alt="Sign In">
            </button>
        </div>
    </a>

    <!--Cart button-->
    <a href="cart.php" id="cart">
        <div class="cartbutton">
            <button>Cart
                <img id="cartImage" src="Images/ShoppingCart.png" alt="Shopping Cart">
            </button>
        </div>
    </a>
	<a href="Listing.php" id="listing" target ='_self'>
		<button onclick ="showForm()">Listings</button>
	</a>
</div>

<!--Navigation bar-->
<nav>
    <ul class="navbar">
        <li><a href="index.php" target ='_self'>Home</a></li> 				            <!--When clicked, shows the Home page-->
        <li><a href="Project_ComicBooksPage.php" target ='_self'>Comic Books</a></li> 	<!--When clicked, shows the Comic Boks page-->
        <li><a href="Project_VideoGamesPage.php" target ='_self'>Video Games</a></li> 	<!--When clicked, shows the Games page-->
	    <li><a href="showListing.php" target ='_self'>User Listings</a></li> 		    <!--When clicked, shows the About Us page-->
	    <li><a href="Project_ContactUsPage.php" target ='_self'>Contact Us</a></li> 	<!--When clicked, shows the Contact Us page-->
        <li><a href="Project_AboutUsPage.php" target ='_self'>About Us</a></li> 	    <!--When clicked, shows the About Us page-->
    </ul>
</nav>
