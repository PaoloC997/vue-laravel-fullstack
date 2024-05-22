<template>
  <aside class="cart-container">
    <div class="cart">
      <h1 class="cart-title spread">
        <span>
          Cart
          <i class="icofont-cart-alt icofont-1x"></i>
        </span>
        <button @click="toggle" class="cart-close">&times;</button>
      </h1>

      <div class="cart-body">
        <table class="cart-table">
          <thead>
            <tr>
              <th><span class="sr-only">Product Image</span></th>
              <th>Product</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>
              <th><span class="sr-only">Actions</span></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(quantity, key, i) in cart" :key="i">
              <td><i class="icofont-carrot icofont-3x"></i></td>
              <td>{{ key }}</td>
              <td>$ {{ getPrice(key) }}</td>
              <td class="center">{{ quantity }}</td>
              <td>$ {{ getPrice(key) * quantity }}</td>
              <td class="center">
                <button @click="remove(key)" class="btn btn-light cart-remove">
                  &times;
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <p v-if="Object.keys(cart).length < 1" class="center">
          <em>No items in cart</em>
        </p>
        <p v-else class="center"><em></em></p>
        <div class="spread">
          <span><strong>Total:</strong> $ {{ cartTotal() }} </span>
          <button @click="checkOut" class="btn btn-light">Checkout</button>
        </div>
      </div>
    </div>
  </aside>
</template>
<script>
export default {
  data() {
    return {};
  },

  props: ["toggle", "cart", "inventory", "remove"],
  methods: {
    getPrice(name) {
      const product = this.inventory.find((p) => {
        return p.name === name;
      });
      return product.price_usd;
    },
    cartTotal() {
      const total = Object.entries(this.cart).reduce((acc, curr, index) => {
        return acc + curr[1] * this.getPrice(curr[0]);
      }, 0);
      return total.toFixed(2);
    },

    getProductId(name) {
      const product = this.inventory.find((p) => {
        return p.name === name;
      });
      return product.id;
    },

    checkOut() {
      const orderId = Math.floor(Math.random() * 10000);
      const orderTotal = this.cartTotal();

     const order = {
        order_id: orderId,
        order_total: orderTotal,
        items: [],
      };

      const productsInCart =  Object.entries(this.cart)

      productsInCart.forEach((item) => {
        let productId = this.getProductId(item[0]);
        let productQuantity = item[1];
        let productName = item[0];
        let productPrice = this.getPrice(item[0])
        let productTotal = productPrice * productQuantity;

        order.items.push({
          product_id: productId,
          product_total: productTotal.toFixed(2),
          product_quantity: productQuantity,
          product_price: productPrice,
          product_name: productName,
        });
      });

      fetch('http://192.168.1.109:8000/api/orders', {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json',

        },
        body: JSON.stringify(order),
      })
      .then(response =>{
        if(!response.ok){
            throw new Error('Network response was not ok')
        }
        return response.json()
      })
      .then(data =>{
        console.log('Order submitted successfully', data)
      })
      .catch(error=>{
        console.log('Error submitting order', error)
      })

    },
  },
};
</script>
