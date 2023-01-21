<?php
require "dbBroker.php";
require "model/user.php";

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $usr = new User(1, $name, $password);
    $rs = User::logIn($usr, $conn);

    if ($rs->num_rows == 1) {

        echo "Uspesno ste se prijavili";
        $_SESSION['user_id'] = $usr->id;
        $_SESSION['logged'] = "ulogovan";
        header('Location: home.php');
        exit();
    } else {

        echo '<script type="text/javascript">alert("Pogresni podaci za login");
                    </script>';
        exit();
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">
    <title>NBA APP</title>
</head>

<body>

    <div class="login">
        <div class="nba-logo-image">
            <img src="image/nba-logo-image.webp" />
        </div>
        <form role="form" method="post" action="#" class="forma">

            <div class="form-group row">
                <label for="inputUser" class="col-sm-8 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUser" name="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-8 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Sign in" name="submit" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>