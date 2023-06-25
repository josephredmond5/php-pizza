<?php

include('config/db_connect.php');

$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    // Check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    // Check title
    if (empty($_POST['title'])) {
        $errors['title'] = 'A title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }

    // Check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least 1 ingredient is required <br />';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^[a-zA-Z\s]+(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }

    if (array_filter($errors)) {
        // There are errors in the form
        // Display the errors to the user
        echo 'Errors in the form:<br>';
        echo $errors['email'];
        echo $errors['title'];
        echo $errors['ingredients'];
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // Create SQL
        $sql = "INSERT INTO pizza(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

        // Save to DB and check
        if (mysqli_query($conn, $sql)) {
            // Success
            header('location: index.php');
        } else {
            // Error
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
<h4 class="center"> Add a pizza</h4>

<form class="white" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label>your email</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <div class="red-text"><?php echo $errors['email'] ?></div>
    <label>pizza title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
    <div class="red-text"><?php echo $errors['title'] ?></div>
    <label>Ingredients (comma separated)</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    <div class="red-text"><?php echo $errors['ingredients'] ?></div>
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
</form>

</section>

<?php include('templates/footer.php'); ?>

</body>
</html>
