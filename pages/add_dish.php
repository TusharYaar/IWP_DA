<?php include 'header.php'; ?>
<div id="container">
    <h1 id="pageHeading">Add Dish</h1>
    <p id="message">Message</p>
    <div id="formContainer">
        <label for="name">Name</label>
        <input type="name" name="name" id="name" placeholder="Enter name" />

        <label for="description">Description</label>
        <input type="description" name="description" id="description" placeholder="Enter description" />

        <label for="price">Price</label>
        <input type="number" step="1" id="price" placeholder="Enter price" min="0" />

        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="appetizer">Appetizer</option>
            <option value="main">Main</option>
            <option value="dessert">Dessert</option>
        </select>

        <button id="submitBtn">Add Dish</button>
    </div>
</div>
<script src="./jquery.js"></script>
<script>
$("#submitBtn").click(function() {
    console.log("called");
    $.ajax({
            type: "POST",
            url: "../add_dish.php",
            data: {
                name: $("#name").val(),
                description: $("#description").val(),
                price: $("#price").val(),
                category: $("#category").val(),
            },
        })
        .done(function(res) {
            res = JSON.parse(res);
            if (res.success) {
                $("#message").text(res.message);
                $("#message").css("color", "green");

                $("#name").val("");
                $("#description").val("");
                $("#price").val("");
            } else {
                $("#message").text(res.message);
                $("#message").css("color", "red");
            }
            $("#message").css("visibility", "visible");


        })
        .fail(function(err) {
            alert("Error: " + err.statusText);
        });
});
</script>
<?php include 'footer.php'; ?>