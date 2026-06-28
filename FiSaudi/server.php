<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
session_start(); 
// Start a session to handle user login state.

$errors = array(); 
// Initialize an array to store error messages.

$db = mysqli_connect('localhost', 'root', '', 'fi_saudi'); 
// Connect to the MySQL database.

// Register user functionality
if (isset($_POST['register'])) {
    // Retrieve and sanitize user input.
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
    // Check if passwords match.
    if ($password_1 != $password_2) {
        array_push($errors, "Passwords do not match");
    }
    
    // Query to check if username or email already exists.
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    // Check for duplicate username or email.
    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }
    
    // If no errors, insert the user into the database.
    if (count($errors) == 0) {
        $password = md5($password_1); // Encrypt the password.
        $query = "INSERT INTO users (username, country, phone, email, password) VALUES('$username', '$country', '$phone', '$email', '$password')";
        $result = mysqli_query($db, $query);
        
        // Display success or error message.
        if ($result) {
            echo "<p><h3>New record created successfully</h3></p><br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
}

// Login functionality
if (isset($_POST['login'])) {
    // Retrieve and sanitize login input.
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    // If no errors, validate the user login.
    if (count($errors) == 0) {
        $password = md5($password); // Encrypt the password.
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        
        // Check if user exists and start a session.
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('location: profile.php'); // Redirect to profile page.
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
    </body>
</html>