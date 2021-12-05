<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            <div id="links">
                <a href="home.php">Home</a>
                <?php if (isset($_SESSION["firstname"])) {
                echo "<a href='cart.php'>Cart</a> <a href='feedback.php'>Feedback</a> <a href='email.php'>Email</a>";
            } ?>
                <?php if (isset($_SESSION["firstname"]) && $_SESSION['type'] == "admin") {
            echo "<a href='add_dish.php'>Add Dish</a>
            <a href='update_dish.php'>Update Dish</a>
            <a href='delete_dish.php'>Delete Dish</a>";
        } else if (!isset($_SESSION["firstname"])) {
            echo "<a href='login.php'>Login</a> <a href='signup.php'>Signup</a>";
        } ?>
            </div>
            <?php if (isset($_SESSION["firstname"])) {
            echo "<button id='logout'>Logout</button>";
            }
            ?>
        </div>
    </div>
    <script src="./jquery.js"></script>
    <script>
    $("#logout").click(function() {
        $.ajax({
            type: "GET",
            url: "../logout_submit.php",
            success: function(result) {
                window.location.href = "home.php";
            }
        });
    });
    </script>