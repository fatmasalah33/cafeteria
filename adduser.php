

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if(isset($_GET['errors'])){
    $errors = (array)json_decode($_GET['errors']);
    // echo $errors["required"];
   // var_dump($errors);
    if(isset($errors["required"])) echo "<h3 style='text-align:center;color:Red'>{$errors['required']}</h3>";

}
?>
    <form method="post" action="controller.php" enctype="multipart/form-data">
            Name<input type="text" name="name"><br><br>
            Email<input type="email" name="email"><br><br>
            Passwoord<input type="password" name="password"><br><br>
            ConfirmPasswoord<input type="password" name="confirmpassword"><br><br>
            Rome No<input type="number" name="roomnumber" min="1" max="5"><br><br>
            Ext<input type="number" name="ext" min="1" max="5000"><br><br>
            <input type="file" name="imageuser" /><br><br>
            <input type="submit"   name="adduser" value="Add User">
            <a href="allusers.php">show all users</a>
            <input type="reset">


    </form>
</body>
</html>