<?php include 'header.php'; ?>
<div id="container">
    <h1 id="pageHeading">Send Feedback</h1>
    <div id="formContainer">
        <label for="feedback">Feedback</label>
        <textarea name="feedback" id="feedback" rows="4">
            </textarea>

        <button id="submitBtn">Send Feedback</button>
    </div>
</div>
<script src="./jquery.js"></script>
<script>
$("#submitBtn").click(function() {
    $.ajax({
            type: "POST",
            url: "../feedback_submit.php",
            data: {
                message: $("#feedback").val(),
            },
        })
        .done(function(res) {
            res = JSON.parse(res);
            if (res.success)
                $("#feedback").val("");
            alert(res.message);
        })
        .fail(function(err) {
            alert("Error: " + err.statusText);
        });
});
</script>
<?php include 'footer.php'; ?>