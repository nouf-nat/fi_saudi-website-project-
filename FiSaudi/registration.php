<?php include('server.php'); ?> 
<!-- Include server-side script to handle user registration -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadata and external CSS for the registration page -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register | Fi Saudi</title>
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

        <!-- Main content for the registration form -->
        <main>
            <h1>Register</h1>
            <!-- User registration form -->
            <form action="registration.php" method="post" required>
                <!-- Include file for displaying error messages -->
                <?php include('errors.php'); ?>

                <!-- Form fields for user registration -->
                <h2>Register</h2>

                <label>Username:</label>
                <input type="text" name="username" placeholder="Username">
                
                <label>Select Your Country:</label>
                <input class="li" list="countries" name="country">
                <datalist id="countries">
                    <option value="Saudi Arabia">
                    <option value="UAE">
                    <option value="Oman">
                    <option value="Qatar">
                    <option value="UK">
                    <option value="Germany">
                    <option value="Italy">
                    <option value="Spain">
                    <option value="USA">
                    <option value="Canada">
                    <option value="Japan">
                </datalist><br><br>
                
                <label>Phone Number:</label>
                <input type="text" name="phone" placeholder="Phone Number"><br><br>

                <label>Email:</label>
                <input type="text" name="email" placeholder="Email">

                <label>Password:</label>
                <input type="password" name="password_1" placeholder="Password">
                
                <input type="password" name="password_2" placeholder="Confirm Password">

                <!-- Registration button -->
                <button type="submit" name="register">Register</button>
            </form>
        </main>

        <!-- Footer section -->
        <footer>
            <p>Fi Saudi &copy; 2024. All Rights Reserved.</p>
        </footer>
    </body>
</html>
