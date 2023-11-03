<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Carts</h5>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">Name</span>
                <span class="cart-price cart-header cart-column">Price</span>
                <span class="cart-quantity cart-header cart-column">Quantity</span>
            </div>
            <div class="cart-items" id="load-cart">
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total:</strong>
                <span class="cart-total-price" id="loadCartTotal">0 USD</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-footer">Close</button>
            <button type="button" class="btn btn-primary order">Checkout</button>
        </div>
    </div>
</div>
