<?php include 'header.php'; ?>
<div id="container">
    <div>
        <label for="name">Name</label>
        <input type="name" name="name" id="name" placeholder="Enter name" />

        <label for="description">Description</label>
        <input type="description" name="description" id="description" placeholder="Enter description" />

        <label for="price">Price</label>
        <input type="number" step="0.01" id="price" placeholder="Enter price" min="0" />

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
    if ($("#password").val() !== $("#confirmpassword").val()) {
        alert("Passwords do not match");
        return;
    }
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
            console.log(res);
            // const data = JSON.parse(res);
            // if (data.success) window.location.replace("./home.html");
            // else alert(data.message);
        })
        .fail(function(err) {
            alert("Error: " + err.statusText);
        });
});
</script>
<?php include 'header.php'; ?>