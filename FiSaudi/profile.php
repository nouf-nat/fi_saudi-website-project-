<!DOCTYPE html>
<?php
// Start the session
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

// Handle logout by destroying the session and redirecting to the homepage
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fi_saudi');

// Fetch user data based on the logged-in username
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

// Handle data update when the update button is clicked
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $update_sql = "UPDATE users SET username = '$username', country = '$country', phone = '$phone', email = '$email' WHERE username = '$username'";
    if (mysqli_query($db, $update_sql)) {
        echo "<p>Data updated successfully.</p>";
    } else {
        echo "<p>Error updating data.</p>";
    }
}

// Handle data deletion when the delete button is clicked
if (isset($_POST['delete'])) {
    $delete_sql = "DELETE FROM users WHERE username = '$username'";
    if (mysqli_query($db, $delete_sql)) {
        echo "<p>Data deleted successfully.</p>";
    } else {
        echo "<p>Error deleting data.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata for the page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile | Fi Saudi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header section with navigation menu -->
    <header>
        <nav>
            <ul>
                <!-- List of navigation links -->
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

    <!-- Main content section for displaying user profile -->
    <main>
        <h1>Your Profile</h1>
        <form action="profile.php" method="post" required>
            <!-- Input fields pre-filled with user data -->
            <label>Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>">
            
            <label>Country:</label>
            <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>">
            
            <label>Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
            
            <label>Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>">
            
            <!-- Buttons for updating or deleting the account -->
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete" style="background-color: red; color: white;">Delete Account</button>
        </form>
    </main>

    <!-- Logout button -->
    <a href="index.php?logout='1'" style="padding: 10px 20px; background-color: #76c7a6; color: #004b28;
    text-decoration: none; font-size: 1.2rem; border-radius: 5px; font-weight: bold;">Logout</a>

    <!-- Footer section -->
    <footer>
        <p>Fi Saudi &copy; 2024. All Rights Reserved.</p>
    </footer>
</body>
</html>