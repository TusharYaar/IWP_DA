<?php include 'header.php'; ?>
<div id="container">
    <h2>Update Dish</h2>
    <div id="formContainer">
        <select id="allDishes">
        </select>

        <label for="dishID">Dish ID</label>
        <input type="text" name="dishID" id="dishID" readonly />

        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter name" />

        <label for="description">Description</label>
        <input type="text" name="description" id="description" placeholder="Enter description" />

        <label for="price">Price</label>
        <input type="number" step="1" id="price" placeholder="Enter price" min="0" />

        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="appetizer">Appetizer</option>
            <option value="main">Main</option>
            <option value="dessert">Dessert</option>
        </select>

        <button id="submitBtn">Update Dish</button>
    </div>
</div>
<script src="./jquery.js"></script>
<script>
let allDishes = [];
$("#submitBtn").click(function() {
    $.ajax({
            type: "POST",
            url: "../update_dish_submit.php",
            data: {
                id: $("#dishID").val(),
                name: $("#name").val(),
                description: $("#description").val(),
                price: $("#price").val(),
                category: $("#category").val(),
            },
        })
        .done(function(res) {
            console.log(res);
        })
        .fail(function(err) {
            alert("Error: " + err.statusText);
        });
});
$.get("../search_submit.php?search=", function(data) {
    allDishes = JSON.parse(data).dishes;
    allDishes.forEach(function(dish) {
        $("#allDishes").append(`<option value="${dish.id}">${dish.name}</option>`);
    });
});
$("#allDishes").change(function() {
    const id = $(this).val();
    let dish = allDishes.find(element => element.id == id);
    $("#dishID").val(dish.id);
    $("#name").val(dish.name);
    $("#description").val(dish.description);
    $("#price").val(dish.price);
    $("#category").val(dish.category);
});
</script>
<?php include 'footer.php'; ?>