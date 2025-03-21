document.addEventListener("DOMContentLoaded", function () {
    loadMiniCart();
});

function loadMiniCart() {
    fetch('/minicart')
        .then(response => response.json())
        .then(data => updateMiniCart(data.cart))
        .catch(error => console.error('Error loading mini cart:', error));
}

function updateMiniCart(cartItems) {
    let cartHTML = "";
    let subtotal = 0;
    let totalCount = 0;

    if (cartItems.length > 0) {
        cartItems.forEach(item => {
            subtotal += item.total;
            totalCount += item.quantity;
            cartHTML += `
                <li class="item">
                    <a class="product-image" href="/products/${item.product_id}">
                        <img src="/${item.thumbnail}" alt="${item.name}" />
                    </a>
                    <div class="product-details">
                        <a href="javascript:void(0);" class="remove" onclick="removeFromMiniCart(${item.id})">
                            <i class="anm anm-times-l"></i>
                        </a>
                        <a class="pName" href="#">${item.name}</a>
                        <div class="priceRow">
                            <div class="product-quantity">Qty: ${item.quantity}</div>
                            <div class="product-price">
                                <span class="money">$${item.total.toFixed(2)}</span>
                            </div>
                        </div>
                    </div>
                </li>
            `;
        });
    } else {
        cartHTML = `<li class="item"><p>Your cart is empty.</p></li>`;
    }

    document.getElementById("miniCartItems").innerHTML = cartHTML;
    document.getElementById("CartCount").innerText = totalCount;
    document.getElementById("cartSubtotal").innerText = `$${subtotal.toFixed(2)}`;
}

function removeFromMiniCart(itemId) {
    fetch(`/minicart/remove/${itemId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let itemElement = document.querySelector(`.remove[onclick="removeFromMiniCart(${itemId})"]`).closest(".item");
            if (itemElement) {
                itemElement.remove();
            }

            let cartCountElement = document.getElementById("CartCount");
            let cartSubtotalElement = document.getElementById("cartSubtotal");

            let currentSubtotal = cartSubtotalElement.innerText.replace("$", "").trim();
            let newSubtotal = parseFloat(currentSubtotal) - data.removedTotal;

            if (isNaN(newSubtotal)) {
                newSubtotal = 0;
            }

            let totalCount = parseInt(cartCountElement.innerText) - data.removedQuantity;
            cartCountElement.innerText = Math.max(0, totalCount);
            cartSubtotalElement.innerText = `$${newSubtotal.toFixed(2)}`;
        }
    })
    .catch(error => console.error('Error removing item:', error));
}



