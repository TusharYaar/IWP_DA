<?php include 'header.php'; ?>

<?php
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }?>
<diV id="container">
    <h1 id="pageHeading">Shopping Cart</h1>
    <h3 id="total">Total :Rs. 3443</h3>
    <div id="cartContainer">
    </div>
</div>


<script>
function removeItem(id) {
    $.ajax({
        url: '../cart_remove_submit.php',
        type: 'POST',
        data: {
            id: id
        },
        success: function(response) {
            console.log(response);
            getCart();
        }
    });
}

function getCart() {
    $.get("../get_cart_submit.php", function(data) {
        data = JSON.parse(data);
        if (!data.success) return alert(data.message);
        $("#cartContainer").html("");
        let arr = data.dishes.map(dish => {
            return {
                ...dish,
                number: data.cart.filter(cart => cart == dish.id).length
            }
        })
        arr = arr.filter(cart => cart.number);
        let total = 0;
        arr.forEach(function(dish) {
            total += dish.number * dish.price;
            $("#cartContainer").append(`
        <div id="dish">
        <h3>${dish.name}</h3>
        <h4> ${dish.category}</h4>
        <p>${dish.description}</p>
        <p>Price: Rs. ${dish.price}</p>
        <p>Quantity: ${dish.number}</p>
        <button onclick="removeItem(${dish.id})" class="deleteBtn">Reduce 1 Quantity</button>
    </div>
`);
        });

        $("#total").html("Total :Rs. " + total);
    })
}


getCart();
</script>
<?php include 'footer.php'; ?>