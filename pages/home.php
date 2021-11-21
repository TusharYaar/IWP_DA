<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
</head>

<body>
    <?php if(isset($_SESSION)) header("Location: login.html"); ?>
    <?php include 'header.php'; ?>
    <div>
        <h1>Home</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, quisquam.</p>
        <div id="searchBox">
            <input type="text" name="search" placeholder="Search..." />
            <button id="searchBtn">Search</button>
        </div>
    </div>

    <script src="./jquery.js"></script>
    <script>
    // Search button
    $("#searchBtn").click(function() {
        console.log("Searching...");
        var search = document.getElementById("searchBox").value;
        $.getJSON("../search.php?search=" + search, function(data) {
            console.log(data);
        });
    });
    </script>
    <?php include 'footer.php'; ?>

</body>

</html>