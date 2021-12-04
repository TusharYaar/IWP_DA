<?php include 'header.php'; ?>
<div id="container">
    <p>The best place to order food.</p>
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

function addListener() {
    $(".addToCart").click(function() {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../add_to_cart_submit.php",
            data: {
                id
            },
        }).done(

            function(res) {
                res = JSON.parse(res);
                if (res.success) {
                    alert("Added to cart");
                } else {
                    alert(res.message);
                }
            })
    });
};


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
                    <button class="addToCart" data-id="${dish.id}">Add to cart</button>
                </div>
            `);
        });

        addListener();
    });
}
$("#searchBtn").click(searchDish);

searchDish();
</script>
<?php include 'footer.php'; ?>