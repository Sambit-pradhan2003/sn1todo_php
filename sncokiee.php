<?php
// Check if the "username" cookie is set
if(isset($_COOKIE['username'])) {
    // Print the value of the "username" cookie
    echo "Welcome back, " . $_COOKIE['username'];
} else {
    echo "Welcome, Guest";
}
?>
