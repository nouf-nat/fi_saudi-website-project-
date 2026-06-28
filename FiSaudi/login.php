<?php include('server.php'); ?> 
<!-- Include server-side script for handling login functionality -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata and external CSS for the login page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Fi Saudi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header navigation bar -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="tourism.html">Tourism</a></li>
                <li><a href="landmarks.html">Landmarks</a></li>
                <li><a href="accommodations.html">Accommodations</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main content for the login form -->
    <main>
        <h1>Login</h1>
        <!-- User login form -->
        <form method="post" action="login.php">
            <!-- Include file for displaying error messages -->
            <?php include('errors.php'); ?>
            
            <!-- Form fields for login -->
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            
            <!-- Login button -->
            <button type="submit" name="login">Login</button>
            
            <!-- Link to registration page -->
            <p>Not yet a member? <a href="registration.php">Sign up</a></p>
        </form>
    </main>

    <!-- Footer section -->
    <footer>
        <p>Fi Saudi &copy; 2024. All Rights Reserved.</p>
    </footer>
</body>
</html>