<?php 

// the form detauils will be stored in the GET array
// if(isset($_GET['submit'])){
//    echo $_GET['email'];
//    echo $_GET['title'];
//    echo $_GET['Ingridients']; 
// } 

if(isset($_POST['submit'])){ // this is to stop hackers destryoing this
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['Ingridients']); 

        // check email
    if(empty($_POST['email'])){ // this is checking if there has been any info put in the input fields
        echo 'an email is required <br />';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // this filter is built into PHP 
           ECHO 'email must be a valid email address'; // this whole IF statement checks if the email is valid
        }
    }
        // check title
    if(empty($_POST['title'])){
        echo 'a title is required <br />';
    } else {
        $title = $_POST['title'];
        if(!preg_match('/⌃[a-zA-Z\s]+$/', $title)){
            echo 'Title must be letters and spaces only';
        }
    }

        // check ingridients
        if (empty($_POST['Ingridients'])) { // check if the ingridients are comma seperated
            echo 'At least 1 ingredient is required <br />';
        } else {
            $Ingridients = $_POST['Ingridients'];
            if (!preg_match('/⌃[a-zA-Z\s]+(,\s*[a-zA-Z\s]*)*$/', $Ingridients)) {
                echo 'Ingredients must be a comma seperated list';
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
    <input type="text" name="email">
    <label>pizza title</label>
    <input type="text" name="title">
    <label>Ingridients (comma seperated)</label>
    <input type="text" name="ingridients">
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
</form>

</section>


<?php include('templates/footer.php'); ?>



</body>
</html>