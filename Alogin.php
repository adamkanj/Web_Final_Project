<?php
$errors = array('Username' => '', 'Password' => '');

if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    if (empty($Username) || empty($Password)) {
        $errors['Username'] = 'Please enter email address';
        $errors['Password'] = 'Please enter your password';
    } else {
        if ($Username == 'admin') {
            if ($Password == 'admin') {
                header("Location: Admin.php");
                exit();
            } else {
                $errors['Password'] = "Incorrect Password.";
            }
        } else {
            $errors['Username'] = "Username does not exist.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <h1>LogIn Here</h1>

    <form method="post" action="Alogin.php" class="container">

        <label for="Username">Username:</label>
        <input type="text" name="Username">
        <p class='error'><?php echo $errors['Username'] ?></p>
        <br><br>

        <label for="Password">Password:</label>
        <input type="password" name="Password">
        <p class='error'><?php echo $errors['Password'] ?></p>
        <br><br>

        <input type='submit' name='Login' value='Login'>
    </form>
</body>

</html>