<?php include 'header.php'; ?>
<div id="container">
    <h1 id="pageHeading">Delete dish</h1>
    <div id="searchBox">
        <input type="text" name="search" placeholder="Search..." id="searchQuery" />
        <button id="searchBtn">Search</button>
    </div>
    <div id="dishesContainer">

    </div>

</div>
<script src="./jquery.js"></script>
<script>
// Search button

function searchDish() {
    var search = $("#searchQuery").val() || "";
    $.get("../search_submit.php?search=" + search, function(data) {
        data = JSON.parse(data);
        if (!data.success) return alert(data.message);
        $("#dishesContainer").html("");
        data.dishes.forEach(function(dish) {
            $("#dishesContainer").append(`
                <div id="dish">
                    <h3>${dish.name}</h3>
                    <h4> ${dish.category}</h4>
                    <p>${dish.description}</p>
                    <p>Price: Rs. ${dish.price}</p>
                    <button class="deleteBtn" data-id="${dish.id}">Delete dish</button>
                </div>
            `);
        });
        $(".deleteBtn").click(function() {
            var id = $(this).data("id");
            let dish = $(this).parent();
            $.ajax({
                type: "GET",
                url: `../delete_dish_submit.php?id=${id}`,
                success: function(data) {
                    data = JSON.parse(data);
                    if (!data.success) return alert(data.message);
                    dish.remove();
                }
            });
        });
    });
}
$("#searchBtn").click(searchDish);

searchDish();
</script>
<?php include 'footer.php'; ?>