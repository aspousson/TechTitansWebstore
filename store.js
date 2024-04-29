/*
    JavaScript for store
    Created By: Jett Rogers
    4/12/2024
*/

// Function to display popup message
function showPopup() 
{
    document.getElementById("popup").style.display = "block";
}

// Function to close popup message
function closePopup() 
{
    document.getElementById("popup").style.display = "none";
}

// Add event listener to contact form
document.getElementById("contactForm").addEventListener("submit", function(event) 
{
    event.preventDefault();
    // Display popup message after form submission
    showPopup();
    // Clear form fields after form submission
    document.getElementById("contactForm").reset();
});

// Hide popup message on page load
window.onload = function()
{
    document.getElementById("popup").style.display = "none";
}