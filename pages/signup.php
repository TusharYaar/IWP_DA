<?php include 'header.php'; ?>
<div id="formContainer">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Enter email" />

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Enter password" />

    <label for="confirmpassword">Confirm Password</label>
    <input type="password" id="confirmpassword" placeholder="Confirm password" />

    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" placeholder="Enter first name" />

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" placeholder="Enter last name" />
    <a href="./login.php">Login</a>
    <button id="submitBtn">Sign up</button>
</div>
<script src="./jquery.js"></script>
<script>
$("#submitBtn").click(function() {
    if ($("#password").val() !== $("#confirmpassword").val()) {
        alert("Passwords do not match");
        return;
    }
    $.ajax({
            type: "POST",
            url: "../signup_submit.php",
            data: {
                email: $("#email").val(),
                password: $("#password").val(),
                firstname: $("#firstname").val(),
                lastname: $("#lastname").val(),
            },
        })
        .done(function(res) {
            const data = JSON.parse(res);
            if (data.success) window.location.replace("./home.html");
            else alert(data.message);
        })
        .fail(function(err) {
            alert("Error: " + err.statusText);
        });
});
</script>
<?php include 'footer.php'; ?>