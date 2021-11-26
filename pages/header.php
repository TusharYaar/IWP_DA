<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css" type="text/css" />
    <title>19BCE0559 - IP DA</title>
</head>

<body>
    <div id="navbar">
        <div id="topNavbar">
            <h1>Restraunt Billing System </h1>
            <?php session_start();
                if (isset($_SESSION['firstname'])) {
                     echo "<h2> ".$_SESSION['firstname']."</h2>"; 
                    }
                else { echo "<h4> Not LoggedIn </h4>"; }?>
        </div>
        <div id="bottomNavbar">
            <a href="home.php">Home</a>
            <?php if (isset($_SESSION["firstname"]) && $_SESSION['type'] == "admin") {
            echo "<a href='add_dish.php'>Add Dish</a>
            <a href='update_dish.php'>Update Dish</a>
            <a href='delete_dish.php'>Delete Dish</a>";
        } else {
            echo "<a href='login.php'>Login</a> <a href='signup.php'>Signup</a>";
        } ?>

        </div>
    </div>