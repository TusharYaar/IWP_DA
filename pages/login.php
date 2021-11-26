<?php include "header.php"; ?>
<div id="container">
    <div id="formContainer">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" />
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" />
        <a href="./signup.php">Sign up</a>
        <button id="submitBtn">Submit</button>
    </div>
    <script src="./jquery.js"></script>
    <script>
    $("#submitBtn").click(function() {
        var data = {
            email: $("#email").val(),
            password: $("#password").val(),
        };

        $.ajax({
            type: "POST",
            url: "../login_submit.php",
            data: {
                email: data.email,
                password: data.password,
            },
        }).done(function(res) {
            console.log(res);
            const data = JSON.parse(res);
            if
            if (data.success) window.location.replace("./home.php");
            else alert("Invalid credentials");
        });
    });
    </script>

</div>
<?php include "footer.php"; ?>