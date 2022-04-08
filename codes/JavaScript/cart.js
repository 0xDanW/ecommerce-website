if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('danger-btn');
    console.log(removeCartItemButtons);
    for (var a=0; a<removeCartItemButtons.length; a++) {
        var btn = removeCartItemButtons[a];
        btn.addEventListener('click', removeCartItemProduct);
    }
    var qtyInputValues = document.getElementsByClassName('cart-quantity-input');
    for (var b=0; b<qtyInputValues.length; b++) {
        var qtyInput = qtyInputValues[b];
        qtyInput.addEventListener('change', qtyChanged);
    }
    var addToCartItemsButtons = document.getElementsByClassName('product-btn');
    for (var c=0; c<addToCartItemsButtons.length; c++) {
        var btn = addToCartItemsButtons[c];
        btn.addEventListener('click', addToCartItems);
    }

}

function removeCartItemProduct(event) {
    var btnClicked = event.target;
    btnClicked.parentElement.parentElement.remove();
    updateCartTotalPrice();
}

function updateCartTotalPrice() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartItemRows = cartItemContainer.getElementsByClassName('cart-row');
    var totalPrice = 0;
    var roundedTotalPrice = 0;
    for (var a=0; a<cartItemRows.length; a++) {
        var cartItemRow = cartItemRows[a];
        var priceElement = cartItemRow.getElementsByClassName('cart-subtotal')[0];
        var qtyElement = cartItemRow.getElementsByClassName('cart-quantity-input')[0];
        var price = parseFloat(priceElement.innerText.replace('RM',''));
        var qty = qtyElement.value;
        totalPrice += price * qty;
        roundedTotalPrice = Math.round((totalPrice + Number.EPSILON) * 100) / 100;
    }
    document.getElementsByClassName('cart-total-price')[0].innerText = 'RM ' + roundedTotalPrice;
}

function qtyChanged(event) {
    var qtyInput = event.target;
    if (isNaN(qtyInput.value) || (qtyInput.value < 1)) {
        qtyInput.value = 1;
        alert('Please key in a quantity not less than zero');
        return;
    } 
    updateCartTotalPrice();
}

function addToCartItems(event) {
    var btn = event.target;
    var productItem = btn.parentElement.parentElement;
    var productTitle = productItem.getElementsByClassName('product-item-title')[0].innerText;
    var productPrice = productItem.getElementsByClassName('product-item-price')[0].innerText;
    var productImage = productItem.getElementsByClassName('product-item-img')[0].src;
    addItemToCart(productTitle, productPrice, productImage);
    alert('Item added to cart');
    updateCartTotalPrice();
}

function addItemToCart(productTitle, productPrice, productImage) {
    var cartRow = document.createElement('div');
    cartRow.classList.add('cart-row');
    var cartItems = document.getElementsByClassName('cart-items')[0];
    var cartItemsName = cartItems.getElementsByClassName('cart-item-title');
    for (var a=0; a<cartItemsName.length; a++) {
        if (cartItemsName[a].innerText == productTitle) {
            alert('This item has already been added into your cart');
            return;
        }
    }
    var cartItemRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-img" src="${productImage}">
            <span class="cart-item-title">${productTitle}</span>
        </div>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn danger-btn" type="button">REMOVE</button>
        </div>
        <div class="cart-subtotal cart-column">${productPrice}</div>`
    cartRow.innerHTML = cartItemRowContents;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('danger-btn')[0].addEventListener('click', removeCartItemProduct);
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', qtyChanged);
}

function purchaseItems() {
    var cartItems = document.getElementsByClassName('cart-items')[0];
    if (!cartItems.hasChildNodes()) {
        alert('Your cart is empty');
    } else {
        while (cartItems.hasChildNodes()) {
            cartItems.removeChild(cartItems.firstChild);
        }
        location.href='./checkout.html';
    }
}