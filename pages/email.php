<?php include 'header.php'; ?>
<div id="container">
    <h1 id="pageHeading">Send Feedback</h1>
    <div id="formContainer">
        <label for="to">To</label>
        <input name="to" id="to" />
        <label for="subject">Subject</label>
        <input name="subject" id="subject" />
        <label for="message1">Message</label>
        <textarea name="message" id="message1" rows="4">
        </textarea>

        <button id="submitBtn">Send Email</button>
    </div>
</div>
<script src="./jquery.js"></script>
<script>
$("#submitBtn").click(function() {
    $.ajax({
            type: "POST",
            url: "../email_submit.php",
            data: {
                to: $("#to").val(),
                subject: $("#subject").val(),
                message: $("#message1").val(),
            },
        })
        .done(function(res) {
            res = JSON.parse(res);
            if (res.success) {
                $("#message").val("");
                $("#to").val("");
                $("#subject").val("");
            }

            alert(res.message);
        })
        .fail(function(err) {
            alert("Error: " + err.statusText);
        });
});
</script>
<?php include 'footer.php'; ?>