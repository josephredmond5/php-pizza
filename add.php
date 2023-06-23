<?php 

// the form detauils will be stored in the GET array
// if(isset($_GET['submit'])){
//    echo $_GET['email'];
//    echo $_GET['title'];
//    echo $_GET['Ingridients']; 
// } 


$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    // ...

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    // check title
    if (empty($_POST['title'])) {
        $errors['title'] = 'A title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/⌃[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }

    // check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least 1 ingredient is required <br />';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^[a-zA-Z\s]+(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }
}    

    // end of POST check

?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
<h4 class="center"> Add a pizza</h4>

<form class="white" action="add.php" method="POST">
    <label>your email</label>
    <input type="text" name="email" value="<?php echo $email ?>">
    <div class="red-text"><?php echo $errors['email']?></div>
    <label>pizza title</label>
    <input type="text" name="title" value="<?php echo $title ?>">
    <div class="red-text"><?php echo $errors['title']?></div>
    <label>Ingridients (comma seperated)</label>
    <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
    <div class="red-text"><?php echo $errors['ingredients']?></div>
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
</form>

</section>


<?php include('templates/footer.php'); ?>



</body>
</html>