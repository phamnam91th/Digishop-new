<?php
    require "config.php";
    require "show-manage.php";
    $p = new logins;
    if(isset($_POST["save"])) {
        $p->user_name = $_POST["username"];
        $p->pass_word = sha1($_POST["pwd"]);
        $p->level = 1;
        $p->phone = $_POST["phone"];
        $p->email = $_POST["email"];
        $p->status = "";
        $p->create_at = "NOW()";
        
        if(!$p->check_username()) {
            $p->register();
        } else {
            echo "user name areadry exit";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam1</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h4>Register form</h4>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pwd">
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email">
            </div>
            <input type="submit" name="save" value="Registration">
            <p>If you have account <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>