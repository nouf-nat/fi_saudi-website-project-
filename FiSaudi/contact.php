<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata and external CSS for the Contact Us page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Fi Saudi</title>
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
    <!-- Main content -->
    <main>
        <!-- Page title -->
        <h1>Contact Us</h1>
        <!-- Contact form for users to submit their message -->
        <form action="contact.php" method="post" required>
            <label>Name:</label>
            <input type="text" id="name" name="name">

            <label>Email:</label>
            <input type="email" id="email" name="email">

            <label>Message:</label>
            <textarea id="message" name="message" rows="5"></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
    </main>
    <!-- PHP script to handle form submission -->
    <?php
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'fi_saudi');

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        // Insert the form data into the contact table
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

        // Execute the SQL query
        $result = mysqli_query($db, $sql);

        // Check if the query execution was successful
        if ($result) {
            // Display a success message if the record was added successfully
            echo "<p><h3>Message submit successfully</h3></p><br>";
        } else {
            // Display an error message if the query failed
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
    ?>
    <!-- Footer section -->
    <footer>
        <p>Fi Saudi &copy; 2024. All Rights Reserved.</p>
    </footer>
</body>
</html>