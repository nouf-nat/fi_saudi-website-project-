<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
// Initialize an array to store error messages
$errors = array();

// Check if there are any errors in the array
if (count($errors) > 0): ?>
    <div>
        <!-- Loop through the errors array and display each error as a paragraph -->
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
    </body>
</html>
